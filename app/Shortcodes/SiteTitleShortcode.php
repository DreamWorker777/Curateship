<?php

namespace App\Shortcodes;
use Modules\Admin\Entities\Settings;

class SiteTitleShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    $settings_data = Settings::getSiteSettings();
    return sprintf('%s', $settings_data['page_title']);
  }
}
