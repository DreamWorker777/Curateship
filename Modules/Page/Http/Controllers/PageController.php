<?php

namespace Modules\Page\Http\Controllers;

use Arr, Str, Image, File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;

use App\Http\Controllers\Controller;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    public function cleanupEditorImages()
    {
        // `$directory` path value must be the value from `uploadImage` method
        // `uploadImage` method at app/Http/Controllers/EditorjsController.php

        $directory = 'public/editorjs-images';
        $files     = Storage::files($directory);

        foreach ($files as $file) {
            $file_name    = basename($file);
            $file_on_page = Page::firstWhere('description', 'LIKE', '%' . $file_name . '%');

            // model is null -> delete
            if (!$file_on_page) {
                Storage::delete($file);
            }
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Cleanup unused images created with editorjs
        // $this->cleanupEditorImages();

        $view = request()->ajax() ? 'page::partials.table' : 'page::index';

        $pages = Page::leftJoin('users', 'pages.user_id', '=', 'users.id')
            ->select([
                'pages.id',
                'title',
                'slug',
                'pages.created_at as created_at',
                'is_deleted',
                'is_pending',
                'is_published',
                'users.username as username'
            ])->orderBy('created_at', 'desc');

        if(request()->has('pagesearch')){
            $pages->where('title', 'LIKE', '%' . request('pagesearch') . '%')
            ->orWhere('users.name', 'LIKE', '%' . request('pagesearch') . '%');
        }

        $pages = (request()->has('is_trashed'))
            ? $pages->where('is_deleted', 1)
            : $pages->where('is_deleted', 0);

        if(!request()->has('is_trashed')){
            $pages = (request()->has('is_draft'))
                ? $pages->where('is_published', 0)->where('is_pending', 0)
                : (request()->has('is_pending') ? $pages->where('is_published', 0)->where('is_pending', 1)->where('is_rejected', 0) : $pages->where('is_published', 1));
        }

        $limit = request('limit') ? request('limit') : 25;

        $pages = $pages->paginate($limit);

        $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->count();
        $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->count();
        $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->count();
        $pages_deleted_count = Page::where('is_deleted', 1)->count();

        $availableLimit = ['25', '50', '100', '150', '200'];

        $request    = request();
        $is_trashed = request('is_trashed');
        $is_draft   = request('is_draft');
        $is_pending = request('is_pending');

        // Generate `slug` if it's not yet set
        foreach ($pages as $page) {
            if (!$page->slug) {
                $slug                = Str::slug($page->title, '-');
                $page_with_same_slug = Page::where('slug', $slug)->where('id', '<>', $page->id)->first();

                if ($page_with_same_slug) {
                    $duplicated_slugs = Page::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
                    $slug = getNewSlug($slug, $duplicated_slugs);
                }

                $page->slug = $slug;
                $page->save();
            }
        }

        // get rejected pages
        $rejected_pages = [];
        if ($is_pending) {
            $rejected_pages = $this->getRejectedPages();
        }

        return view($view, compact(
            'pages', 'rejected_pages', 'pages_published_count', 'pages_draft_count', 'pages_pending_count', 'pages_deleted_count',
            'availableLimit', 'limit', 'request', 'is_trashed', 'is_draft', 'is_pending'
            )
        );
        return view('page::index');
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
        $page_with_same_slug = Page::firstWhere('slug', $slug);

        if ($page_with_same_slug) {
            $duplicated_slugs = Page::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
            $slug = getNewSlug($slug, $duplicated_slugs);
        }

        $page = Page::create([
            'user_id'          => auth()->user()->id,
            'title'            => strip_tags( request('title') ),
            'slug'             => $slug,
            'description'      => request('description'),
            'seo_page_title'   => request('page_title') ?: NULL,
            'is_pending'       => 0,
            'is_published'     => request('is_published')
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Page has been created!'
        ]);
    }

    public function fetchDataAjax($id)
    {
        $page = Page::find($id);

        if(!$page){
            return response()->json([
                'status' => false,
                'message' => 'Page does not exists.'
            ]);
        }

        $data = [];

        $data['id']           = $page->id;
        $data['title']        = $page->title;
        $data['slug']         = $page->slug;
        $data['description']  = html_entity_decode($page->description);
        $data['page_title']   = $page->seo_page_title;
        $data['page_date']    = Date('d/m/Y', strtotime($page->created_at));
        $data['is_published'] = $page->is_published;
        $data['is_deleted']   = $page->is_deleted;

        return $data;
    }

    public function ajaxUpdate()
    {
        $page = Page::find(request('id'));

        if(!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page does not exists!'
            ]);            
        }

        $is_published = request('is_published') ?? $page->is_published;
	    $is_pending = 0;
	    $is_rejected = 0;

        // Generate slug
        $slug                = Str::slug(request('slug'), '-');
        $page_with_same_slug = Page::where('slug', $slug)->where('id', '<>', $page->id)->first();

        if ($page_with_same_slug) {
            $duplicated_slugs = Page::select('slug')->where('slug', 'like', $slug . '%')->orderBy('slug', 'desc')->get();
            $slug = getNewSlug($slug, $duplicated_slugs);
        }

        // change Page Created Time "created_at"
        $created_time = strtotime($page->created_at);
        $created_h = date("H", $created_time);
        $created_m = date("i", $created_time);
        $created_s = date("s", $created_time);

        if (request('page_date')) {
            $date_array = explode('/', request('page_date'));

            $day = $date_array[0];
            $month = $date_array[1];
            $year = $date_array[2];

        } else {
            $day = date("d", time());
            $month = date("m", time());
            $year = date("Y", time());
        }

        $datetime_format = "%s/%s/%s %s:%s:%s";
        $page_date = strtotime(sprintf($datetime_format, $year, $month, $day, $created_h, $created_m, $created_s));

        $page->update([
            'title' => strip_tags( request('title') ),
            'slug' => $slug,
            'description' => request('description'),
            'seo_page_title' => request('page_title') ?: NULL,
            'created_at' => $page_date,
            'is_published' => $is_published,
            'is_pending' => $is_pending,
            'is_rejected' => $is_rejected
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Page has been updated!'
        ]);
    }

    public function delete()
    {
        $page = Page::find(request('page_id'));

        if(!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_deleted' => 1, 'is_published' => 0, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);

        return redirect('admin/pages');
    }

    public function deletePage($page = null)
    {
        if (!$page) {
            return;
        }

        $description      = json_decode($page->description);
        $blocks           = $description->blocks ?? [];

        // Finally, delete page
        return $page->delete();
    }

    public function deletePermanently()
    {
        $page = Page::find(request('page_id'));

        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $this->deletePage($page);

        return redirect('admin/pages');
    }

    public function deleteMultiple(Request $request)
    {
        $selectedIDs     = $request->input('selectedIDs');

        // if nothing is selected just return
        if ($selectedIDs == null) {
            return back();
        }
        
        Page::whereIn('id', $selectedIDs)->update(['is_deleted' => 1, 'is_rejected' => 0, 'reject_reason' => '']);

        $alert = [
            'message' => 'Page has been deleted!',
            'class'   => '',
        ];            
        return back()->with('alert', $alert);
    }

    public function emptyTrash()
    {

        // Get pages on trash
        $trashed_pages = Page::where('is_deleted', 1)->get();

        foreach ($trashed_pages as $page) {
            $this->deletePage($page);
        }

        return redirect('admin/pages');
    }    

    public function restore($id)
    {
        $page = Page::find($id);

        if(!$page){
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_deleted' => 0, 'is_pending' => 0, 'is_published' => 0]);

        return redirect('admin/pages');
    }

    public function makePageDraft($id) {
        $page = Page::find($id);
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_published' => 0, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);

        return redirect('admin/pages');
    }

    public function makePagePublish($id) {
        $page = Page::find($id);
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_published' => 1, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);

        return redirect('admin/pages');
    }

    public function pages(Request $request)
    {
        $pages = Page::where(
            [
                'is_published' => true,
                'is_pending'   => false,
                'is_deleted'   => false
            ]
        )->orderBy('created_at', 'desc');

        $pages = $pages->get();
        $page_title = 'Pages';

        // Set view data
        $data['page_title'] = $page_title;
        $data['pages']      = $pages;
        $data['request']    = $request;

        return view('page::archive.page-archive', $data);
    }

    public function searches(Request $request)
    {
        $q = $request->input('q');

        $pages = Page::where(
            [
                'is_published' => true,
                'is_pending'   => false,
                'is_deleted'   => false
            ]
        )->orderBy('created_at', 'desc');

        if($request->has('q')) {
            $pages->where('title', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%');
        }

        $pages = $pages->get();
        $page_title = $q ?? 'Pages'; // If there's no search query -> set title to `Pages`

        // Set view data
        $data['page_title'] = $page_title;
        $data['pages']      = $pages;
        $data['q']          = $q;
        $data['request']    = $request;

        return view('page::archive.search-archive', $data);
    }

    public function makePageReject() {
        $page = Page::find(request('id'));
        if (!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page does not exists!'
            ]);
    
            return redirect()->back()->with('alert', $alert);    
        }

        if (! $page->is_pending) {
            return response()->json([
                'status' => false,
                'message' => 'This page is not pending'
            ]);
    
            return redirect()->back()->with('alert', $alert);    
        }

        $page->update(['is_rejected' => 1, 'reject_reason' => request('message')]);
        
        return response()->json([
            'status' => true,
            'message' => 'Page has been rejected.'
        ]);
    }

    public function getRejectedPages()
    {
        $pages = Page::leftJoin('users', 'pages.user_id', '=', 'users.id')
            ->select([
                'pages.id',
                'title',
                'slug',
                'pages.created_at as created_at',
                'is_deleted',
                'is_pending',
                'is_published',
                'is_rejected',
                'reject_reason',
                'users.username as username'
            ])->orderBy('created_at', 'desc');

        if(request()->has('pagesearch')){
            $pages->where('title', 'LIKE', '%' . request('pagesearch') . '%')
            ->orWhere('users.name', 'LIKE', '%' . request('pagesearch') . '%');
        }

        $pages = $pages->where('is_published', 0)->where('is_pending', 1)->where('is_rejected', 1);

        $limit = request('limit') ? request('limit') : 25;

        $pages = $pages->paginate($limit, ['*'], 'r_page');

        return $pages;
    }
}
