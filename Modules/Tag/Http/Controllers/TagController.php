<?php

namespace Modules\Tag\Http\Controllers;

use File;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use DB;

use Modules\Tag\Entities\{Tag, TagsMeta};
use Modules\Tag\Entities\TagCategory;
use Modules\Users\Entities\User;
use Modules\Post\Entities\{PostSetting, PostsTag, Post};

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $bladeTemplate = $request->ajax() ? 'tag::partials.table' : 'tag::index';

        // Get query strings
        $q               = $request->input('q');
        $tag_category_id = $request->input('tag_category_id');
        $limit           = $request->input('limit') ? $request->input('limit') : 25;
        $sort            = $request->input('sort') ? $request->input('sort') : 'id';
        $order           = $request->input('order') ? $request->input('order') : 'desc';

        // Get tag categories from db
        $tag_categories = TagCategory::all();

        // Get tags from db
        $tags = Tag::select(
                    'tags.id',
                    'tags.name',
                    'tags.status',
                    'tags.created_at',
                    'tags.updated_at',
                    'tag_categories.id as category_id',
                    'tag_categories.name as category_name'
                )->join('tag_categories', 'tag_categories.id', '=', 'tags.tag_category_id');

        // Set sorting and order
        $tags = $tags->orderBy($sort, $order);

        // Check tag category id
        if ($tag_category_id) {
            $tags = $tags->where('tag_categories.id', $tag_category_id);
        }


        // If search query is not null then apply where clauses
        if ($q != null) {
            $tags = $tags->where('tags.name', 'LIKE', '%' . $q . '%');
            $tags = $tags->whereIn('status', ['published', 'draft', 'trashed']);
        } else {
            // Check if tag is trashed
            $tags = (request()->has('status')) ? $tags->where('tags.status', request('status')) : $tags->where('tags.status', 'published');
        }

        // Paginate
        $tags = $tags->paginate($limit);

        // Counters
        $data['published_tags_count']  = Tag::where([
            ['status', 'published'],
        ])->count();

        $data['draft_tags_count']  = Tag::where([
            ['status', 'draft'],
        ])->count();

        $data['suspended_tags_count']  = Tag::where([
            ['status', 'suspended'],
        ])->count();

        $data['trash_tags_count']  = Tag::where([
            ['status', 'trashed']
        ])->count();



        // Prepare data to view
        $data['q']               = $q;
        $data['limit']           = $limit;
        $data['order']           = $order;
        $data['sort']            = $sort;
        $data['tags']            = $tags;
        $data['tag_categories']  = $tag_categories;
        $data['status']          = (request()->has('status')) ? request('status') : 'published';
        $data['tag_category_id'] = $tag_category_id;
        $data['request']         = $request;

        return view($bladeTemplate, $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tag::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        // Set default response
        $response = [
            'status'  => 'error',
            'message' => 'Failed to save tag. Please try again.',
        ];

        // validate data
        $this->validate($request,[
            'tag_name'        => ['required', 'max:255'],
            'tag_category_id' => ['required', 'exists:tag_categories,id'],
        ]);

        $id       = $request->input('tag_id');
        $updating = ($id > 0);

        // Insert or update tag to db table
        $tag                  = $updating ? Tag::find($id) : new Tag;
        $tag->name            = $request->input('tag_name');
        $tag->tag_category_id = $request->input('tag_category_id');
        if ($updating == false) {
            $tag->status = $request->boolean('tag_publish') ? 'published' : 'draft';
        }

        $saved = $tag->save();

        if ( request()->has('tag_description') && !empty(request('tag_description')) ) {
            TagsMeta::setMetaData( $tag->id, 'description', request('tag_description') );
        }
        if ( request()->has('tag_seo_title') && !empty(request('tag_seo_title')) ) {
            TagsMeta::setMetaData( $tag->id, 'seo_page_title', request('tag_seo_title') );
        }
        if ( request()->has('video') && !empty(request('video')) ) {
            TagsMeta::setMetaData( $tag->id, 'video', request('video') );
        }
        if ( request()->has('thumbnail') && !empty(request('thumbnail')) ) {
            TagsMeta::setMetaData( $tag->id, 'thumbnail', request('thumbnail') );
        }
        if ( request()->has('thumbnail_medium') && !empty(request('thumbnail_medium')) ) {
            TagsMeta::setMetaData( $tag->id, 'thumbnail_medium', request('thumbnail_medium') );
        }

        if ($saved) {
            $response = [
                'status'        => 'success',
                'message'       => 'Tag has been saved.'
            ];
        }

        return response()->json($response);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        $tag['submit_url'] = route('tag.store');

        $tag['description']  = html_entity_decode(TagsMeta::getMetaData( $tag->id, 'description' ));
        $thumbnail           = TagsMeta::getMetaData( $tag->id, 'thumbnail' );
        $tag['thumbnail']    = asset("storage/tags/original/{$thumbnail}");
        $video_file          = TagsMeta::getMetaData( $tag->id, 'video' );
        $video_extension     = empty( $video_file ) ? '' : substr($video_file, strrpos($video_file,".") + 1);

        $video_mobile = storage_path() . '/app/public/videos/mobile/' . $video_file;
        if (isMobileDevice() && File::exists($video_mobile)) {
            $tag['video']    = !empty( $video_file ) ? asset("storage/videos/mobile/{$video_file}") : '';
        } else {
            $tag['video']    = !empty( $video_file ) ? asset("storage/videos/original/{$video_file}") : '';
        }

        $tag['video_type']   = $video_extension == 'mp4' ? 'video/mp4' : ( $video_extension == 'webm' ? 'video/webm' : '' );
        $tag['seo_title']    = TagsMeta::getMetaData( $tag->id, 'seo_page_title' );

        $response = [
            'status'  => 'success',
            'message' => 'Data successfully fetched',
            'data'    => $tag,
        ];

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $responseMessage = 'Something went wrong. Please try again.';

        // If tag not found
        if (!$tag) {
            return back()->with('responseMessage', 'Tag not found.');
        }

        // Delete video
        $video_file = TagsMeta::getMetaData( $tag->id, 'video' );
        if ( !empty($video_file) ) {
            Storage::delete('public/videos/original/' . $video_file);
            Storage::delete('public/videos/mobile/' . $video_file);
        }

        // Delete thumbnails
        $thumbnail = TagsMeta::getMetaData( $tag->id, 'thumbnail' );
        if ( !empty($thumbnail) ) {
            Storage::delete('public/tags/original/' . $thumbnail);
        }

        $thumbnail_medium = TagsMeta::getMetaData( $tag->id, 'thumbnail_medium' );
        if ( !empty($thumbnail_medium) ) {
            Storage::delete('public/tags/thumbnail/' . $thumbnail_medium);
        }

        // Delete Meta.
        TagsMeta::emptyMetaData( $tag->id );

        $post_tag = PostsTag::firstWhere('tag_id', $tag->id);

        if ($post_tag) {
            // remove all post tags related with current tag
            PostsTag::where('tag_id', $tag->id)->delete();
        }

        $deleted = $tag->delete();

        if ($deleted) {
            $responseMessage = 'Tag "'. $tag->name . '" has been deleted.';
        }else{
            $responseMessage = 'Failed to delete tag "'. $tag->name . '". Please try again.';
        }

        return back()->with('responseMessage', $responseMessage);
    }

    /**
     * Update is_trashed to 1 from tag table.
     * @param int $id
     * @return Response
     */
    public function trash($id)
    {
        $tag = Tag::find($id);
        $responseMessage = 'Something went wrong. Please try again.';

        // If tag not found
        if (!$tag) {
            return back()->with('responseMessage', 'Tag not found.');
        }

        $tag->status = 'trashed';
        $deleted     = $tag->save();

        if ($deleted) {
            $responseMessage = 'Tag "'. $tag->name . '" has been moved to trash.';
        }else{
            $responseMessage = 'Failed to move tag "'. $tag->name . '" to trash. Please try again.';
        }

        return back()->with('responseMessage', $responseMessage);
    }

    public function deleteTag($tag = null)
    {
        if (!$tag)
            return;

        // Delete video
        $video_file = TagsMeta::getMetaData( $tag->id, 'video' );
        if ( !empty($video_file) ) {
            Storage::delete('public/videos/original/' . $video_file);
            Storage::delete('public/videos/mobile/' . $video_file);
        }

        // Delete thumbnails
        $thumbnail = TagsMeta::getMetaData( $tag->id, 'thumbnail' );
        if ( !empty($thumbnail) ) {
            Storage::delete('public/tags/original/' . $thumbnail);
        }

        $thumbnail_medium = TagsMeta::getMetaData( $tag->id, 'thumbnail_medium' );
        if ( !empty($thumbnail_medium) ) {
            Storage::delete('public/tags/thumbnail/' . $thumbnail_medium);
        }

        // Delete Meta.
        TagsMeta::emptyMetaData( $tag->id );

        $post_tag = PostsTag::firstWhere('tag_id', $tag->id);

        if ($post_tag) {
            // remove all post tags related with current tag
            PostsTag::where('tag_id', $tag->id)->delete();
        }

        return $tag->delete();
    }
    
    /**
     * Empty trash
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyTrash()
    {
        $trashed_tags = Tag::where('status', 'trashed')->get();

        foreach ($trashed_tags as $tag) {
            $this->deleteTag($tag);
        }

        $responseMessage = 'Trash has been empty.';

        return back()->with('responseMessage', $responseMessage);
    }

    public function bulkTrash(Request $request)
    {
        $selectedIDs     = $request->input('selectedIDs');
        $responseMessage = '';

        // if nothing is selected just return
        if ($selectedIDs == null) {
            return back();
        }

        foreach ($selectedIDs as $key => $id) {
            $tag = Tag::find($id);

            if ($tag) {
                $tag->status = 'trashed';
                $tag->save();

                $responseMessage .= 'Tag "' . $tag->name . '" has been moved to trash.';
                $responseMessage .= '</br>';

            }else{
                $responseMessage .= 'Tag with ID: '. $id . 'is not found.';
                $responseMessage .= '</br>';
            }
        }

        return back()->with('responseMessage', $responseMessage);
    }

    public function bulkDelete(Request $request)
    {
        $selectedIDs     = $request->input('selectedIDs');
        $responseMessage = '';

        // if nothing is selected just return
        if ($selectedIDs == null) {
            return back();
        }

        foreach ($selectedIDs as $key => $id) {
            $tag = Tag::find($id);

            if ($tag) {
                $this->deleteTag($tag);

                $responseMessage .= 'Tag "' . $tag_name . '" has been deleted.';
                $responseMessage .= '</br>';

            }else{
                $responseMessage .= 'Tag with ID: '. $id . 'is not found.';
                $responseMessage .= '</br>';
            }
        }

        return back()->with('responseMessage', $responseMessage);

    }

    public function draft(Request $request, $id)
    {
        $tag = Tag::find($id);
        $responseMessage = 'Something went wrong. Please try again.';

        // If tag not found
        if (!$tag) {
            return back()->with('responseMessage', 'Tag not found.');
        }

        $tag->status = 'draft';
        $saved       = $tag->save();

        if ($saved) {
            $responseMessage = 'Tag "'. $tag->name . '" has been moved to drafts.';
        }else{
            $responseMessage = 'Failed to move tag "'. $tag->name . '" to drafts. Please try again.';
        }

        return back()->with('responseMessage', $responseMessage);

    }

    public function publish(Request $request, $id)
    {
        $tag = Tag::find($id);
        $responseMessage = 'Something went wrong. Please try again.';

        // If tag not found
        if (!$tag) {
            return back()->with('responseMessage', 'Tag not found.');
        }

        $tag->status = 'published';
        $saved       = $tag->save();

        if ($saved) {
            $responseMessage = 'Tag "'. $tag->name . '" has been published.';
        }else{
            $responseMessage = 'Failed to publish tag "'. $tag->name . '". Please try again.';
        }

        return back()->with('responseMessage', $responseMessage);
    }

    public function tags(Request $request, $tag_query = null)
    {

        // If tag is not found -> return 404 | Not Found
        if (!$tag_query) {
            abort(404);
        }

        $posts = Post::getByTagNames([$tag_query]);

        $tag = Tag::firstWhere('name', $tag_query);

        $page_title = $tag_query;
        if ($tag)
            $page_title = $tag->name;

        // Get additional tag info.
        $data['page_title'] = $page_title;
        $data['thumbnail']  = $tag->getThumbnail('medium') != false ? $tag->showThumbnail('medium') : false;
        $data['description'] = Post::parseContent(TagsMeta::getMetaData($tag->id, 'description'));
        $data['posts']      = $posts;

        return view('templates.layouts.tag', $data);
    }
}
