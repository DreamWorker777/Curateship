<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Schema, File, URL};

use Modules\Admin\Providers\AdminServiceProvider;

class Settings extends Model
{
  public static $logo_font = AdminServiceProvider::LOGO_FONT;
  public static $primary_font = AdminServiceProvider::PRIMARY_FONT;
  public static $secondary_font = AdminServiceProvider::SECONDARY_FONT;
  public static $available_templates = ['app_template', 'blog_template', 'post_template', 'page_template', 'tag_template', 'profile_template'];
  public static $templates_subdir = [
    'app_template' => 'apps', 
    'blog_template' => 'home', 
    'post_template' => 'post',
    'page_template' => 'page',
    'tag_template' => 'tag',
    'profile_template' => 'profile'
  ];

  public static function getSiteSettings()
  {
    $setting_data = array();
    if (Schema::hasTable('settings')) {
      $settings = Settings::all();

      foreach($settings as $data) {
        if (empty($data['value'])) $data['value'] = '';
        $setting_data[$data['key']] = $data['value'];

        if (in_array($data['key'], self::$available_templates)) {
          if (!file_exists(resource_path('views/templates/' . self::$templates_subdir[$data['key']] . '/' . $data['value'] . '.blade.php'))) {
            $setting_data[$data['key']] = 'default';
          }
        }
      }
    }

    // set default fonts if not exist
    if (empty($setting_data['font_logo']))
      $setting_data['font_logo'] = self::$logo_font;

    if (empty($setting_data['font_primary']))
      $setting_data['font_primary'] = self::$primary_font;

    if (empty($setting_data['font_secondary']))
      $setting_data['font_secondary'] = self::$secondary_font;

    return $setting_data;
  }

  public static function getFontsList() {
    $files = File::directories(public_path() . '/assets/fonts');

    $fonts = array();
    foreach ($files as $file) {
      $file_name    = basename($file);
      $fonts[] = $file_name;
    }

    return $fonts;
  }

  public static function getLogoFontInfo() {
    return self::getFontInfo('font_logo');
  }

  public static function getPrimaryFontInfo() {
    return self::getFontInfo('font_primary');
  }

  public static function getSecondaryFontInfo() {
    return self::getFontInfo('font_secondary');
  }

  public static function getFontInfo($font_type) {
    $setting_data = array();

    $settings = Settings::all();
    foreach($settings as $data) {
      $setting_data[$data['key']] = $data['value'];
    }

    $font_info = array (
      'status' => 'local',
      'fontcss' => ''
    );

    if (!empty($setting_data[$font_type])) {
      $files = File::files(public_path() . '/assets/fonts/'.$setting_data[$font_type]);

      if (count($files) > 0) { 
        // only when associated font files are exist
        $font_info['status'] = 'local'; // indicate to load fonts from local
        $font_info['font-family'] = $setting_data[$font_type];

        $tmp_fonts = array();
        foreach ($files as $file) {
          $file_name    = basename($file);

          list($fname, $ext) = explode(".", $file_name);
          $name_snippets = explode('-', $fname);
          $size = end($name_snippets);
          $tmp_fonts[] = array (
            'name' => $fname,
            'type' => $ext,
            'size' => $size
          );
        }

        $fonts = array();
        foreach ($tmp_fonts as $tmp_font) {
          if (!isset($fonts[$tmp_font['size']]))
            $fonts[$tmp_font['size']] = array();

          if (!isset($fonts[$tmp_font['size']]['types']))
            $fonts[$tmp_font['size']]['types'] = array();

          $fonts[$tmp_font['size']]['name'] = $tmp_font['name'];
          $fonts[$tmp_font['size']]['size'] = $tmp_font['size'];

          $fonts[$tmp_font['size']]['types'][] = $tmp_font['type'];
        }

        // generate font loading css
        $font_css_template = '';
        foreach($fonts as $font) {
          $font_css_template .= self::getLoadFontCSSTemplate($font_info['font-family'], $font);
        }

        $font_info['fontcss'] = $font_css_template;

        return $font_info;
      }
    }

    $font_info['status'] = 'google'; // indicate to load google fonts
    if ($font_type == 'font_logo')
      $font_info['font-family'] = self::$logo_font;
    else if ($font_type == 'font_primary')
      $font_info['font-family'] = self::$primary_font;
    else if ($font_type == 'font_secondary')
      $font_info['font-family'] = self::$secondary_font;

    return $font_info;

  }

  public static function getLoadFontCSSTemplate($fontFamily, $fontData) {
    $font_format = array (
      'eot' => 'embedded-opentype',
      'woff2' => 'woff2',
      'woff' => 'woff',
      'ttf' => 'truetype',
      'svg' => 'svg'
    );

    $font_src_template1 = '';
    $font_src_template2 = '';

    $src_templates = array();

    foreach ($fontData['types'] as $type) {
      $font_url = URL::to('') . '/assets/fonts/'. $fontFamily . '/' . $fontData['name'] . '.' . $type;

      if ($type == 'eot') {
        $font_src_template1 = sprintf("src: url('%s')", $font_url);

        $src_templates[] = sprintf("url('%s?#iefix') format('%s')", $font_url, $font_format[$type]);

      } else if ($type == 'svg') {
        $src_templates[] = sprintf("url('%s#%s') format('%s')", $font_url, $fontFamily, $font_format[$type]);

      } else if (in_array($type, array('ttf', 'woff', 'woff2'))) {
        $src_templates[] = sprintf("url('%s') format('%s')", $font_url, $font_format[$type]);
      }
    }

    if (count($src_templates) > 0) {
      $font_src_template2 = "src: local('')," . implode(', ', $src_templates) . ';';
    }

    $fontCSSTemplate = sprintf("@font-face { font-family: '%s'; font-style: normal; font-weight: %d; %s; %s} ", $fontFamily, intval($fontData['size']), $font_src_template1, $font_src_template2);

    return $fontCSSTemplate;
  }

  public static function getTemplates($type, $value) {
    if (!in_array($type, self::$available_templates)) {
      return [];
    }

    $template_files = File::allFiles(resource_path('views/templates/') . self::$templates_subdir[$type]);
    $templates = [];
    array_push($templates, [
      "name" => "default",
      "checked" => $value === "default" ? "checked" : ""
    ]);
    foreach($template_files as $file) {
      $filename = basename($file, ".blade.php");

      if ($filename !== 'default') {
        array_push($templates, [
          "name" => $filename,
          "checked" => $value === $filename ? "checked" : ""
        ]);
      }
    }

    return $templates;
  }

  public static function getScraperSettingInfo() {
    $scraper_settings = [
      'scraper_ip_ports' => [],
      'delay_min' => 5,
      'delay_max' => 15
    ];

    if (Schema::hasTable('settings')) {
      $settings = Settings::whereIn('key', ['scraper_ip_ports', 'delay_min', 'delay_max'])->get();
	  if ($settings) {
      	foreach($settings as $data) {
          if (empty($data['value'])) $data['value'] = '';
          $scraper_settings[$data['key']] = $data['value'];
        }
	  }
    }

    // Exclude invalid ip & port couple.
    if (isset($scraper_settings['scraper_ip_ports']) && !empty($scraper_settings['scraper_ip_ports'])) {
      $scraper_settings['scraper_ip_ports'] = unserialize($scraper_settings['scraper_ip_ports']);
      foreach($scraper_settings['scraper_ip_ports'] as $idx => $ip_port) {
        // validate ip address
        if ( !filter_var($ip_port['ip'], FILTER_VALIDATE_IP) || !filter_var($ip_port['port'], FILTER_VALIDATE_INT) ) {
          unset($scraper_settings[$idx]);
        }
      }
    }
    return $scraper_settings;
  }
}
