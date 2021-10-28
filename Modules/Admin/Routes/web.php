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

// Editor

Route::get('/admin/editor/component', '\Modules\Admin\Http\Controllers\ComponentController@index');

Route::get('/admin/contact',function(){
  return view('admin::contact.index');
});

use Illuminate\Support\Facades\Schema;
use Modules\Admin\Entities\Settings;

$middleware = ['auth', 'role:admin'];
if (config('settings.need_verify_email') === true) {
  $middleware = ['auth', 'verified', 'role:admin'];
}

Route::middleware($middleware)->group(function(){

    Route::prefix('admin')->group(function() {
        if (Schema::hasTable('settings')) {
            // Share Site Setting Data
            $settings_data = Settings::getSiteSettings();
            View::share('settings_data', $settings_data);

            $font_logo = Settings::getLogoFontInfo();
            View::share('font_logo', $font_logo);
            $font_primary = Settings::getPrimaryFontInfo();
            View::share('font_primary', $font_primary);
            $font_secondary = Settings::getSecondaryFontInfo();
            View::share('font_secondary', $font_secondary);
        }
        
        Route::get('/', 'PostBoxController@index');

        // Post Box Module
        Route::get('loadbox/{type}', 'PostBoxController@ajaxLoadBox');
        Route::post('/store', [
            'as' => 'postbox.store',
            'uses' => 'PostBoxController@store'
        ]);

        // Settings Page
        Route::get('settings', 'SettingsController@index');
        Route::post('settings/store', [
            'as' => 'settings.store',
            'uses' => 'SettingsController@store'
        ]);
        Route::get('settings/clear-media', [
          'as' => 'settings.clear_media',
          'uses' => 'SettingsController@clearUnusedMediaFiles'
        ]);

        // Scraper pages
        Route::get('scraper', 'ScraperController@index');
        
        Route::get('scraper/settings', 'SettingsController@scraperSetting');
        Route::post('scraper/store', [
          'as' => 'scraper.store',
          'uses' => 'SettingsController@storeScraperSetting'
        ]);
        
        Route::get('scraper/scraper-v1', 'ScraperController@newScraper');
        Route::post('scraper/scraper-v1', [
          'as' => 'scraper.save_scraper',
          'uses' => 'ScraperController@saveScraper'
        ]);
        Route::get('scraper/run_pause/{id}', [
          'as' => 'scraper.run_pause',
          'uses' => 'ScraperController@runpauseScraperCron'
        ]);
        Route::get('scraper/stop/{id}', [
          'as' => 'scraper.stop',
          'uses' => 'ScraperController@stopScraperCron'
        ]);
        Route::get('scraper/delete/{id}', [
          'as' => 'scraper.delete',
          'uses' => 'ScraperController@deleteScraperCron'
        ]);
        Route::get('scraper/retry', [
          'as' => 'scraper.retry',
          'uses' => 'ScraperController@retryScraper'
        ]);

        Route::post('scraper/get_logs', [
          'as' => 'scraper.get_logs',
          'uses' => 'ScraperController@getLogs'
        ]);
        Route::post('scraper/delete_log_item', [
          'as' => 'scraper.delete_log_item',
          'uses' => 'ScraperController@deleteLogItem'
        ]);

        Route::get('scraper/scraper-v1/{id}', 'ScraperController@loadScraper');
    });
});
