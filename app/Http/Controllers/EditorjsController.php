<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorjsController extends Controller
{
    public function uploadImage(Request $request)
    {
        $uploaded_image_path = $request->file('image')->store('public/editorjs-images');
        $url                 = Storage::url($uploaded_image_path);

        if (!$url) {
            return response()->json(['success' => 0]);
        }

        return response()->json([
            'success' => 1,
            'file'    => [
                'url' => $url
            ]
        ]);
    }
}
