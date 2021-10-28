<?php

namespace App\View\Components\Posts\Lists;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

use Modules\Post\Entities\{Post, PostsMeta};

class FeaturedPost extends Component
{
    public $featured_post;
    public $featured_list;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($limit = 4)
    {
        $featured_post = Post::where(
            [
                'status' => 'published'
            ]
        )->latest()->first();
        if ($featured_post) {
            $video_file                   = PostsMeta::getMetaData( $featured_post->id, 'video' );
            $video_extension              = empty( $video_file ) ? '' : substr($video_file, strrpos($video_file,".") + 1);

            $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
            if (isMobileDevice() && File::exists($video_mobile)) {
                $featured_post['video']    = !empty( $video_file ) ? asset("storage/videos/mobile/{$video_file}") : '';
            } else {
                $featured_post['video']    = !empty( $video_file ) ? asset("storage/videos/original/{$video_file}") : '';
            }

            $featured_post['video_type']  = $video_extension == 'mp4' ? 'video/mp4' : ( $video_extension == 'webm' ? 'video/webm' : '' );
        }

        $featured_list = Post::leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
        ->select(DB::raw(
            'posts.*,
            IF(posts_metas.meta_key = "video", posts_metas.meta_value, "") as video'
        ))->where(
            [
                'status' => 'published'
            ]
        )
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->offset(1);

        $featured_list = $featured_list->get();
        foreach($featured_list as &$post) {
            $video_file          = $post['video'];
            $video_extension     = empty( $video_file ) ? '' : substr($video_file, strrpos($video_file,".") + 1);

            $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
            if (isMobileDevice() && File::exists($video_mobile)) {
                $post['video']    = !empty( $video_file ) ? asset("storage/videos/mobile/{$video_file}") : '';
            } else {
                $post['video']    = !empty( $video_file ) ? asset("storage/videos/original/{$video_file}") : '';
            }

            $post['video_type']  = $video_extension == 'mp4' ? 'video/mp4' : ( $video_extension == 'webm' ? 'video/webm' : '' );
        }

        $this->featured_post = $featured_post;
        $this->featured_list = $featured_list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts.lists.featured-post');
    }
}
