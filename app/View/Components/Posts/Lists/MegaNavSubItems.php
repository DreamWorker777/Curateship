<?php

namespace App\View\Components\Posts\Lists;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

use Modules\Post\Entities\Post;

class MegaNavSubItems extends Component
{
    public $posts;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $tags = [], $limit = 5)
    {
        $posts = [];

        if ($tags) {
            $posts = Post::getByTagNames($tags, $limit);
        }else{
            // Else if not set, then just get latest posts
            $posts = Post::leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
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
            ->offset(0);

            $posts = $posts->get();

            foreach($posts as &$post) {
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
        }

        $this->label = $label;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.mega-nav-sub-items');
    }
}
