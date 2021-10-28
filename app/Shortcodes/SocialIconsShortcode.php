<?php

namespace App\Shortcodes;
use Modules\Admin\Entities\Settings;

class SocialIconsShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    $settings_data = Settings::getSiteSettings();
    if (isset($settings_data['socials'])) {
      $socials = unserialize($settings_data['socials']);

      $template = self::getSocialIconsTemplate($socials);

      return $template;
    }
    return "";
  }

  private static function getSocialIconsTemplate($icons) {
    $template = '<ul class="flex gap-xs flex-wrap justify-center justify-end@md">';
    foreach($icons as $icon_info) {
      if (empty($icon_info['icon']))
        continue;
      $template .= '<li><a href="'. $icon_info['link'] .'" class="socials-v4__btn">' . $icon_info['icon'] . '</a></li>';
    }
    $template .= '</ul>';

    return $template;
  }
}
