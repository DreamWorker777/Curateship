<?php

// enable shortcode globally
Shortcode::enable();

$middleware = 'auth';
if (config('settings.need_verify_email') === true) {
  $middleware = ['auth','verified'];
}

Auth::routes(['verify' => true]);



// Site 2

Route::get('/',function(){
  return view('index');
});

Route::get('/',function(){
  return view('templates.layouts.blog');
});

Route::get('/site2/login',function(){
  return view('components.auth.login');
});

Route::get('/site2/register',function(){
  return view('components.auth.register');
});

Route::get('/site2/passreset',function() {
  return view('components.auth.pass-reset');
});

// Editor JS

Route::group(['middleware' => $middleware], function(){
  Route::post('editorjs/upload-image', [
      'as'   => 'editorjs.upload-image',
      'uses' => 'EditorjsController@uploadImage'
  ]);
});

Route::get('post/{slug}', [
  'as'   => 'single-post-view',
  'uses' => '\Modules\Users\Http\Controllers\SingleViewController@singlePostView'
]);

Route::get('page/{slug}', [
  'as'   => 'single-page-view',
  'uses' => '\Modules\Users\Http\Controllers\SingleViewController@singlePageView'
]);

Route::group([
  'prefix' => '{theme}/{prefix}',
  'where'  => ['theme' => 'site1|site2', 'prefix' => 'page|post']
], function(){
  Route::get('{slug}', [
    'as'   => 'theme.pages.post',
    'uses' => '\Modules\Users\Http\Controllers\SingleViewController@singleViewbyTheme'
  ]);
});

Route::group([
	'prefix' => 'component',
], function() {
	Route::post('/add', '\Modules\Admin\Http\Controllers\ComponentController@add');
  Route::post('/saveContent', '\Modules\Admin\Http\Controllers\ComponentController@saveContent');
  Route::post('/updateName', '\Modules\Admin\Http\Controllers\ComponentController@updateName');
  Route::post('/deleteComponent', '\Modules\Admin\Http\Controllers\ComponentController@deleteComponent');
});