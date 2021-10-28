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
        Route::get('/menus', 'MenusController@index');
    });
});
