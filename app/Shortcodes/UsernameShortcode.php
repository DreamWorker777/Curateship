<?php

namespace App\Shortcodes;
use Modules\Users\Entities\User;

class UsernameShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    return auth()->user()->name;
  }
}
