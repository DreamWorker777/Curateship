<?php

namespace Modules\Admin\Http\Controllers;

use Arr, Str, Image, File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Modules\Admin\Entities\Settings;
use Illuminate\Support\Facades\Validator;

use Modules\Admin\Entities\Scraper;
use Modules\Users\Entities\UsersSetting;
use Modules\Post\Entities\{Post, PostsMeta};

class SettingsController extends Controller {
  public function index() {
    $settings_data = Settings::getSiteSettings();
    $fonts = Settings::getFontsList();
    $disable_shortcode = true;

    // Get all available templates.
    $current_template = $settings_data['app_template'];

    $app_templates = Settings::getTemplates('app_template', $settings_data['app_template']);
    $blog_templates = Settings::getTemplates('blog_template', $settings_data['blog_template']);
    $post_templates = Settings::getTemplates('post_template', $settings_data['post_template']);
    $page_templates = Settings::getTemplates('page_template', $settings_data['page_template']);
    $tag_templates = Settings::getTemplates('tag_template', $settings_data['tag_template']);
    $profile_templates = Settings::getTemplates('profile_template', $settings_data['profile_template']);

    // Get social icon info.
    if (isset($settings_data['socials'])) {
      $socials = unserialize($settings_data['socials']);
    } else {
      $socials = [];
    }
    return view('admin::partials.setting', compact('settings_data', 'fonts', 'disable_shortcode', 'app_templates', 'blog_templates', 'post_templates', 'page_templates', 'tag_templates', 'profile_templates', 'socials'))->withoutShortcodes();
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request) {
    $setting_keys = [
      'logo_title',
      'logo_svg',
      'favicon',
      'page_title',
      'meta_title',
      'post_page_title',
      'post_meta_title',
      'tag_page_title',
      'tag_meta_title',
      'profile_page_title',
      'profile_meta_title',
      'font_logo',
      'font_primary',
      'font_secondary',
      'tracker_script',
      'reg_en_fullname',
      'reg_en_verify_email',
      'notify_from_email',
      'template_email_confirm',
      'template_forgot_password',
      'app_template',
      'blog_template',
      'post_template',
      'page_template',
      'tag_template',
      'profile_template',
      'socials'
    ];

    $checkbox_keys = [
      'reg_en_fullname',
      'reg_en_verify_email'
    ];

    $validator = Validator::make($request->all(), [
        'logo_title' => 'required',
        'page_title' => 'required',
        'meta_title' => 'required',
        'post_page_title' => 'required',
        'post_meta_title' => 'required',
        'tag_page_title' => 'required',
        'tag_meta_title' => 'required',
        'profile_page_title' => 'required',
        'profile_meta_title' => 'required',
        'logo_svg' => 'required',
        'favicon' => 'required',
        'font_logo' => 'required',
        'font_primary' => 'required',
        'font_secondary' => 'required'
    ],
    $messages = [
      'required' => 'The :attribute field is required.',
      'max' => 'The :attribute field is too long!.',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => 'Setting Data has been saved!',
        'errors' => $validator->errors()
      ]);
    }

    // get existing settings data
    $settings_data = Settings::getSiteSettings();

    // check if setting data is already added to database
    $dateNow = now();

    $insert_data = array();
    $update_data = array();
    foreach ($setting_keys as $key) {
      $default_val = '';
      if (in_array($key, $checkbox_keys)) {
        $default_val = 'off';
      }

      $req_param = !empty($request->input($key)) ? $request->input($key) : $default_val;

      if ($key == 'socials') {
        foreach($req_param as $idx => $social) {
          if (empty($social['icon']) && empty($social['link'])) {
            unset($req_param[$idx]);
          }
        }
        $req_param = serialize($req_param);
      }

      if (isset($settings_data[$key]))
        $update_data[$key] = $req_param;
      else
        $insert_data[] = array('key' => $key, 'value' => $req_param, 'created_at' => $dateNow, 'updated_at' => $dateNow);
    }

    if (count($insert_data) > 0) {
      // do insert action
      Settings::insert($insert_data);
    }

    if (count($update_data) > 0) {
      foreach ($update_data as $key => $value) {
        $row = Settings::where('key', $key);
        $row->update(['value' => $value]);
      }
    }

    return response()->json([
      'status' => true,
      'message' => 'Setting Data has been saved!',
      'data' => $update_data
    ]);
  }

  /**
   * Clear unused media files from storage.
   * @param Request $request
   * @return Renderable
   */
  public function clearUnusedMediaFiles(Request $request) {
    // Step1. Check all User Images
    $avatars_data = UsersSetting::select('avatar')->where('avatar', '!=', '')->get();
    $avatars = [];
    foreach($avatars_data as $avatar) {
      $avatars[] = $avatar->avatar;
    }

    // Check User avatars
    $user_media_path = 'public/users-images';
    $avatars_path = $user_media_path . '/avatars';
    $avatar_files = Storage::files($avatars_path);
    $removed_avatar_files = [];
    foreach ($avatar_files as $file) {
      $file_name = basename($file);
      if (in_array($file_name, $avatars, true) === false) {
        $removed_avatar_files[] = array(
          'filename' => $file_name,
          'size' => filesize(storage_path() . '/app/' . $avatars_path . '/' . $file_name)
        );
        Storage::delete($file);
      }
    }

    // Check cover photos
    $cover_photos_data = UsersSetting::select('cover_photo')->where('cover_photo', '!=', '')->get();
    $cover_photos = [];
    foreach($cover_photos_data as $cover_photo) {
      $cover_photos[] = $cover_photo->cover_photo;
    }

    $coverphotos_path = $user_media_path . '/cover';
    $cover_files = Storage::files($coverphotos_path);
    $removed_cover_files = [];
    foreach ($cover_files as $file) {
      $file_name = basename($file);
      if (in_array($file_name, $cover_photos, true) === false) {
        $removed_cover_files[] = array(
          'filename' => $file_name,
          'size' => filesize(storage_path() . '/app/' . $coverphotos_path . '/' . $file_name)
        );
        Storage::delete($file);
      }
    }

    // Step2. Check all Post Images
    $post_thumbnails_data = Post::select(['thumbnail', 'thumbnail_medium'])->where('thumbnail', '!=', '')->get();
    $post_images = [];
    $post_thumbnails = [];
    foreach($post_thumbnails_data as $post) {
      $post_images[] = $post->thumbnail;
      $post_thumbnails[] = $post->thumbnail_medium;
    }

    $post_videos_data = PostsMeta::select(['meta_value as video'])->where('meta_key', 'video')->get();
    $post_videos = [];
    foreach($post_videos_data as $post) {
      $post_videos[] = $post->video;
    }
    
    $post_media_path = 'public/posts';

    // Check post's original images & videos
    $original_path = $post_media_path . '/original';
    $original_files = Storage::files($original_path);
    $original_images = [];
    $original_videos = [];
    $removed_image_files = [];
    $removed_video_files = [];
    foreach ($original_files as $file) {
      $file_name = basename($file);
      $mimetype = Storage::mimeType($file);

      if ($mimetype == 'video/mp4' || $mimetype == 'video/webm') {
        $original_videos[] = $file_name;
        if (in_array($file_name, $post_videos, true) === false) {
          $removed_video_files[] = array(
            'filename' => $file_name,
            'size' => filesize(storage_path() . '/app/' . $original_path . '/' . $file_name)
          );
          Storage::delete($file);
        }
      } else {
        $original_images[] = $file_name;
        if (in_array($file_name, $post_images, true) === false) {
          $removed_image_files[] = array(
            'filename' => $file_name,
            'size' => filesize(storage_path() . '/app/' . $original_path . '/' . $file_name)
          );
          Storage::delete($file);
        }  
      }
    }

    // Check post's medium thumbnails
    $thumbnail_path = $post_media_path . '/thumbnail';
    $thumbnail_files = Storage::files($thumbnail_path);
    $removed_thumb_files = [];
    foreach ($thumbnail_files as $file) {
      $file_name = basename($file);
      $mimetype = Storage::mimeType($file);

      if (in_array($file_name, $post_thumbnails, true) === false) {
        $removed_thumb_files[] = array(
          'filename' => $file_name,
          'size' => filesize(storage_path() . '/app/' . $thumbnail_path . '/' . $file_name)
        );
        Storage::delete($file);
      }
    }

    // Calculate total removed file size.
    $total_size = 0;
    foreach($removed_avatar_files as $file) {
      $total_size += $file['size'];
    }
    foreach($removed_cover_files as $file) {
      $total_size += $file['size'];
    }
    foreach($removed_video_files as $file) {
      $total_size += $file['size'];
    }
    foreach($removed_image_files as $file) {
      $total_size += $file['size'];
    }
    foreach($removed_thumb_files as $file) {
      $total_size += $file['size'];
    }
    if ($total_size == 0) {
      $total_size = '0 byte';
    } else {
      $s = array('byte', 'KB', 'MB', 'GB', 'TB');
      $e = floor(log($total_size, 1024));

      $total_size = round($total_size/pow(1024, $e), 2) . ' ' . $s[$e];
    }

    $total = count($avatar_files) + count($cover_files) + count($original_images) + count($original_videos) + count($thumbnail_files);
    $total_removed_count = count($removed_avatar_files) + count($removed_cover_files) + count($removed_video_files) + count($removed_image_files) + count($removed_thumb_files);

    $returnData = array (
      'avatars' => array (
        'total' => count($avatar_files),
        'removed' => count($removed_avatar_files)
      ),
      'cover' => array (
        'total' => count($cover_files),
        'removed' => count($removed_cover_files)
      ),
      'posts' => array (
        'original' => array (
          'total' => count($original_images),
          'removed' => count($removed_image_files)
        ),
        'video' => array (
          'total' => count($original_videos),
          'removed' => count($removed_video_files),
        ),
        'thumbnail' => array (
          'total' => count($thumbnail_files),
          'removed' => count($removed_thumb_files)
        )
      ),
      'total' => array (
        'count' => $total,
        'removed' => $total_removed_count,
        'size' => $total_size
      )
    );

    return response()->json([
      'status' => true,
      'message' => 'All unused media files are cleared!',
      'data' => $returnData
    ]);
  }

  /**
   * Load Scraper General Settings
   */
  public function scraperSetting() {
    $settings_data = Settings::getSiteSettings();

    // Scraper IP & Port info.
    if (isset($settings_data['scraper_ip_ports'])) {
      $scraper_ip_ports = unserialize($settings_data['scraper_ip_ports']);
    } else {
      $scraper_ip_ports = [];
    }

    // Scraper delay info.
    $delay_min = "";
    $delay_max = "";
    if (isset($settings_data['delay_min']))
      $delay_min = $settings_data['delay_min'];

    if (isset($settings_data['delay_max']))
      $delay_max = $settings_data['delay_max'];

    $scrapers = Scraper::all();
    $scraper_ids = [];
    foreach($scrapers as $scraper) {
      $scraper_ids[] = $scraper->id;
    }
  
    return view('admin::scraper.settings', compact('scraper_ip_ports', 'delay_min', 'delay_max', 'scraper_ids'));
  }

  /**
   * Store scraper general setting data.
   * @param Request $request
   * @return Renderable
   */
  public function storeScraperSetting(Request $request) {
    $setting_keys = [
      'scraper_ip_ports',
      'delay_min',
      'delay_max'
    ];

    $validator = Validator::make($request->all(), [
      'delay_min' => 'required|numeric|min:5|max:15',
      'delay_max' => 'required|numeric|min:5|max:15|gt:delay_min'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => 'Validation failed!',
        'errors' => $validator->errors()
      ]);
    }

    // get existing settings data
    $settings_data = Settings::getSiteSettings();

    // check if setting data is already added to database
    $dateNow = now();

    $insert_data = array();
    $update_data = array();
    foreach ($setting_keys as $key) {
      $req_param = !empty($request->input($key)) ? $request->input($key) : '';

      if ($key == 'scraper_ip_ports') {
        foreach($req_param as $idx => $ip_port) {
          if (empty($ip_port['ip']) || empty($ip_port['port'])) {
            unset($req_param[$idx]);
          }
        }
        $req_param = serialize($req_param);
      }

      if (isset($settings_data[$key]))
        $update_data[$key] = $req_param;
      else
        $insert_data[] = array('key' => $key, 'value' => $req_param, 'created_at' => $dateNow, 'updated_at' => $dateNow);
    }

    if (count($insert_data) > 0) {
      // do insert action
      Settings::insert($insert_data);
    }

    if (count($update_data) > 0) {
      foreach ($update_data as $key => $value) {
        $row = Settings::where('key', $key);
        $row->update(['value' => $value]);
      }
    }

    return response()->json([
      'status' => true,
      'message' => 'Setting Data has been saved!',
      'data' => $update_data
    ]);
  }
}