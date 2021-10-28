<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Shortcodes\{SiteTitleShortcode, PostTitleShortcode, TagTitleShortcode, TagCatTitleShortcode, MenuShortcode, UsernameShortcode, SocialIconsShortcode};
use Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('sitetitle', SiteTitleShortcode::class);
        Shortcode::register('posttitle', PostTitleShortcode::class);
        Shortcode::register('tagtitle', TagTitleShortcode::class);
        Shortcode::register('tag_cat_title', TagCatTitleShortcode::class);
        Shortcode::register('menu', MenuShortcode::class);
        Shortcode::register('username', UsernameShortcode::class);
        Shortcode::register('socialicons', SocialIconsShortcode::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
