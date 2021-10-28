<?php

namespace Modules\Admin\Http\Controllers;

use Arr, Str, Image, Imagick, File, Thumbnail;
use FFMpeg\FFProbe;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\{X264, Ogg, WebM, WMV, WMV3};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Modules\Post\Entities\{ PostSetting };

class MediaUploadController extends Controller
{
    public function uploadPostMedia(Request $request) {
        $data = $this->uploadMedia($request, 'post');

        return response()->json($data);
    }

    public function uploadTagMedia(Request $request) {
        $data = $this->uploadMedia($request, 'tag');

        return response()->json($data);
    }

    public function uploadMedia(Request $request, $type = 'post') {
        Imagick::setResourceLimit(Imagick::RESOURCETYPE_MEMORY, 1024435456);
        Imagick::setResourceLimit(Imagick::RESOURCETYPE_MAP, 1536870912);
        Imagick::setResourceLimit(IMagick::RESOURCETYPE_AREA, 256000000);
        Imagick::setResourceLimit(IMagick::RESOURCETYPE_DISK, 4073741824);

        $request->validate([
            'media' => 'required',
		]);

        $status = true;

        $settings_width = 40;
        $settings_height = 40;

        if(!is_null($posts_settings = PostSetting::first())){
            $settings_width = $posts_settings->medium_width;
            $settings_height = $posts_settings->medium_height;
        }

        $subpath = $type == 'tag' ? 'tags' : ($type == 'post' ? 'posts' : false);
        if (!$subpath) {
            return [
                'status' => false,
                'message' => 'Invalid request'
            ];
        }

        $mime_type = request()->file('media')->getMimeType();
        $media_type = substr($mime_type, 0, 5) === 'image' ? 'image' : 'video';

        $media_path = storage_path() . "/app/public/{$subpath}";

        // Ensure that original, and thumbnail folder exists
        File::ensureDirectoryExists($media_path . '/original');
        File::ensureDirectoryExists($media_path . '/thumbnail');

        $video_path = storage_path() . "/app/public/videos";

        // Ensure that original, and thumbnail folder exists
        File::ensureDirectoryExists($video_path . '/original');
        File::ensureDirectoryExists($video_path . '/mobile');

        // Save thumbnail image in file system
        if ($media_type == 'image')
            $media = request()->file('media')->store("public/{$subpath}/original");
        else
            $media = request()->file('media')->store("public/videos/original");
        $media_name = Arr::last(explode('/', $media));

        if ($media_type === 'image') {
            $thumbnail = $media_name;
            if ($mime_type == 'image/gif') {                
                // Save thumbnail (medium) image to file system
                $thumbnail_medium = new Imagick($media_path . '/original/' . $thumbnail);
                $thumbnail_medium = $thumbnail_medium->coalesceImages();
                do {
                    $thumbnail_medium->resizeImage( $settings_width, $settings_height, Imagick::FILTER_BOX, 1, true );
                } while ( $thumbnail_medium->nextImage());

                $thumbnail_medium = $thumbnail_medium->deconstructImages();
                $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
                $thumbnail_medium->writeImages($media_path . '/thumbnail/' . $thumbnail_medium_name, true);

            } else {
                $thumbnail_medium = Image::make(request()->file('media'));
                $thumbnail_medium->resize($settings_width, $settings_height, function($constraint){
                    $constraint->aspectRatio();
                });
                $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
                $thumbnail_medium->save($media_path . '/thumbnail/' . $thumbnail_medium_name);
            }

            $message = 'You have successfully upload file.';

        } else if ($media_type === 'video') {
            $video_extension = strtolower(substr($media_name, strrpos($media_name,".") + 1));

            $ffprobe = FFProbe::create();
            $video_stream = $ffprobe
                ->streams( $video_path . '/original/' . $media_name )   // extracts streams informations
                ->videos()                      // filters video streams
                ->first();                       // returns the first video stream

            $video_dimensions = $video_stream->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object

            $width = $video_dimensions->getWidth();
            $height = $video_dimensions->getHeight();

            // Resize video
            $m_video_width = 480;
            $m_video_height = ceil($height * (480/$width));

            $ffmpeg = FFMpeg::create();
            $m_video = $ffmpeg->open($video_path . '/original/' . $media_name);
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
        
            $m_video->save($format, $video_path . '/mobile/' . $media_name);

            $height = ceil($height * (1024/$width));
            $width = 1024; // Limit max thumbnail width as 1024
            $settings_height = ceil($height * ($settings_width/$width));
            config(['thumbnail.dimensions.width' => $width]);
            config(['thumbnail.dimensions.height' => $height]);

            // generate thumbnail from video
            $thumbnail = Arr::first(explode('.', $media_name)) . '.jpg';

            // get video length and process it
            // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
            $time_to_image = 5; // Capture first frame

            $thumbnail_status = Thumbnail::getThumbnail($video_path . '/original/' . $media_name, $media_path . '/original/', $thumbnail, $time_to_image);
            if($thumbnail_status) {
                $message = "Thumbnail generated";
                $thumbnail_medium = Image::make($media_path . '/original/' . $thumbnail);
                $thumbnail_medium->resize($settings_width, $settings_height, function($constraint){
                    $constraint->aspectRatio();
                });
                $thumbnail_medium_name = Str::random(27) . '.' . Arr::last(explode('.', $thumbnail));
                $thumbnail_medium->save($media_path . '/thumbnail/' . $thumbnail_medium_name);
            } else {
                $status = false;
                $message = "thumbnail generation has failed";
                $thumbnail_medium_name = '';
            }
        }

        return [
                'status' => $status,
                'message' => $message,
                'video' => ($media_type === 'video') ? $media_name : '',
                'video_url' => ($media_type === 'video') ? asset("storage/videos/original/{$media_name}") : '',
                'video_type' => ($media_type === 'video') ? $mime_type : '',
                'thumbnail' => $thumbnail,
                'thumbnail_url' => asset("storage/{$subpath}/original/{$thumbnail}"),
                'thumbnail_medium' => $thumbnail_medium_name
        ];
    }
}
