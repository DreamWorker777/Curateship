<?php

namespace Modules\Admin\Http\Controllers;

use Arr, Str, Image, File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Modules\Users\Entities\{ PostSetting, Post, PostsTag };
use Modules\Tag\Entities\{Tag, TagCategory};

class AdminController extends Controller
{
    public function index()
    {
    }
}
