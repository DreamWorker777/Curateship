<?php
namespace App\Services;

use Arr, Str, Image, Imagick, File, Thumbnail, Storage;
use FFMpeg\FFProbe;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\{X264, Ogg, WebM, WMV, WMV3};

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Log;
use App\Services\LoggerService;

use Modules\Admin\Entities\{ScraperLog, ScraperStat, Scraper, Settings};
use Modules\Post\Entities\{ PostSetting, Post, PostsTag, PostsMeta };
use Modules\Tag\Entities\{Tag, TagCategory};

class ScraperService {
  public $scraper = null;
  public $settings = null;
  public $domain = null;
  public $logger = null;
  public $proxies = [];

  public $scraper_status = [
    'id' => 0,
    'list_page' => '',
    'detail_page' => ''
  ];

  public function __construct($scraper, $settings) {
    $this->scraper = $scraper;
    $this->settings = $settings;

    $this->scraper_status['id'] = $this->scraper->id;

    if (isset($this->scraper->default_url)) {
      $url = parse_url($this->scraper->default_url);
      $this->domain = (isset($url['scheme']) ? $url['scheme'] : 'https') . '://' . (isset($url['host']) ? $url['host'] : '') . '/';

      $this->scraper_status['list_page'] = $this->scraper->default_url;
      $this->scraper_status['detail_page'] = '';
    }

    if (isset($this->settings['scraper_ip_ports']) || count($this->settings['scraper_ip_ports']) > 0) {
      foreach($this->settings['scraper_ip_ports'] as $proxy) {
        $this->proxies[] = sprintf('http://%s:%s', $proxy['ip'], $proxy['port']);
      }
    }

    $this->logger = new LoggerService($this->scraper->id);
  }

  public function run() {
    Scraper::where('id', $this->scraper->id)->update(['status' => 'running']);

    // Log::info('Prepare to run scraper...');

    // Validation (Non completed settings)
    /*if (!isset($this->settings['scraper_ip_ports']) || count($this->settings['scraper_ip_ports']) == 0) {
      Log::warning('Scraper is canceled, because could not find ip:port list.');
      $this->logger->update_log_param('proxy', 0);
      $this->logger->save_log(false);
      return;
    }*/

    // Validation (Invalid scraper)
    if (!isset($this->scraper->default_url)) {
      Log::warning('Scraper is canceled, because could not find main list page url.');
      $this->logger->update_log_param('default_url', 0);
      $this->logger->save_log(false);
      return;
    }

    // Check if the scraper was paused before.
    $scraper_stats = ScraperStat::where('scraper_id', $this->scraper->id)->first();

    // Next Pagination direction
    $direction = $this->scraper->direction == "1" ? 'forward' : 'backward';

    // Parse list page url.
    $next_page_num = $this->getPageNumFromPageListUrl($this->scraper->default_url);

    $list_page_url = $this->scraper->default_url;

    Log::info('===============================================================================================');
    Log::info('Starting scraper...');

    $can_scrape = true;
    if ($scraper_stats) {
      $can_scrape = false;
    }

    $debug_data = [];
    while(true) {
      if (!$can_scrape && $scraper_stats && $scraper_stats->list_page_url != $list_page_url) {
        // Get next page url.
        $next_page_num = $direction == 'forward' ? $next_page_num + 1 : $next_page_num - 1;
        if ($next_page_num == -1)
          break;
        
        // generate next page url
        $list_page_url = $this->getNextListPageUrl($list_page_url, $next_page_num);
        if (!$list_page_url)
          break;

        $this->scraper_status['list_page'] = $list_page_url;
        $this->scraper_status['detail_page'] = '';

        continue;
      }

      if ($scraper_stats && $scraper_stats->list_page_url == $list_page_url && $scraper_stats->item_url == '') {
        $can_scrape = true;
      }

      // Step 1 : Scrape List Page
      Log::info('_______________________________________________________________________');
      Log::info('Scraping list page... (' . $list_page_url . ')');
      $links = $this->scrapeListPage($list_page_url);

      // Wait for some seconds.
      $delay = mt_rand($this->settings['delay_min'], $this->settings['delay_max']);
      sleep($delay);

      // Step 2 : Scrape Item Page
      if (!empty($links)) {
        foreach($links as $page_url) {
          if (!$can_scrape && $scraper_stats && $scraper_stats->item_url != $page_url) {
            continue;
          }

          $can_scrape = true;

          // Check whether current scraper should be paused.
          $this->scraper_status['detail_page'] = $page_url;
          if ($this->check_scraper_status())
            return;

          $scraped_data = $this->scrapeDetailPage($page_url);
          $debug_data[] = [
            'list_url' => $list_page_url,
            'url' => $page_url,
            'data' => $scraped_data
          ];

          // Wait for some seconds.
          $delay = mt_rand($this->settings['delay_min'], $this->settings['delay_max']);
          sleep($delay);
        }

      } else {
        Log::notice("Haven't found any detail page info from " . $list_page_url . ".");
        Log::notice("Continue to the next page...");
        break;
      }

      // Step 3 : Get next page url.
      $next_page_num = $direction == 'forward' ? $next_page_num + 1 : $next_page_num - 1;
      // Log::debug('Next page num: ' . $next_page_num);
      if ($next_page_num == -1)
        break;
      
      // generate next page url
      $list_page_url = $this->getNextListPageUrl($list_page_url, $next_page_num);
      // Log::debug('Next page url: ' . $list_page_url);
      if (!$list_page_url)
        break;

      $this->scraper_status['list_page'] = $list_page_url;
      $this->scraper_status['detail_page'] = '';

      // Check whether current scraper should be paused.
      if ($this->check_scraper_status())
        return;

      // Log::notice("Continue to the next page...");
    }

    // Mark current scraper as completed.
    $scraper_info = Scraper::find($this->scraper->id);
    if ( $scraper_info ) {
      $scraper_info->update(['status' => 'stopped']);
    }

    // Delete scraper status info from stats table
    ScraperStat::where('scraper_id', $this->scraper->id)->delete();

    return $debug_data;
  }

  public function retry($log_item) {
    Log::info('Prepare to retry failed scraper... (' . $log_item->url . ')');

    // Validation (Non completed settings)
    /*if (!isset($this->settings['scraper_ip_ports']) || count($this->settings['scraper_ip_ports']) == 0) {
      // This time, no need to log again. Just return.
      return;
    }*/

    $debug_data = [];

    // First, check if current page is list page.
    $pagenum = $this->getPageNumFromPageListUrl($log_item->url);
    if ($pagenum) {
      ScraperLog::where('id', $log_item->id)->delete(); // Delete log item

      // Log::info('The page is list page. Prepare to re-scrape list page...');

      // Next Pagination direction
      $direction = $this->scraper->direction == "1" ? 'forward' : 'backward';

      // Parse list page url.
      $next_page_num = $this->getPageNumFromPageListUrl($log_item->url);

      $list_page_url = $log_item->url;

      // Log::info('Starting scraper...');

      while(true) {
        // Check whether to stop rescrape.
        if ($this->check_rescraper_status())
          return;

        // Step 1 : Scrape List Page
        Log::info('Scraping list page... (' . $list_page_url . ')');
        $links = $this->scrapeListPage($list_page_url);

        // Wait for some seconds.
        $delay = mt_rand($this->settings['delay_min'], $this->settings['delay_max']);
        sleep($delay);

        // Step 2 : Scrape Item Page
        if (!empty($links)) {
          foreach($links as $page_url) {
            // Check whether to stop rescrape.
            if ($this->check_rescraper_status())
              return;

            $scraped_data = $this->scrapeDetailPage($page_url);
            $debug_data[] = [
              'list_url' => $list_page_url,
              'url' => $page_url,
              'data' => $scraped_data
            ];

            // Wait for some seconds.
            $delay = mt_rand($this->settings['delay_min'], $this->settings['delay_max']);
            sleep($delay);
          }
        } else {
          Log::notice("Haven't found any detail page info from " . $list_page_url . ".");
          Log::notice("Continue to the next page...");
          break;
        }

        // Step 3 : Get next page url.
        $next_page_num = $direction == 'forward' ? $next_page_num + 1 : $next_page_num - 1;
        // Log::debug('Next page num: ' . $next_page_num);
        if ($next_page_num == -1)
          break;
        
        // generate next page url
        $list_page_url = $this->getNextListPageUrl($list_page_url, $next_page_num);
        // Log::debug('Next page url: ' . $list_page_url);
        if (!$list_page_url)
          break;

        // Log::notice("Continue to the next page...");
      }      
    } else {      
      // Check whether to stop rescrape.
      if ($this->check_rescraper_status())
        return;

      // Log::info('The page is detail page. Prepare to re-scrape list page...');

      $scraped_data = $this->scrapeDetailPage($log_item->url);
      ScraperLog::where('id', $log_item->id)->delete(); // Delete log item

      $debug_data[] = [
        'url' => $log_item->url,
        'data' => $scraped_data
      ];
    }

    return $debug_data;
  }

  public function scrapeListPage($url) {
    $config = [
      'timeout' => 60,
    ];
    if (count($this->proxies) > 0) {
      // 'proxy' => 'http://cohfzrzw:nu2y6q8h5v7m@209.127.191.180:9279' // Proxy Authentication: username and password 
      $config['proxy'] = $this->proxies[mt_rand(0, count($this->proxies) - 1)]; // Proxy Authentication: IP Authorization
    }

    $client = new Client(HttpClient::Create($config));

    $crawler = $client->request('GET', $url);

    $this->logger->setUrl($url);
    if (!$crawler)
      $this->logger->update_log_param('scrape', 0);

    $page_links = [];

    try {
      $page_links = $crawler->filter($this->scraper->item_url)->each(function($node) use( $url ) {
        // Check if url contains domain
        $href = $node->attr('href');
        if (substr($href, 0, 4) != 'http') {
          $href = $this->relativeToAbsoluteUrl($href, $url);
        }
        return $href;
      });
    } catch (\Exception $e) {
      $page_links = [];
    }

    if (count($page_links) == 0)
      $this->logger->update_log_param('detail_url', 0);
    $this->logger->save_log();

    return $page_links;
  }

  public function scrapeDetailPage($url) {
    $config = [
      'timeout' => 60,
    ];
    if (count($this->proxies) > 0) {
      // 'proxy' => 'http://cohfzrzw:nu2y6q8h5v7m@209.127.191.180:9279' // Proxy Authentication: username and password 
      $config['proxy'] = $this->proxies[mt_rand(0, count($this->proxies) - 1)]; // Proxy Authentication: IP Authorization
    }

    $client = new Client(HttpClient::Create($config));

    $crawler = $client->request('GET', $url);

    $this->logger->setUrl($url);
    if (!$crawler)
      $this->logger->update_log_param('scrape', 0);

    Log::info('Scraping item detail page... (' . $url . ')');

    $scrape_status = true;

    $titles = $this->filterItemInfo($crawler, $this->scraper->title, 'content');
    if (count($titles) > 0) {
      // Log::info('Scrape "Title" >>> Success!');
    } else {
      // Log::error('Scrape "Title" >>> Not Found!');
      $scrape_status = false;
      $this->logger->update_log_param('title', 0);
    }

    $images = $this->filterItemInfo($crawler, $this->scraper->image, 'src', $url);
    // if (count($images) > 0) {
    //   Log::info('Scrape "Images" >>> Success!');
    // } else {
    //   Log::error('Scrape "Images" >>> Not Found!');
    // }

    $videos = $this->filterItemInfo($crawler, $this->scraper->video, 'src', $url);
    // if (count($videos) > 0) {
    //   Log::info('Scrape "Videos" >>> Success!');
    // } else {
    //   Log::error('Scrape "Videos" >>> Not Found!');
    // }

    // log only when both images, videos were not scraped.
    if (count($images) == 0 && count($videos) == 0) {
      $scrape_status = false;
      $this->logger->update_log_param('media', 0);
    }

    // Get tags Info
    $artists = [];
    if (!empty($this->scraper->artist))
      $artists = $this->filterItemInfo($crawler, $this->scraper->artist, 'content');
    // if (count($artists) > 0) {
    //   Log::info('Scrape "Artists" >>> Success!');
    // } else {
    //   Log::error('Scrape "Artists" >>> Not Found!');
    //   // $this->logger->update_log_param('artists', 0);
    // }

    $origins = [];
    if (!empty($this->scraper->origins))
      $origins = $this->filterItemInfo($crawler, $this->scraper->origins, 'content');
    // if (count($origins) > 0) {
    //   Log::info('Scrape "Origins" >>> Success!');
    // } else {
    //   Log::error('Scrape "Origins" >>> Not Found!');
    //   // $this->logger->update_log_param('origins', 0);
    // }

    $characters = [];
    if (!empty($this->scraper->character))
      $characters = $this->filterItemInfo($crawler, $this->scraper->character, 'content');
    // if (count($characters) > 0) {
    //   Log::info('Scrape "Characters" >>> Success!');
    // } else {
    //   Log::error('Scrape "Characters" >>> Not Found!');
    //   // $this->logger->update_log_param('characters', 0);
    // }

    $medias = [];
    if (!empty($this->scraper->media))
      $medias = $this->filterItemInfo($crawler, $this->scraper->media, 'content');
    // if (count($medias) > 0) {
    //   Log::info('Scrape "Medias" >>> Success!');
    // } else {
    //   Log::error('Scrape "Medias" >>> Not Found!');
    //   // $this->logger->update_log_param('medias', 0);
    // }

    $misc = [];
    if (!empty($this->scraper->misc))
      $misc = $this->filterItemInfo($crawler, $this->scraper->misc, 'content');
    // if (count($misc) > 0) {
    //   Log::info('Scrape "Misc" >>> Success!');
    // } else {
    //   Log::error('Scrape "Misc" >>> Not Found!');
    //   // $this->logger->update_log_param('misc', 0);
    // }

    if (count($artists) == 0 && count($origins) == 0 && count($characters) == 0 && count($medias) == 0 && count($misc) == 0) {
      $scrape_status = false;
      $this->logger->update_log_param('tags', 0);
    }

    $tags = [
      'artists' => $artists,
      'origins' => $origins,
      'characters' => $characters,
      'medias' => $medias,
      'misc' => $misc
    ];

    if ($scrape_status === true) {
      // Now it's time to add post based on scraped data.
      // !!!!!!!!!!!!!!!!! Pre-condition !!!!!!!!!!!!!!!!!!!!
      // Choose only one file from image or video. 
      // That is, will only download one file.
      // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

      // Step 1: Download image, video files and upload, generate thumbnail.
      $media_files = [];
      if (count($images) > 0) {
        foreach($images as $image) {
          $media_files[] = [
            'type' => 'image',
            'url' => $image
          ];
          break;
        }
      } else if (count($videos) > 0) {
        foreach($videos as $video) {
          $media_files[] = [
            'type' => 'video',
            'url' => $video
          ];
          break;
        }
      }

      Imagick::setResourceLimit(Imagick::RESOURCETYPE_MEMORY, 1024435456);
      Imagick::setResourceLimit(Imagick::RESOURCETYPE_MAP, 1536870912);
      Imagick::setResourceLimit(IMagick::RESOURCETYPE_AREA, 256000000);
      Imagick::setResourceLimit(IMagick::RESOURCETYPE_DISK, 4073741824);

      // Log::debug('>>> Downloading files...');
      foreach($media_files as $media_info) {
        $type = $media_info['type'];
        $media_url = $media_info['url'];
        $source = $media_url;

        $settings_width = 40;
        $settings_height = 40;

        if(!is_null($posts_settings = PostSetting::first())){
            $settings_width = $posts_settings->medium_width;
            $settings_height = $posts_settings->medium_height;
        }

        $post_media_path = storage_path() . '/app/public/posts';

        // Ensure that original, and thumbnail folder exists
        File::ensureDirectoryExists($post_media_path . '/original');
        File::ensureDirectoryExists($post_media_path . '/thumbnail');
        
        $video_path = storage_path() . "/app/public/videos";

        // Ensure that original, and thumbnail folder exists
        File::ensureDirectoryExists($video_path . '/original');
        File::ensureDirectoryExists($video_path . '/mobile');

        // if ($type == 'image')
        //   Log::debug('>>> Destination directory: ' . $post_media_path);
        // else
        //   Log::debug('>>> Destination directory: ' . $video_path);

        $filename = Str::random(41) . '.' . Arr::last(explode('.', $media_url));
        if ($type == 'image')
            $destination = $post_media_path . '/original/' . $filename;
        else
            $destination = $video_path . '/original/' . $filename;

        $download_size = $this->chunked_copy($source, $destination);
        if (!$download_size) {
          // Log error
          $scrape_status = false;
          $this->logger->update_log_param('download', 0);
          break;
        }

        // $mime_type = Storage::mimeType($destination);
        $mime_type = mime_content_type($destination);
        // Log::debug('>>> Mime Type: ' . $mime_type);

        if ($type === 'image') {
          // Log::debug('>>> Generating Thumbnail Image...');
          try {
            $thumbnail = $filename;
            if ($mime_type == 'image/gif') {
              // Save thumbnail (medium) image to file system
              $thumbnail_medium = new Imagick($destination);
              $thumbnail_medium = $thumbnail_medium->coalesceImages();
              do {
                $thumbnail_medium->resizeImage( $settings_width, $settings_height, Imagick::FILTER_BOX, 1, true );
              } while ( $thumbnail_medium->nextImage());

              $thumbnail_medium = $thumbnail_medium->deconstructImages();
              $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
              $thumbnail_medium->writeImages($post_media_path . '/thumbnail/' . $thumbnail_medium_name, true);

            } else {
              $thumbnail_medium = Image::make($destination);
              $thumbnail_medium->resize($settings_width, $settings_height, function($constraint){
                $constraint->aspectRatio();
              });
              $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
              $thumbnail_medium->save($post_media_path . '/thumbnail/' . $thumbnail_medium_name);
            }
            // Log::debug('>>> Thumbnail Image is generated: ' . $thumbnail_medium_name);
          } catch (ImagickException $e) {
            Log::error('>>> Exception occured while generating Thumbnail.');
            Log::info('>>> Source File: ' . $source);
            Log::info('>>> Destination File: ' . $destination);
            Log::info('>>> Downloaded Size: ' . $download_size);
            $scrape_status = false;
          } catch (Exception $e) {
            Log::error('>>> Exception occured while generating Thumbnail.');
            Log::info('>>> Source File: ' . $source);
            Log::info('>>> Destination File: ' . $destination);
            Log::info('>>> Downloaded Size: ' . $download_size);
            $scrape_status = false;
          }
        } else if ($type === 'video') {
          $video_extension = strtolower(substr($filename, strrpos($filename,".") + 1));
          // Log::debug('>>> Generating poster from video...');
          $ffprobe = FFProbe::create();
          $video_stream = $ffprobe
              ->streams( $video_path . '/original/' . $filename )   // extracts streams informations
              ->videos()                      // filters video streams
              ->first();                       // returns the first video stream

          $video_dimensions = $video_stream->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object
          $width = $video_dimensions->getWidth();
          $height = $video_dimensions->getHeight();

          // Resize video
          $m_video_width = 480;
          $m_video_height = ceil($height * (480/$width));

          $ffmpeg = FFMpeg::create();
          $m_video = $ffmpeg->open($video_path . '/original/' . $filename);
          $m_video
              ->filters()
              ->resize(new Dimension($m_video_width, $m_video_height))
              ->synchronize();

          if ($video_extension == 'ogg') {
              $format = new Ogg();
          } else if ($video_extension == 'webm') {
              $format = new WebM();
          } else if ($video_extension == 'wmv') {
              $format = new WMV();
          } else if ($video_extension == 'wmv3') {
              $format = new WMV2();
          } else {
              $format = new X264();
          }
          
          $format
              ->setKiloBitrate(704)
              ->setAudioChannels(2)
              ->setAudioKiloBitrate(256);
      
          $m_video->save($format, $video_path . '/mobile/' . $filename);

          $height = ceil($height * (1024/$width));
          $width = 1024; // Limit max thumbnail width as 1024
          $settings_height = ceil($height * ($settings_width/$width));
          config(['thumbnail.dimensions.width' => $width]);
          config(['thumbnail.dimensions.height' => $height]);

          // generate thumbnail from video
          $thumbnail = Arr::first(explode('.', $filename)) . '.jpg';

          // get video length and process it
          // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
          $time_to_image = 1; // Capture first frame

          $thumbnail_status = Thumbnail::getThumbnail($video_path . '/original/' . $filename, $post_media_path . '/original/', $thumbnail, $time_to_image);
          // Log::debug('>>> Generated Poster: ' . $thumbnail);
          if($thumbnail_status) {
            $thumbnail_medium = Image::make($post_media_path . '/original/' . $thumbnail);
            $thumbnail_medium->resize($settings_width, $settings_height, function($constraint){
              $constraint->aspectRatio();
            });
            $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
            $thumbnail_medium->save($post_media_path . '/thumbnail/' . $thumbnail_medium_name);
            // Log::debug('>>> Generated video Thumbnail Image: ' . $thumbnail_medium_name);
          } else {
            $scrape_status = false;
            Log::error('>>> Failed to generate video thumbnail!');
            Log::info('>>> Source File: ' . $source);
            Log::info('>>> Destination File: ' . $destination);
            Log::info('>>> Downloaded Size: ' . $download_size);
            // Log error
            $this->logger->update_log_param('download', 0);
            break;
          }
        }
      }

      // Download & Upload media files completed. Now it's time to add post.
      if ($scrape_status) {
        // Step 2: Prepare data for post.
        $title = $titles[0];

        // Generate slug
        $slug                = Str::slug(strip_tags($title), '-');
        $post_with_same_slug = Post::where('slug', $slug)->first();

        if ($post_with_same_slug) {
          $duplicated_slugs = Post::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
          $slug = getNewSlug($slug, $duplicated_slugs);
        }
        
        $post_data = [
          'user_id' => $this->scraper->user_id,
          'title' => $title,
          'slug' => $slug,
          'description' => '',
          'video' => $type == 'video' ? $filename : '',
          'thumbnail' => $thumbnail,
          'thumbnail_medium' => $thumbnail_medium_name,
          'post_type' => $type == 'video' ? 'video' : 'post',
          'status' => 'draft',
          'tags' => $tags
        ];

        // Step 3: Save Post.
        if (!$this->add_post($post_data)) {
          Log::error('>>> Failed to add post!');
          // Log error
          $this->logger->update_log_param('save', 0);
        }
      }
    }
    $this->logger->save_log();

    return compact('titles', 'images', 'videos', 'tags');
  }

  public function filterItemInfo($crawler, $filter_key, $filter_attr, $url = '') {
    $new_filter_key = $filter_key;

    // Check $filter_key
    $f_letter = substr($filter_key, 0, 1);
    if ($f_letter == '<') {
      // Filter by tag name
      $new_filter_key = substr($new_filter_key, 1, strlen($new_filter_key) - 2); // Remove first and last letter.
    } else if (in_array($f_letter, ['.', '#'])) {
      // Filter by Query Selector, so no need to change.
      $new_filter_key = $new_filter_key;
    } else if (strpos($new_filter_key, '"') !== false || strpos($new_filter_key, "'") !== false) {
      // Filter by attribute. For example input[name="usernmae"]
      if ($f_letter != '[' && strpos($new_filter_key, '[') === false) {
        // Add additional square bracket for proper query select filtering, only when square bracket isn't added to filter key yet.
        $new_filter_key = '[' . $new_filter_key . ']';
      }
    } else {
      // Filter by item content text.
      $new_filter_key = sprintf(":contains('%s')", $new_filter_key);
    }

    $items_info = [];
    try {
      $items_info = $crawler->filter($new_filter_key)->each(function($node) use ($filter_attr, $url, $new_filter_key) {
        $ignore_node = false;
        if (strpos($new_filter_key, ':contains') !== false) {
          if ($node->children()->count() > 0) $ignore_node = true;
        }

        if (!$ignore_node) {
          switch ($filter_attr) {
            case 'src':
              if ($node->nodeName() == 'a') {
                $info = $node->attr('href');
              } else {
                $info = $node->attr('src');
              }
              if (substr($info, 0, 4) != 'http') {
                $info = $this->relativeToAbsoluteUrl($info, $url);
              }
              break;
            // case 'value':
            //   $info = $node->value();
            //   break;
            case 'content':
              $info = $node->text();
              break;
            default:
              $info = $node->attr($filter_attr);
          }
          return $info;
        }
      });
    } catch (\Exception $e) {
      $items_info = [];
    }

    return array_values( array_filter( $items_info ) );
  }

  public function getPageNumFromPageListUrl($url) {
    // Current acceptable pagination url are:
    // https://www.example.com/{page|pages|pg}/1/
    // https://www.example.com/?{page|pages|pg}=1
    $url_components = parse_url($url);

    if (isset($url_components['query'])) {
      parse_str($url_components['query'], $params);

      if (isset($params['page']) && !empty($params['page']))
        return intval($params['page']);
      if (isset($params['pages']) && !empty($params['pages']))
        return intval($params['pages']);
      if (isset($params['pg']) && !empty($params['pg']))
        return intval($params['pg']);
    } else {
      $url_parts = explode("/", $url);
      $pos = 0;
      foreach($url_parts as $index => $part) {
        if (in_array($part, ['page', 'pages', 'pg'])) {
          $pos = $index;
          break;
        }
      }

      if (count($url_parts) > $pos + 1) {
        return intval($url_parts[$pos + 1]);
      }
    }

    return false;
  }

  public function getNextListPageUrl($old_url, $pagenum) {
    // Current acceptable pagination url are:
    // https://www.example.com/{page|pages|pg}/1/
    // https://www.example.com/?{page|pages|pg}=1
    $url_components = parse_url($old_url);

    if (isset($url_components['query'])) {
      parse_str($url_components['query'], $params);

      if (isset($params['page']) || isset($params['pages']) || isset($params['pg'])) {
        if (isset($params['page']) && !empty($params['page']))
          $params['page'] = $pagenum;
        if (isset($params['pages']) && !empty($params['pages']))
          $params['pages'] = $pagenum;
        if (isset($params['pg']) && !empty($params['pg']))
          $params['pg'] = $pagenum;
        
        $url_components['query'] = http_build_query($params);

        $url = $this->unparse_url($url_components);
        return $url;
      } else {
        return false;
      }
    }

    $url_parts = explode("/", $old_url);
    $pos = 0;
    foreach($url_parts as $index => $part) {
      if (in_array($part, ['page', 'pages', 'pg'])) {
        $pos = $index;
        break;
      }
    }

    if (count($url_parts) > $pos + 1) {
      $url_parts[$pos + 1] = $pagenum;
    } else {
      return false;
    }

    $url = implode("/", $url_parts);
    return $url;
  }

  public function relativeToAbsoluteUrl($inurl, $absolute) {
    // Get all parts so not getting them multiple times.
    $absolute_parts = parse_url($absolute);

    // Test if URL is already absolute (contains host, or begins with '/')
    if (strpos($inurl, $absolute_parts['host']) == false) {
      // Define $tmpurlprefix to prevent errors below
      $tmpurlprefix = "";

      // Formulate URL prefix (SCHEME)
      if (!empty($absolute_parts['scheme'])) {
        // Add scheme to tmpurlprefix
        $tmpurlprefix .= $absolute_parts['scheme'] . "://";
      }

      // Formulate URL prefix (USER, PASS) (Not required in our case actually)
      if (!empty($absolute_parts['user']) && !empty($absolute_parts['pass'])) {
        // Add user:pass to tmpurlprefix
        $tmpurlprefix .= $absolute_parts['user'] . ":" . $absolute_parts['pass'] . "@";
      }

      // Formulate URL prefix (HOST, PORT)
      if (!empty($absolute_parts['host'])) {
        // Add host to tmpurlprefix
        $tmpurlprefix .= $absolute_parts['host'];

        // Check for a port, add if exists
        if (!empty($absolute_parts['port'])) {
          // Add port to tmpurlprefix
          $tmpurlprefix .= ":" . $absolute_parts['port'];
        }
      }

      // Formulate URL prefix (PATH) and only add it if the path does not include ./
      if (!empty($absolute_parts['path']) && substr($inurl, 0, 1) != '/') {
        // Get path parts
        $path_parts = pathinfo($absolute_parts['path']);

        // Add path to tmpurlprefix
        $tmpurlprefix .= $path_parts['dirname'];
        $tmpurlprefix .= "/";

        if (empty($path_parts['extension'])) {
          $tmpurlprefix .= $path_parts['basename'];
          $tmpurlprefix .= "/";
        }

        // handle "../" URL prefix
        $tmpurl = $inurl;
        while(substr($tmpurl, 0, 3) == '../') {
          $tmpurlprefix = dirname($tmpurlprefix);
          $tmpurlprefix .= "/";
          $tmpurl = substr($tmpurl, 3);
        }

      } else {
        $tmpurlprefix .= "/";
      }

      // Time to remove '/'
      if (substr($inurl, 0, 1) == '/') {
        $inurl = substr($inurl, 1);
      }

      // Time to remove './'
      if (substr($inurl, 0, 2) == './') {
        $inurl = substr($inurl, 2);
      }

      // Time to remove './'
      while (substr($inurl, 0, 3) == '../') {
        $inurl = substr($inurl, 3);
      }

      return $tmpurlprefix . $inurl;
    } else {
      // Path is already absolute.
      return $inurl;
    }
  }

  public function unparse_url($parsed_url) {
    $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
    $host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
    $user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
    $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
    $pass     = ($user || $pass) ? "$pass@" : '';
    $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
    $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
    return "$scheme$user$pass$host$port$path$query$fragment";    
  }

  /**
   * Chunked copy large files.
   * Copy from source to destination by 1 mb at a time until copy 1 GB.
   * Once copy 1 GB, close file and reopen to append.
   */
  public function chunked_copy($source_url, $destination) {
    // 1 mega byte at a time.
    $buffer_size = 1048576;

    # 1 GB write-chunks.
    $write_chunks = 1073741824;

    $ret = 0;
    $fin = fopen($source_url, "rb");
    if (!$fin) return false;

    $fout = fopen($destination, "w");
    if (!$fout) return false;

    $bytes_written = 0;
    while(!feof($fin)) {
      $bytes = fwrite($fout, fread($fin, $buffer_size));
      $ret += $bytes;
      $bytes_written += $bytes;
      if ($bytes_written >= $write_chunks) {
        // (another) chunk of 1GB has been written, close and reopen the stream
        fclose($fout);
        $fout = fopen($destination, "a"); // "a" for "append";
        if (!$fout) return false;
        $bytes_written = 0; // re-start counting
      }
    }
    fclose($fin);
    fclose($fout);
    return $ret; // return number of bytes written
  }

  public function add_post($post_data) {
    $post = Post::create([
      'user_id'          => $post_data['user_id'],
      'title'            => $post_data['title'],
      'slug'             => $post_data['slug'],
      'description'      => $post_data['description'],
      'thumbnail'        => $post_data['thumbnail'],
      'thumbnail_medium' => $post_data['thumbnail_medium'],
      'post_type'        => $post_data['post_type'],
      'status'           => $post_data['status'],
    ]);

    if ( !empty($post_data['video']) ) {
      PostsMeta::setMetaData( $post->id, 'video', $post_data['video'] );
    }

    $tag_categories = TagCategory::all();
    foreach ($tag_categories as $key => $tag_category) {
      switch (strtolower($tag_category->name)) {
        case 'origins':
          $tags_input = $post_data['tags']['origins'];
          break;
        case 'media':
          $tags_input = $post_data['tags']['medias'];
          break;
        case 'characters':
          $tags_input = $post_data['tags']['characters'];
          break;
        case 'artists':
          $tags_input = $post_data['tags']['artists'];
          break;
        case 'misc':
          $tags_input = $post_data['tags']['misc'];
          break;
        default:
          $tags_input = [];
      }

      if (count($tags_input) > 0) {
        foreach ($tags_input as $key => $tag_input) {
          $tag = Tag::firstWhere('name', $tag_input);

          // If tag doesn't exist yet, create it
          if (!$tag) {
            $tag                  = new Tag;
            $tag->name            = $tag_input;
            $tag->tag_category_id = $tag_category->id;
            $tag->status          = 'published';
            $tag->save();
          }

          // Insert posts_tag
          $posts_tag          = new PostsTag;
          $posts_tag->post_id = $post->id;
          $posts_tag->tag_id  = $tag->id;

          $posts_tag->save();
        }
      }
    }
    return true;
  }

  public function check_scraper_status() {
    // Check current scraper status.
    $scraper_info = Scraper::find($this->scraper->id);
    if ($scraper_info->status == 'paused') {
      // Save current status.
      ScraperStat::where('scraper_id', $this->scraper->id)->update([
        'list_page_url' => $this->scraper_status['list_page'],
        'item_url' => $this->scraper_status['detail_page']
      ]);
      return true;
    } else if ($scraper_info->status == 'stopped') {
      return true;
    }
    return false;
  }

  public function check_rescraper_status() {
    // Check current scraper status.
    $status = Settings::where('key', 'scraper_retry')->get()->first();;
    
    if ($status && $status['value'] == 'stopped') {
      return true;
    }
    return false;
  }
}
