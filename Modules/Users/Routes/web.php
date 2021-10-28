<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/login/ajax',[
    'as'   => 'login.ajax',
    'uses' => 'Auth\LoginController@ajaxShowForm'
]);

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register/ajax',[
  'as'   => 'register.ajax',
  'uses' => 'Auth\RegisterController@ajaxShowForm'
]);

Route::get('/resetpassword',[
  'as'   => 'password.reset.ajax',
  'uses' => 'Auth\ForgotPasswordController@ajaxShowForm'
]);

$middleware = ['auth', 'role:admin'];
if (config('settings.need_verify_email') === true) {
  $middleware = ['auth', 'verified', 'role:admin'];
}
Route::middleware($middleware)->group(function(){

  Route::prefix('admin')->group(function(){
    Route::get('users', 'UsersController@index');
    Route::get('users/adminsettings', 'UsersController@adminsettings');
    Route::get('users/add', 'UsersController@create');
    Route::post('users/store', 'UsersController@store');
    Route::get('users/edit/{id}', 'UsersController@edit');
    Route::post('users/update/{id}', 'UsersController@update');
    Route::get('users/update-coverphoto/{id}', [
      'as' => 'admin.update-coverphoto',
      'uses' => 'UsersController@getUpdateCoverPhoto'
    ]);
    Route::post('users/update-coverphoto/{id}', [
      'uses' => 'UsersController@postAjaxUpdateCoverPhotoAdmin'
    ]);
    Route::post('users/delete-coverphoto/{id}', [
      'uses' => 'UsersController@postAjaxDeleteCoverPhotoAdmin'
    ]);
    Route::post('users/settings/avatar/delete/ajax/{id}', [ 
      'uses' => 'UsersController@postAjaxDeleteAvatarAdmin'
    ]);
    Route::post('users/add-coverphoto', [
      'as' => 'admin.add-coverphoto',
      'uses' => 'UsersController@postAjaxAddCoverPhotoAdmin'
    ]);
    Route::get('users/suspend/{id}', 'UsersController@suspend');
    Route::get('users/activate/{id}', 'UsersController@activate');
    Route::get('users/trash/{id}', 'UsersController@trash');
    Route::get('users/delete/{id}', 'UsersController@destroy');
    Route::get('users/empty-trash', 'UsersController@emptyTrash');
    Route::post('users/bulk-suspend', 'UsersController@bulkSuspend');
    Route::post('users/bulk-delete', 'UsersController@bulkDelete');
  });

});

$user_middleware = ['auth'];
if (config('settings.need_verify_email') === true) {
  $user_middleware = ['auth', 'verified'];
}
Route::middleware($user_middleware)->group(function(){
  Route::get('users/settings', 'UsersController@settings');
  Route::post('users/settings/save', 'UsersController@saveSettings');
  Route::post('users/settings/cover-photo/update/ajax', [
    'as' => 'cover-photo.update.ajax',
    'uses' => 'UsersController@postAjaxUpdateCoverPhoto'
  ]);
  Route::post('users/settings/avatar/delete/ajax', [
    'as' => 'avatar.delete.ajax',
    'uses' => 'UsersController@postAjaxDeleteAvatar'
  ]);
  Route::post('users/settings/cover-photo/delete/ajax', [
    'as' => 'cover-photo.delete.ajax',
    'uses' => 'UsersController@postAjaxDeleteCoverPhoto'
  ]);
});

/*Route::get('/dashboard',function(){
  return view('users::dashboard\index');
});*/

Route::group([
  'prefix' => 'dashboard',
  'middleware' => $user_middleware
], function() {
  Route::get('/', 'DashboardPostsController@index');
  Route::get('/settings', 'DashboardPostsController@settings');

  Route::get('/add-post', [
    'as' => 'dashboard.add-post',
    'uses' => 'DashboardPostsController@addPost'
  ]);

  Route::post('/store', [
    'as' => 'dashboard.store',
    'uses' => 'DashboardPostsController@store'
  ]);

  Route::get('{id}/fetch-data', [
    'as' => 'dashboard.fetch-data',
    'uses' => 'DashboardPostsController@fetchDataAjax'
  ]);

  Route::post('/update', [
    'as' => 'dashboard.update',
    'uses' => 'DashboardPostsController@ajaxUpdate'
  ]);

  Route::post('/delete', [
    'as' => 'dashboard.delete',
    'uses' => 'DashboardPostsController@delete'
  ]);

  Route::post('/delete-permanently', [
    'as' => 'dashboard.delete-permanently',
    'uses' => 'DashboardPostsController@deletePermanently'
  ]);

  Route::post('/delete/multiple', [
    'as' => 'dashboard.delete.multiple',
    'uses' => 'DashboardPostsController@deleteMultiple'
  ]);

  Route::post('/trash/empty', [
    'as' => 'dashboard.trash.empty',
    'uses' => 'DashboardPostsController@emptyTrash'
  ]);

  Route::post('/settings/store', [
      'as' => 'dashboard.settings.store',
      'uses' => 'DashboardPostsController@settingsStore'
  ]);

  Route::post('/settings/update', [
      'as' => 'dashboard.settings.update',
      'uses' => 'DashboardPostsController@settingsUpdate'
  ]);

  Route::get('/{id}/make-draft', [
      'as' => 'dashboard.make-draft',
      'uses' => 'DashboardPostsController@makePostDraft'
  ]);

  Route::get('/{id}/publish', [
      'as' => 'dashboard.publish',
      'uses' => 'DashboardPostsController@makePostPublish'
  ]);

  Route::get('/{id}/restore', [
      'as' => 'dashboard.restore',
      'uses' => 'DashboardPostsController@restore'
  ]);

  Route::post('posts/reject', [
    'as' => 'dashboard.reject',
    'uses' => 'DashboardPostsController@makePostReject'
  ]);
});

Route::group([
  'prefix' => 'pages',
  'middleware' => $user_middleware
], function() {
  Route::get('/', 'DashboardPagesController@index');

  Route::get('/add-page', [
    'as' => 'pages.add-page',
    'uses' => 'DashboardPagesController@addPage'
  ]);

  Route::post('/store', [
    'as' => 'pages.store',
    'uses' => 'DashboardPagesController@store'
  ]);

  Route::get('{id}/fetch-data', [
    'as' => 'pages.fetch-data',
    'uses' => 'DashboardPagesController@fetchDataAjax'
  ]);

  Route::post('/update', [
    'as' => 'pages.update',
    'uses' => 'DashboardPagesController@ajaxUpdate'
  ]);

  Route::post('/delete', [
    'as' => 'pages.delete',
    'uses' => 'DashboardPagesController@delete'
  ]);

  Route::post('/delete-permanently', [
    'as' => 'pages.delete-permanently',
    'uses' => 'DashboardPagesController@deletePermanently'
  ]);

  Route::post('/delete/multiple', [
    'as' => 'pages.delete.multiple',
    'uses' => 'DashboardPagesController@deleteMultiple'
  ]);

  Route::post('/trash/empty', [
    'as' => 'pages.trash.empty',
    'uses' => 'DashboardPagesController@emptyTrash'
  ]);

  Route::get('/{id}/make-draft', [
      'as' => 'pages.make-draft',
      'uses' => 'DashboardPagesController@makePageDraft'
  ]);

  Route::get('/{id}/publish', [
      'as' => 'pages.publish',
      'uses' => 'DashboardPagesController@makePagePublish'
  ]);

  Route::get('/{id}/restore', [
      'as' => 'pages.restore',
      'uses' => 'DashboardPagesController@restore'
  ]);

  Route::post('/reject', [
    'as' => 'pages.reject',
    'uses' => 'DashboardPagesController@makePageReject'
  ]);
});

Route::get('/profile', [
  'as'   => 'pages.profile',
  'uses' => 'UsersController@getProfile'
]);

Route::get('/profile/{username}', [
  'as'   => 'pages.profile.user',
  'uses' => 'UsersController@getProfile'
]);
