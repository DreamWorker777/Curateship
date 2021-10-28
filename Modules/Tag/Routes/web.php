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
    Route::prefix('admin')->group(function() {
        Route::get('tag', 'TagController@index')->name('tag.index');
        Route::get('tag/create', 'TagController@create');
        Route::post('tag/store', 'TagController@store')->name('tag.store');
        Route::get('tag/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::get('tag/draft/{id}', 'TagController@draft')->name('tag.draft');
        Route::get('tag/publish/{id}', 'TagController@publish')->name('tag.publish');
        Route::get('tag/trash/{id}', 'TagController@trash')->name('tag.trash');
        Route::get('tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
        Route::get('tag/empty-trash', 'TagController@emptyTrash')->name('tag.empty-trash');
        Route::post('tag/bulk-trash', 'TagController@bulkTrash')->name('tag.bulk-trash');
        Route::post('tag/bulk-delete', 'TagController@bulkDelete')->name('tag.bulk-delete');
        Route::post('tag-category/store', 'TagCategoryController@store')->name('tag-category.store');
    });
});

Route::get('/tag/{tag}', [
  'as'   => 'pages.tags',
  'uses' => 'TagController@tags'
]);

Route::get('/tag-category/{tagCategory}', [
  'as'   => 'pages.tag-categories',
  'uses' => 'TagCategoryController@tagCategories'
]);

$user_middleware = ['auth'];
if (config('settings.need_verify_email') === true) {
  $user_middleware = ['auth', 'verified'];
}
Route::middleware($user_middleware)->group(function(){ 
  Route::post('/tag/upload-media', [
    'as' => 'tags.upload-media',
    'uses' => '\Modules\Admin\Http\Controllers\MediaUploadController@uploadTagMedia'
  ]);
});
