<?php

namespace Modules\Post\Http\Controllers;

use Arr, Str, Image, Imagick, File, Thumbnail;
use FFMpeg\FFProbe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Modules\Post\Entities\{ PostSetting, Post, PostsTag, PostsMeta };
use Modules\Tag\Entities\{Tag, TagCategory};

class PostController extends Controller
{
    public function cleanupEditorImages()
    {
        // `$directory` path value must be the value from `uploadImage` method
        // `uploadImage` method at app/Http/Controllers/EditorjsController.php

        $directory = 'public/editorjs-images';
        $files     = Storage::files($directory);

        foreach ($files as $file) {
            $file_name    = basename($file);
            $file_on_post = Post::firstWhere('description', 'LIKE', '%' . $file_name . '%');

            // model is null -> delete
            if (!$file_on_post) {
                Storage::delete($file);
            }
        }
    }

    public function index()
    {
        // Cleanup unused images created with editorjs
        // $this->cleanupEditorImages();

        $view = request()->ajax() ? 'post::partials.table' : 'post::index';

        $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select([
                'posts.id',
                'title',
                'slug',
                'posts.created_at as created_at',
                'thumbnail',
                'thumbnail_medium',
                'posts.status as status',
                'users.username as username'
            ])->orderBy('created_at', 'desc');

        if(request()->has('postsearch')){
            $posts->where('title', 'LIKE', '%' . request('postsearch') . '%')
            ->orWhere('users.name', 'LIKE', '%' . request('postsearch') . '%');
        }

        $posts = (request()->has('status')) ? $posts->where('posts.status', request('status')) : $posts->where('posts.status', 'published');

        $limit = request('limit') ? request('limit') : 25;

        $posts = $posts->paginate($limit);

        $posts_published_count = Post::where('status', 'published')->count();
        $posts_draft_count = Post::where('status', 'draft')->count();
        $posts_pending_count = Post::where('status', 'pending')->count();
        $posts_deleted_count = Post::where('status', 'deleted')->count();

        $availableLimit = ['25', '50', '100', '150', '200'];

        $image_width = '40';
        $image_height = '40';
        $posts_settings = PostSetting::first();
        if(!is_null($posts_settings)){
            $image_width = $posts_settings->medium_width;
            $image_height = $posts_settings->medium_height;
        }

        $request = request();
        $status = request('status');

        $tag_categories = TagCategory::all();

        // get all tags
        $tags_by_category = array();
        $tags = Tag::where('status', 'published')->orderBy('name', 'asc')->get();
        foreach($tags as $tag) {
            if (!isset($tags_by_category[$tag->tag_category_id]))
                $tags_by_category[$tag->tag_category_id] = array();
            $tags_by_category[$tag->tag_category_id][] = $tag->name;
        }
        $tags_by_category = json_encode($tags_by_category);

        // Generate `slug` if it's not yet set
        foreach ($posts as $post) {
            if (!$post->slug) {
                $slug                = Str::slug($post->title, '-');
                $post_with_same_slug = Post::where('slug', $slug)->where('id', '<>', $post->id)->first();

                if ($post_with_same_slug) {
                    $duplicated_slugs = Post::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
                    $slug = getNewSlug($slug, $duplicated_slugs);
                }

                $post->slug = $slug;
                $post->save();
            }
        }

        // get rejected posts
        $rejected_posts = [];
        if ($status == 'pending') {
            $rejected_posts = $this->getRejectedPosts();
        }

        return view($view, compact(
            'posts', 'rejected_posts', 'posts_published_count', 'posts_draft_count', 'posts_pending_count', 'posts_deleted_count',
            'availableLimit', 'limit', 'image_width', 'image_height', 'request', 'status', 'tag_categories', 'tags_by_category'
            )
        );
    }

    public function settings()
    {
        $posts_published_count = Post::where('status', 'published')->count();
        $posts_draft_count = Post::where('status', 'draft')->count();
        $posts_pending_count = Post::where('status', 'pending')->count();
        $posts_deleted_count = Post::where('status', 'deleted')->count();

        $posts_settings = PostSetting::first();

        return view('post::layouts.settings', compact(
            'posts_published_count', 'posts_draft_count', 'posts_pending_count', 'posts_deleted_count', 'posts_settings'
            )
        );
    }

    /**
     * Store the posts settings.
     * @return view
     */
    public function settingsStore()
    {
        return $this->createOrUpdateSettings('create', 'created');
    }

    /**
     * Update the posts settings.
     * @return view
     */
    public function settingsUpdate()
    {
        return $this->createOrUpdateSettings('update', 'updated');
    }

    /**
     * Store or update posts settings.
     * @return view
     */
    public function createOrUpdateSettings($method, $message)
    {
        $this->validate(request(), [
            'medium_width' => 'required|max:255',
            'medium_height' => 'required|max:255',
            // 'image_setting' => 'in:maintain,crop'
        ]);

        if($method == 'create'){
            PostSetting::create([
                'medium_width'     => request('medium_width'),
                'medium_height'    => request('medium_height'),
            ]);
        } else{
            $posts_settings = PostSetting::first();
            $posts_settings->update(request()->except(['_token']));
        }

        return redirect('/admin/posts/settings')->with("posts-settings-alert", "Settings has been $message!");
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('post::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store()
    {

        $this->validate(request(), [
            'title' => 'required|max:255',
        ]);

        // Generate slug
        $slug                = Str::slug(strip_tags(request('title')), '-');
        $post_with_same_slug = Post::where('slug', $slug)->first();

        if ($post_with_same_slug) {
            $duplicated_slugs = Post::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
            $slug = getNewSlug($slug, $duplicated_slugs);
        }

        $post = Post::create([
            'user_id'          => auth()->user()->id,
            'title'            => strip_tags(request('title')),
            'slug'             => $slug,
            'description'      => request('description'),
            'thumbnail'        => ( request()->has('thumbnail') && !empty(request('thumbnail')) ) ? request('thumbnail') : NULL,
            'thumbnail_medium' => ( request()->has('thumbnail_medium') && !empty(request('thumbnail_medium')) )  ? request('thumbnail_medium') : NULL,
            'tags'             => (request()->has('tags')) ? implode(',', request('tags')) : NULL,
            'post_type'        => request()->has('video') && !empty(request('video')) ? 'video' : 'post',
            'status'           => request('status')
        ]);

        if ( request()->has('page_title') && !empty(request('page_title')) ) {
            PostsMeta::setMetaData( $post->id, 'seo_page_title', request('page_title') );
        }
        if ( request()->has('video') && !empty(request('video')) ) {
            PostsMeta::setMetaData( $post->id, 'video', request('video') );
        }

        $tag_categories = TagCategory::all();

        foreach ($tag_categories as $key => $tag_category) {
            if (request()->has('tag_category_' . $tag_category->id)) {

                $tags_input = request('tag_category_' . $tag_category->id);

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


        return response()->json([
            'status' => true,
            'message' => 'Post has been created!'
        ]);
    }

    public function fetchDataAjax($id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json([
                'status' => false,
                'message' => 'Post does not exists.'
            ]);
        }

        $data = [];

        $data['id']           = $post->id;
        $data['title']        = $post->title;
        $data['slug']         = $post->slug;
        $data['description']  = html_entity_decode($post->description);
        $data['thumbnail']    = asset("storage/posts/original/{$post->thumbnail}");
        $video_file           = PostsMeta::getMetaData( $post->id, 'video' );
        $video_extension      = empty( $video_file ) ? '' : substr($video_file, strrpos($video_file,".") + 1);

        $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
        if (isMobileDevice() && File::exists($video_mobile)) {
            $data['video']    = !empty( $video_file ) ? asset("storage/videos/mobile/{$video_file}") : '';
        } else {
            $data['video']    = !empty( $video_file ) ? asset("storage/videos/original/{$video_file}") : '';
        }
        $data['video_type']   = $video_extension == 'mp4' ? 'video/mp4' : ( $video_extension == 'webm' ? 'video/webm' : '' );
        $data['page_title']   = PostsMeta::getMetaData( $post->id, 'seo_page_title' );
        $data['post_date']    = Date('d/m/Y', strtotime($post->created_at));
        $data['status']       = $post->status;

        $tag_categories        = TagCategory::all();
        $posts_tags            = $post->postsTag()->get();
        $all_tags_per_category = [];

        foreach ($tag_categories as $key => $tag_category) {
            $tags_per_category = '';

            foreach ($posts_tags as $post_tags_key => $posts_tag) {
                $tag = Tag::find($posts_tag->tag_id);

                // If they belong to the current tag category -> append
                if ($tag->tag_category_id == $tag_category->id) {
                    $tags_per_category .= $tag->name . ',';
                }
            }

            $tags_per_category = rtrim($tags_per_category, ',');

            $tags_html = ($tags_per_category) ?
                        '<option selected>' .
                            implode('</option><option selected>',
                                explode(',', $tags_per_category)
                            ) .
                        '</option>' : '';

            array_push(
                $all_tags_per_category,
                [
                    'tag_category_id' => $tag_category->id,
                    'tags'            => $tags_html
                ]
            );

        }

        $data['tags'] = json_encode($all_tags_per_category);

        return $data;
    }

    public function ajaxUpdate()
    {
        $post = Post::find(request('id'));

        if(!$post){
            return response()->json([
                'status' => false,
                'message' => 'Post does not exists!'
            ]);            
        }

        $status = request()->has('status') ? request('status') : $post->status;

        // Generate slug
        $slug                = Str::slug(request('slug'), '-');
        $post_with_same_slug = Post::where('slug', $slug)->where('id', '<>', $post->id)->first();

        if ($post_with_same_slug) {
            $duplicated_slugs = Post::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
            $slug = getNewSlug($slug, $duplicated_slugs);
        }

        // change Post Created Time "created_at"
        $created_time = strtotime($post->created_at);
        $created_h = date("H", $created_time);
        $created_m = date("i", $created_time);
        $created_s = date("s", $created_time);

        if (request('post_date')) {
            $date_array = explode('/', request('post_date'));

            $day = $date_array[0];
            $month = $date_array[1];
            $year = $date_array[2];

        } else {
            $day = date("d", time());
            $month = date("m", time());
            $year = date("Y", time());
        }

        $datetime_format = "%s/%s/%s %s:%s:%s";
        $post_date = strtotime(sprintf($datetime_format, $year, $month, $day, $created_h, $created_m, $created_s));

        $post->update([
            'title'            => strip_tags(request('title')),
            'slug'             => $slug,
            'description'      => request('description'),
            'thumbnail'        => ( request()->has('thumbnail') && !empty(request('thumbnail')) ) ? request('thumbnail') : $post->thumbnail,
            'thumbnail_medium' => ( request()->has('thumbnail_medium') && !empty(request('thumbnail_medium')) )  ? request('thumbnail_medium') : $post->thumbnail_medium,
            'tags'             => (request()->has('tags')) ? implode(',', request('tags')) : NULL,
            'created_at'       => $post_date,
            'status'           => $status
        ]);

        if ( request()->has('page_title') && !empty(request('page_title')) ) {
            PostsMeta::setMetaData( $post->id, 'seo_page_title', request('page_title') );
        }

        if ( request()->has('video') && !empty(request('video')) ) {
            PostsMeta::setMetaData( $post->id, 'video', request('video') );
        }

        $tag_categories = TagCategory::all();

        // Delete all previous tags on `posts_tags` table with this post
        $delete_posts_tags = PostsTag::where('post_id', $post->id)->delete();

        foreach ($tag_categories as $key => $tag_category) {
            if (request()->has('tag_category_' . $tag_category->id)) {

                $tags_input = request('tag_category_' . $tag_category->id);

                foreach ($tags_input as $key => $tag_input) {
                    $tag = Tag::where(
                        [
                            'name'            => $tag_input,
                            'tag_category_id' => $tag_category->id
                        ]
                    )->first();

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

        return response()->json([
            'status' => true,
            'message' => 'Post has been updated!'
        ]);
    }

    public function delete()
    {
        $post = Post::find(request('post_id'));

        if(!$post){
            $alert = [
                'message' => 'Post does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        // Clear Rejected reason.
        PostsMeta::deleteMultipleMetaData( $post->id, 'rejected_reason' );

        $post->update( ['status' => 'deleted'] );

        return redirect('admin/posts');
    }

    public function deletePost($post = null)
    {
        if (!$post) {
            return;
        }

        $description      = json_decode($post->description);
        $blocks           = $description->blocks ?? [];

        // Delete video
        $video_file = PostsMeta::getMetaData( $post->id, 'video' );
        if ( !empty($video_file) ) {
            Storage::delete('public/videos/original/' . $video_file);
            Storage::delete('public/videos/mobile/' . $video_file);
            PostsMeta::deleteMetaData( $post->id, 'video' );
        }

        // Delete thumbnails
        if ($post->thumbnail) {
            Storage::delete('public/posts/original/' . $post->thumbnail);
        }

        if ($post->thumbnail_medium) {
            Storage::delete('public/posts/thumbnail/' . $post->thumbnail_medium);
        }

        // Delete records on `posts_tags` table
        $posts_tags = $post->postsTag;

        foreach ($posts_tags as $posts_tag) {
            $posts_tag->delete();
        }

        // Delete Meta.
        PostsMeta::emptyMetaData( $post->id );

        // Finally, delete post
        return $post->delete();
    }

    public function deletePermanently()
    {
        $post = Post::find(request('post_id'));

        if (!$post) {
            $alert = [
                'message' => 'Post does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $this->deletePost($post);

        return redirect('admin/posts');

    }

    public function deleteMultiple(Request $request)
    {
        $selectedIDs     = $request->input('selectedIDs');

        // if nothing is selected just return
        if ($selectedIDs == null) {
            return back();
        }

        // Clear Rejected reason.
        PostsMeta::deleteMultipleMetaData( $selectedIDs, 'rejected_reason' );
        
        Post::whereIn('id', $selectedIDs)->update(['status' => 'deleted']);

        $alert = [
            'message' => 'Posts has been deleted!',
            'class'   => '',
        ];            
        return back()->with('alert', $alert);
    }

    public function emptyTrash()
    {
        // Get posts on trash
        $trashed_posts = Post::where('status', 'deleted')->get();

        foreach ($trashed_posts as $post) {
            $this->deletePost($post);
        }

        return redirect('admin/posts');
    }

    public function restore($id)
    {
        $post = Post::find($id);

        if(!$post){
            $alert = [
                'message' => 'Post does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        // Clear Rejected reason.
        if ( $post->status == 'rejected' ) {
            PostsMeta::deleteMultipleMetaData( $post->id, 'rejected_reason' );
        }

        $post->update(['status' => 'draft']);

        return redirect('admin/posts');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('post::forms');
    }

    public function makePostDraft($id) {
        $post = Post::find($id);
        if (!$post) {
            $alert = [
                'message' => 'Post does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        // Clear Rejected reason.
        PostsMeta::deleteMultipleMetaData( $id, 'rejected_reason' );

        $post->update(['status' => 'draft']);

        return redirect('admin/posts');
    }

    public function makePostPublish($id) {
        $post = Post::find($id);
        if (!$post) {
            $alert = [
                'message' => 'Post does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        // Clear Rejected reason.
        PostsMeta::deleteMultipleMetaData( $id, 'rejected_reason' );

        $post->update(['status' => 'published']);

        return redirect('admin/posts');
    }

    public function posts(Request $request)
    {
        $posts = Post::where(
            [
                'status'    => 'published'
            ]
        )->orderBy('created_at', 'desc');

        $posts = $posts->get();
        $page_title = 'Posts';

        // Set view data
        $data['page_title'] = $page_title;
        $data['posts']      = $posts;
        $data['request']    = $request;

        return view('post::archive.post-archive', $data);
    }

    public function searches(Request $request)
    {
        $q = $request->input('q');

        $posts = Post::where(
            [
                'status'    => 'published'
            ]
        )->orderBy('created_at', 'desc');

        if($request->has('q')) {
            $posts->where('title', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%');
        }

        $posts = $posts->get();
        $page_title = $q ?? 'Posts'; // If there's no search query -> set title to `Posts`

        // Set view data
        $data['page_title'] = $page_title;
        $data['posts']      = $posts;
        $data['q']          = $q;
        $data['request']    = $request;

        return view('post::archive.search-archive', $data);
    }

    public function singlePost($slug)
    {
        $post = Post::firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        $data['post']       = $post;
        $data['page_title'] = $post->title;
        $data['video'] = PostsMeta::getMetaData( $post->id, 'video' );
        $data['video_type']   = empty( $data['video'] ) ? '' : ( end( explode( '.', $data['video'] ) ) == 'mp4' ? 'video/mp4' : ( end( explode( '.', $data['video'] ) ) == 'webm' ? 'video/webm' : '' ) );
        return view('post::templates.post-template', $data);
    }

    public function singlePostbyTheme($theme, $slug)
    {
        $post = Post::firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        $data['post']       = $post;
        $data['page_title'] = $post->title;
        $data['theme'] = $theme;
        $data['video'] = PostsMeta::getMetaData( $post->id, 'video' );
        $data['video_type']   = empty( $data['video'] ) ? '' : ( end( explode( '.', $data['video'] ) ) == 'mp4' ? 'video/mp4' : ( end( explode( '.', $data['video'] ) ) == 'webm' ? 'video/webm' : '' ) );
        return view('post::templates.post-template-v1', $data);
    }

    public function ajaxShowPosts($page_num)
    {
        // This return all post type, so no need to filter for 'post' only.
        $perpage = 20;
        $offset = ($page_num - 1) * $perpage;
        $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('users_settings', 'users_settings.user_id', '=', 'users.id')
            ->leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
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
            )
            ->orderBy('created_at', 'desc')
            ->offset($offset)
            ->limit($perpage);

        $posts = $posts->get();

        $posts_count = Post::where([
            'status' => 'published'
        ])->count();

        $data['total'] = $posts_count;
        $data['posts'] = $posts;
        $data['api_route'] = 'posts';
        $data['nextpage'] = ($posts_count - $offset - $perpage) > 0 ? ($page_num + 1) : 0;

        return view('post::templates.post-masonry-load', $data);
    }

    public function ajaxShowPostsByUser($user_id, $page_num)
    {
        // This return all post type, so no need to filter for 'post' only.
        $perpage = 20;
        $offset = ($page_num - 1) * $perpage;
        $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('users_settings', 'users_settings.user_id', '=', 'users.id')
            ->leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
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
                    'posts.user_id' => $user_id,
                    'posts.status'  => 'published'
                ]
            )
            ->orderBy('created_at', 'desc')
            ->offset($offset)
            ->limit($perpage);

        $posts = $posts->get();

        $posts_count = Post::where([
            'user_id' => $user_id,
            'status' => 'published'
        ])->count();

        $data['total'] = $posts_count;
        $data['posts'] = $posts;
        $data['api_route'] = 'posts/user/' . $user_id;
        $data['nextpage'] = ($posts_count - $offset - $perpage) > 0 ? ($page_num + 1) : 0;

        return view('post::templates.post-masonry-load', $data);
    }

    public function ajaxShowPostsByTag($tag, $page_num)
    {
        // This return all post type, so no need to filter for 'post' only.
        $perpage = 20;
        $offset = ($page_num - 1) * $perpage;
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
            )
            ->groupBy('posts.id')
            ->orderBy('relevance', 'desc')
            ->orderBy('posts.updated_at', 'desc')
            ->offset($offset)
            ->limit($perpage);

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

        $posts_count = Post::leftJoin('posts_tags', 'posts_tags.post_id', '=', 'posts.id')
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
            )
            ->groupBy('posts.id')->count();

        $data['total'] = $posts_count;
        $data['posts'] = $posts;
        $data['type'] = 'tag';
        $data['api_route'] = 'posts/tag/' . $tag;
        $data['nextpage'] = ($posts_count - $offset - $perpage) > 0 ? ($page_num + 1) : 0;

        return view('post::templates.post-masonry-load', $data);
    }    

    public function ajaxInfiniteLoadPost($post_id, $page_num) {
        // This requires to filter 'post' only.
        $tags = Post::find($post_id)->getTagNames();

        $perpage = 1;
        $offset = ($page_num - 1) * $perpage;

        $posts = Post::leftJoin('posts_tags', 'posts_tags.post_id', '=', 'posts.id')
            ->leftJoin('tags', 'posts_tags.tag_id', '=', 'tags.id')
            ->select([
                'posts.id',
                DB::raw('COUNT(*) as relevance')
            ])
            ->where('posts.id', '<>', $post_id)
            ->whereIn('tags.name', $tags)
            ->where(
                [
                    'posts.status'    => 'published'
                ]    
            )
            ->groupBy('posts.id')
            ->orderBy('relevance', 'desc')
            ->orderBy('posts.updated_at', 'desc')
            ->offset($offset)
            ->limit($perpage);

        $new_post_info = $posts->get()->first();

        $post = null;
        if ($new_post_info) {
            $post = Post::find($new_post_info['id']);

            if ($post) {
                $post['description'] = Post::parseContent($post['description']);
                $video_file          = PostsMeta::getMetaData( $post->id, 'video' );
                $video_extension     = empty( $video_file ) ? '' : substr($video_file, strrpos($video_file,".") + 1);

                $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
                if (isMobileDevice() && File::exists($video_mobile)) {
                    $post['video']    = !empty( $video_file ) ? asset("storage/videos/mobile/{$video_file}") : '';
                } else {
                    $post['video']    = !empty( $video_file ) ? asset("storage/videos/original/{$video_file}") : '';
                }

                $post['video_type']  = $video_extension == 'mp4' ? 'video/mp4' : ( $video_extension == 'webm' ? 'video/webm' : '' );
                $post['seo_title']   = $post['title'] . ' | [sitetitle]';
                $post['url'] = 'post/' . $post['slug'];
            }
        }

        $posts_count = Post::leftJoin('posts_tags', 'posts_tags.post_id', '=', 'posts.id')
            ->leftJoin('tags', 'posts_tags.tag_id', '=', 'tags.id')
            ->select([
                'posts.id',
            ])
            ->where('posts.id', '<>', $post_id)
            ->whereIn('tags.name', $tags)
            ->where(
                [
                    'posts.status'    => 'published'
                ]    
            )->groupBy('posts.id');
        $posts_count = count($posts_count->get());

        $tag_pills = $post ? $post->getTagNames() : [];

        $data['total'] = $posts_count;
        $data['post'] = $post;
        $data['tag_pills'] = $tag_pills;
        $data['nextpage'] = ($posts_count - $offset - $perpage) > 0 ? ($page_num + 1) : 0;
        return view('post::templates.post-infinite-load', $data);
    }

    public function makePostReject() {
        $post = Post::find(request('id'));
        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post does not exists!'
            ]);
    
            return redirect()->back()->with('alert', $alert);    
        }

        if ( $post->status != 'pending' ) {
            return response()->json([
                'status' => false,
                'message' => 'The post is not pending post'
            ]);
    
            return redirect()->back()->with('alert', $alert);    
        }

        // Save Rejected reason.
        PostsMeta::insertMetaData( $post->id, 'rejected_reason', request('message') );

        $post->update(['status' => 'rejected']);
       
        return response()->json([
            'status' => true,
            'message' => 'Post has been rejected.'
        ]);
    }

    public function getRejectedPosts()
    {
        $posts = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('posts_metas', 'posts.id', '=', 'posts_metas.post_id')
            ->select([
                'posts.id',
                'title',
                'slug',
                'posts.created_at as created_at',
                'thumbnail',
                'thumbnail_medium',
                'posts.status as status',
                'posts_metas.meta_value as reject_reason',
                'users.username as username'
            ])->orderBy('created_at', 'desc');

        if(request()->has('postsearch')){
            $posts->where('title', 'LIKE', '%' . request('postsearch') . '%')
            ->orWhere('users.name', 'LIKE', '%' . request('postsearch') . '%');
        }

        $posts = $posts->where('posts.status', 'rejected')->where('meta_key', '=', 'rejected_reason');

        $limit = request('limit') ? request('limit') : 25;

        $posts = $posts->paginate($limit, ['*'], 'r_page');

        return $posts;
    }
}
