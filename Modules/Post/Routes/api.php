<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->user();
});

Route::get('posts/page/{id}', 'PostController@ajaxShowPosts');
Route::get('posts/user/{user_id}/page/{id}', 'PostController@ajaxShowPostsByUser');
Route::get('posts/tag/{tag}/page/{id}', 'PostController@ajaxShowPostsByTag');
Route::get('post/{post_id}/{pagenum}', 'PostController@ajaxInfiniteLoadPost');
