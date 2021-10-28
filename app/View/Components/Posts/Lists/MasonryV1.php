<?php

namespace App\View\Components\Posts\Lists;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

use Modules\Post\Entities\Post;

class MasonryV1 extends Component
{
    public $posts;
    public $api_route;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'all', $userid = null, $tag = null, $limit = 20)
    {
        if ( $type == 'tag' ) {
            if( $tag == null ) {
                $this->posts = [];
                $this->api_route = 'posts/tag/';
            } else {
                $posts = Post::leftJoin('posts_tags', 'posts_tags.post_id', '=', 'posts.id')
                    ->leftJoin('tags', 'posts_tags.tag_id', '=', 'tags.id')
                    ->select([
                        'posts.id',
                        DB::raw('COUNT(*) as relevance')
                    ])
                    ->where(
                        [
                            'tags.name' => $tag,
                            'posts.status'    => 'published'
                        ]    
                    )->groupBy('posts.id')
                    ->orderBy('relevance', 'desc')
                    ->orderBy('posts.updated_at', 'desc')
                    ->offset(0)
                    ->limit($limit);

                $posts = $posts->get();
                
                $post_ids = [];
                foreach($posts as $post) {
                    $post_ids[] = $post->id;
                }

                $posts = Post::leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
                    ->select(DB::raw(
                        'posts.id,
                        title,
                        slug,
                        description,
                        posts.created_at as created_at,
                        thumbnail,
                        thumbnail_medium,
                        IF(posts_metas.meta_key = "video", posts_metas.meta_value, "") as video'
                    ))
                    ->whereIn('posts.id', $post_ids)
                    ->get();
                $this->posts = $posts;
                $this->api_route = 'posts/tag/' . $tag;
            }
        } else {
            $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
                ->leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
                ->leftJoin('users_settings', 'users_settings.user_id', '=', 'users.id')
                ->select(DB::raw(
                    'posts.id,
                    title,
                    slug,
                    posts.created_at as created_at,
                    thumbnail,
                    thumbnail_medium,
                    IF(posts_metas.meta_key = "video", posts_metas.meta_value, "") as video,
                    users.name,
                    users.username,
                    users_settings.avatar as avatar'
                ))->where(
                    [
                        'posts.status' => 'published'
                    ]    
                );

            if ( $userid != null ) {
                $posts->where('posts.user_id', $userid);
            }
            $posts->orderBy('created_at', 'desc')
                ->limit($limit)
                ->offset(0);

            $posts = $posts->get();

            $this->posts = $posts;
            $this->api_route = 'posts';
            if ( $userid != null ) {
                $this->api_route = $this->api_route . "/user/" . $userid;
            }
        }
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts.lists.masonry-v1');
    }
}
