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
$middleware = ['auth', 'role:admin'];
if (config('settings.need_verify_email') === true) {
  $middleware = ['auth', 'verified', 'role:admin'];
}

Route::middleware($middleware)->group(function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function() {
        Route::get('pages', 'PageController@index');

        Route::post('pages/store', [
            'as' => 'admin.pages.store',
            'uses' => 'PageController@store'
        ]);

        Route::get('pages/{id}/fetch-data', [
            'as' => 'admin.pages.fetch-data',
            'uses' => 'PageController@fetchDataAjax'
        ]);

        Route::post('pages/update', [
            'as' => 'admin.pages.update',
            'uses' => 'PageController@ajaxUpdate'
        ]);

        Route::post('pages/delete', [
            'as' => 'admin.pages.delete',
            'uses' => 'PageController@delete'
        ]);

        Route::post('pages/delete-permanently', [
            'as' => 'admin.pages.delete-permanently',
            'uses' => 'PageController@deletePermanently'
        ]);

        Route::post('pages/delete/multiple', [
            'as' => 'admin.pages.delete.multiple',
            'uses' => 'PageController@deleteMultiple'
        ]);

        Route::post('pages/trash/empty', [
            'as' => 'admin.pages.trash.empty',
            'uses' => 'PageController@emptyTrash'
        ]);

        Route::get('pages/{id}/make-draft', [
            'as' => 'admin.pages.make-draft',
            'uses' => 'PageController@makePageDraft'
        ]);

        Route::get('pages/{id}/publish', [
            'as' => 'admin.pages.publish',
            'uses' => 'PageController@makePagePublish'
        ]);

        Route::get('pages/{id}/restore', [
            'as' => 'admin.pages.restore',
            'uses' => 'PageController@restore'
        ]);

        Route::post('pages/reject', [
            'as' => 'admin.pages.reject',
            'uses' => 'PageController@makePageReject'
        ]);        
    });
});

$middleware1 = ['web', 'auth'];
if (config('settings.need_verify_email') === true) {
  $middleware1 = ['web', 'auth', 'verified'];
}

Route::group([
	'prefix' => 'laravel-filemanager',
	'middleware' => $middleware1
], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});
