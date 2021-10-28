<?php

namespace Modules\Users\Http\Controllers;

use Arr, Str, Image, File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Modules\Page\Entities\{ PageSetting, Page };

class DashboardPagesController extends Controller
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

    public function index()
    {
        // Cleanup unused images created with editorjs
        // $this->cleanupEditorImages();

        $view = request()->ajax() ? 'users::pages.table' : 'users::pages.index';

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

        if (!auth()->user()->isAdmin()) {
            // get user specific pages only
            $pages = $pages->where('user_id', auth()->user()->id);
        }

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

        if (auth()->user()->isAdmin()) {
            // get all pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->count();
    
        } else {
            // get user specific pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->where('user_id', auth()->user()->id)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->where('user_id', auth()->user()->id)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->where('user_id', auth()->user()->id)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->where('user_id', auth()->user()->id)->count();    
        }

        $availableLimit = ['25', '50', '100', '150', '200'];

        $request    = request();
        $is_trashed = request('is_trashed');
        $is_draft   = request('is_draft');
        $is_pending = request('is_pending');
        $pagesearch = request('pagesearch');

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
            'availableLimit', 'limit', 'request', 'pagesearch', 'is_trashed', 'is_draft', 'is_pending'
            )
        );
    }

    public function addPage() {
        if (auth()->user()->isAdmin()) {
            // get all pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->count();

        } else {
            // get user specific pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->where('user_id', auth()->user()->id)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->where('user_id', auth()->user()->id)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->where('user_id', auth()->user()->id)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->where('user_id', auth()->user()->id)->count();    
        }

        return view('users::pages.new-page', compact(
            'pages_published_count', 'pages_draft_count', 'pages_pending_count', 'pages_deleted_count'
            )
        );
    }

    public function settings()
    {
        if (auth()->user()->isAdmin()) {
            // get all pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->count();

        } else {
            // get user specific pages count
            $pages_published_count = Page::where('is_deleted', 0)->where('is_published', 1)->where('user_id', auth()->user()->id)->count();
            $pages_draft_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 0)->where('user_id', auth()->user()->id)->count();
            $pages_pending_count = Page::where('is_deleted', 0)->where('is_published', 0)->where('is_pending', 1)->where('user_id', auth()->user()->id)->count();
            $pages_deleted_count = Page::where('is_deleted', 1)->where('user_id', auth()->user()->id)->count();    
        }

        $pages_settings = PageSetting::first();

        return view('users::pages.settings', compact(
            'pages_published_count', 'pages_draft_count', 'pages_pending_count', 'pages_deleted_count', 'pages_settings'
            )
        );
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

        $is_published = (request('is_published') && !auth()->user()->isRegisteredUser()) ?? 1;
        $is_pending = (request('is_published') && auth()->user()->isRegisteredUser()) ?? 1;

        $page = Page::create([
            'user_id'          => auth()->user()->id,
            'title'            => strip_tags(request('title')),
            'slug'             => $slug,
            'description'      => request('description'),
            'seo_page_title'   => request('page_title') ?: NULL,
            'is_pending'       => $is_pending,
            'is_published'     => $is_published
        ]);

        $alert = [
            'message' => 'Page has been created!',
            'class'   => 'alert--success',
        ];

        if ($is_pending) {
            $alert['message'] = 'Your page will be reviewed soon.';
        }

        if (request()->has('redirect'))
            return redirect('pages')->with('alert', $alert);
        else
            return redirect()->back()->with('alert', $alert);
    }

    public function fetchDataAjax($id)
    {
        $page = $this->getPage($id);
        if (!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page does not exists.'
            ]);
        }

        if (!auth()->user()->isAdmin() && $page->is_published && !$page->is_deleted) {
            $alert = [
                'status' => false,
                'message' => 'Published page cannot be edited. Please email us if there is a mistake on your page',
                'class'   => 'alert--error',
            ];
    
            return json_encode($alert);
        }

        $data = [];

        $data['id']           = $page->id;
        $data['title']        = $page->title;
        $data['description']  = html_entity_decode($page->description);
        $data['page_date']    = Date('d/m/Y', strtotime($page->created_at));
        $data['is_published'] = $page->is_published;
        $data['is_deleted']   = $page->is_deleted;

        return $data;
    }

    public function ajaxUpdate()
    {
        $page = $this->getPage(request('page_id'));
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists!',
                'class'   => 'alert--error',
            ];
    
            return redirect()->back()->with('alert', $alert);    
        }

        if (!auth()->user()->isAdmin() && $page->is_published && !$page->is_deleted) {
            $alert = [
                'message' => 'You are not authorized to edit published page',
                'class'   => 'alert--error',
            ];
    
            return redirect()->back()->with('alert', $alert);    
        }

        $is_published = ($page->is_published && auth()->user()->isAdmin()) ? 1 : ((request('is_published') && !auth()->user()->isRegisteredUser()) ? 1 : 0);
        $is_pending = (request('is_published') && auth()->user()->isRegisteredUser()) ? 1 : 0;
        $is_rejected = 0;

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
            'title' => strip_tags(request('title')),
            'description' => request('description'),
            'created_at' => $page_date,
            'is_published' => $is_published,
            'is_pending' => $is_pending,
            'is_rejected' => $is_rejected
        ]);

        $alert = [
            'message' => 'Page has been updated!',
            'class'   => 'alert--success',
        ];

        if ($is_pending) {
            $alert['message'] = 'Your page will be reviewed soon.';
        }

        return redirect()->back()->with('alert', $alert);
    }

    public function delete()
    {
        $page = $this->getPage(request('page_id'));
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_deleted' => 1, 'is_published' => 0, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);

        return redirect('pages');
    }

    public function deletePage($page = null)
    {
        if (!$page) {
            return;
        }

        $description      = json_decode($page->description);
        $blocks           = $description->blocks ?? [];

        return $page->delete();
    }

    public function deletePermanently()
    {
        if (!auth()->user()->isAdmin()) {
            $alert = [
                'message' => 'You are not authorized to delete page permanently.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page = Page::find(request('page_id'));

        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $this->deletePage($page);

        return redirect('pages');
    }

    public function deleteMultiple(Request $request)
    {
        $selectedIDs     = $request->input('selectedIDs');

        // if nothing is selected just return
        if ($selectedIDs == null) {
            return back();
        }

        if ( auth()->user()->isAdmin() ) {
            Page::whereIn('id', $selectedIDs)->update(['is_deleted' => 1, 'is_rejected' => 0, 'reject_reason' => '']);
        } else {
            Page::where('user_id', auth()->user()->id)->whereIn('id', $selectedIDs)->update(['is_deleted' => 1, 'is_rejected' => 0, 'reject_reason' => '']);
        }

        $alert = [
            'message' => 'Pages has been deleted!',
            'class'   => '',
        ];
        return back()->with('alert', $alert);
    }

    public function emptyTrash()
    {
        // Get pages on trash
        if ( auth()->user()->isAdmin() ) {
            $trashed_pages = Page::where('is_deleted', 1)->get();
        } else {
            $trashed_pages = Page::where('user_id', auth()->user()->id)->where('is_deleted', 1)->get();
        }

        foreach ($trashed_pages as $page) {
            $this->deletePage($page);
        }

        return redirect('pages');
    }

    public function restore($id)
    {
        $page = $this->getPage($id);
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_deleted' => 0, 'is_pending' => 0, 'is_published' => 0]);

        return redirect('pages');
    }

    public function makePageDraft($id) {
        $page = $this->getPage($id);
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_published' => 0, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);

        return redirect('pages');
    }

    public function makePagePublish($id) {
        $page = $this->getPage($id);
        if (!$page) {
            $alert = [
                'message' => 'Page does not exists.',
                'class'   => 'alert--error',
            ];            
            return redirect()->back()->with('alert', $alert);
        }

        if (auth()->user()->isRegisteredUser()) {
            $page->update(['is_published' => 0, 'is_pending' => 1, 'is_rejected' => 0, 'reject_reason' => '']);
        } else {
            $page->update(['is_published' => 1, 'is_pending' => 0, 'is_rejected' => 0, 'reject_reason' => '']);
        }
        
        return redirect('pages');
    }

    public function makePageReject() {
        $page = $this->getPage(request('id'));
        if (!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page does not exists!'
            ]);
    
            return redirect()->back()->with('alert', $alert);    
        }

        if (!auth()->user()->isAdmin() && ! $page->is_pending) {
            return response()->json([
                'status' => false,
                'message' => 'You are not authorized to edit published page'
            ]);
    
            return redirect()->back()->with('alert', $alert);
        }

        $page->update(['is_rejected' => 1, 'reject_reason' => request('message')]);
        
        return response()->json([
            'status' => true,
            'message' => 'Page has been rejected.'
        ]);
    }

    public function getPage($id) {
        if (auth()->user()->isAdmin()) {
            // admin has full authority for all pages
            $page = Page::find($id);

        } else {
            // normal users (Editor, Registered) only have authority for their pages
            $page = Page::where('user_id', auth()->user()->id)->find($id);
        }

        return $page;
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

        if (!auth()->user()->isAdmin()) {
            // get user specific pages only
            $pages = $pages->where('user_id', auth()->user()->id);
        }

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
