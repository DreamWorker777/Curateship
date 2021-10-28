<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Modules\Admin\Entities\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if (Schema::hasTable('settings')) {
			$verify = DB::table('settings')->where('key', 'reg_en_verify_email')->first();
			
			config(['settings.need_verify_email' => ( isset($verify->value) && $verify->value === 'on' ) ? true : false]);
		}
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
