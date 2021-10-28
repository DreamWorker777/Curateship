<?php

namespace App\Shortcodes;
use Modules\Menus\Entities\Menus;

class MenuShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    $menus = array();

    if ($shortcode->id) {
      $menu_info = Menus::where('id', $shortcode->id)->with('items')->first();
    } else if ($shortcode->name) {
      $menu_info = Menus::where('name', $shortcode->name)->with('items')->first();
    } else {
      return '';
    }

    if (!$menu_info) {
      return '';
    }

    $menus = $menu_info->items->toArray();

    $location = 'header';
    if ($shortcode->location) {
      $location = $shortcode->location;
    }

    $version = 1;
    if ($shortcode->version) {
      $version = $shortcode->version;
    }

    if ($location == 'footer') {
      $menu_template = self::getMenuTemplateFooter($menus);
    } else {
      if ($version == 1) {
        $menu_template = self::getMenuTemplateV1($menus);
      } else {
        $menu_template = self::getMenuTemplateV2($menus);
      }
    }        
    return $menu_template;
  }

  private static function getMenuTemplateV1($menus) {
    $menu_template = '<ul class="mega-nav__items js">';

    foreach ($menus as $menu) {
      if ($menu['child']) {
        $menu_template .= '<li class="mega-nav__item dropdown__wrapper">';
        $menu_template .= '  <a href="' . $menu['link'] . '" class="mega-nav__control dropdown__trigger">' . $menu['label'] . '</a>';

      } else {
        $menu_template .= '<li class="mega-nav__item">';
        $menu_template .= '  <a href="' . $menu['link'] . '" class="mega-nav__control">' . $menu['label'] . '</a>';
      }

      if ($menu['child']) {
        $menu_template .= '<ul class="dropdown dropdown__menu">';

        foreach ($menu['child'] as $child) {
          $menu_template .= '<li class="dropdown__item">';
          $menu_template .= '  <a href="' . $child['link'] . '">' . $child['label'] . '</a>';
          $menu_template .= '</li>';    
        }
        
        $menu_template .= '</ul>';
      }

      $menu_template .= '</li>';
    }

    $menu_template .= '</ul>';

    return $menu_template;
  }

  private static function getMenuTemplateV2($menus) {
    $menu_template = '<ul class="header-v2__nav-list header-v2__nav-list--main">';

    foreach ($menus as $menu) {
      if ($menu['child']) {
        $menu_template .= '<li class="header-v2__nav-item header-v2__nav-item--main header-v2__nav-item--has-children">';
        $menu_template .= '  <a href="' . $menu['link'] . '" class="header-v2__nav-link"><span class="color-contrast-lower">' . $menu['label'] . '</span><svg class="header-v2__nav-dropdown-icon icon margin-left-xxxs color-contrast-lower" aria-hidden="true" viewBox="0 0 16 16"><polyline fill="none" stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="3.5,6.5 8,11 12.5,6.5 "></polyline></svg></a>';

      } else {
        $menu_template .= '<li class="header-v2__nav-item header-v2__nav-item--main">';
        $menu_template .= '  <a href="' . $menu['link'] . '" class="header-v2__nav-link"><span>' . $menu['label'] . '</span></a>';
      }

      if ($menu['child']) {
        $menu_template .= '<div class="header-v2__nav-dropdown header-v2__nav-dropdown--md"><ul class="header-v2__nav-list header-v2__nav-list--title-desc">';

        foreach ($menu['child'] as $child) {
          $menu_template .= '<li class="header-v2__nav-item">';
          $menu_template .= '  <a href="' . $child['link'] . '" class="header-v2__nav-link"><div><medium>' . $child['label'] . '</medium></div></a>';
          $menu_template .= '</li>';    
        }
        
        $menu_template .= '</ul></div>';
      }

      $menu_template .= '</li>';
    }

    $menu_template .= '</ul>';

    return $menu_template;
  }

  private static function getMenuTemplateFooter($menus) {
    $menu_template = '';

    foreach ($menus as $menu) {
      $menu_template .= '<a class="color-contrast-high" href="' . $menu['link'] . '">' . $menu['label'] . '</a>';

      if ($menu['child']) {
        foreach ($menu['child'] as $child) {
          $menu_template .= '<a class="color-contrast-high" href="' . $child['link'] . '">' . $child['label'] . '</a>';
        }
      }
    }
    return $menu_template;
  }
}
