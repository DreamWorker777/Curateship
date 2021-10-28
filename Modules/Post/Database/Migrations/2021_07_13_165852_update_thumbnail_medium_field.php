<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Post\Entities\Post;

class UpdateThumbnailMediumField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Migrate Data.
        $keyword = 'thumbnailcrop';
        $posts = Post::all();
        foreach ($posts as $post) {
            $medium_thumb = $post->thumbnail_medium;
            if ( strlen($medium_thumb) > 0 && strpos( $medium_thumb, $keyword ) !== false ) {
                $medium_thumb = preg_replace( '/'.$keyword.'/', "", $medium_thumb);

                $post->update([
                    'thumbnail_medium' => $medium_thumb
                ]);
            }
        }

        // Rename all old images
        $directory = 'public/posts/thumbnail';
        $files     = Storage::files($directory);
        foreach ($files as $file) {
            $dir       = dirname($file);
            $file_name = basename($file);
            if ( strpos( $file_name, $keyword ) !== false ) {
                $new_filename = preg_replace( '/'.$keyword.'/', "", $file_name);
                Storage::rename($file, $dir . '/'. $new_filename);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $keyword = 'thumbnailcrop';
        $posts = Post::all();
        foreach ($posts as $post) {
            $medium_thumb = $post->thumbnail_medium;
            if ( strlen($medium_thumb) > 0 ) {
                $medium_thumb = $keyword . $medium_thumb;

                $post->update([
                    'thumbnail_medium' => $medium_thumb
                ]);
            }
        }

        // Rename all old images
        $directory = 'public/posts/thumbnail';
        $files     = Storage::files($directory);
        foreach ($files as $file) {
            $dir       = dirname($file);
            $file_name = basename($file);
            $new_filename = $keyword . $file_name;
            Storage::rename($file, $dir . '/'. $new_filename);
        }
    }
}
