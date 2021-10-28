<?php

use Modules\Post\Entities\Post;
use Modules\Page\Entities\Page;
use Modules\Users\Entities\User;
use Modules\Tag\Entities\Tag;

if (! function_exists('getNewSlug')) {
  function getNewSlug($slug, $posts) {
    $max_number = 0;
    foreach($posts as $post) {
      $slug_snippet = str_replace($slug, "", $post->slug);

      if (!empty($slug_snippet) && substr($slug_snippet, 0, 1) === '-') {
        $slug_snippet = substr($slug_snippet, 1);
        if (ctype_digit($slug_snippet)) {
          $max_number = max($max_number, (int)$slug_snippet);
        }
      }
    }

    if ($max_number === 0) $max_number = 2;
    else $max_number++;

    return $slug . '-' . $max_number;
  }
}

if (! function_exists('getPostsCount')) {
  function getPostsCount() {
    return Post::count();
  }
}

if (! function_exists('getPagesCount')) {
  function getPagesCount() {
    return Page::count();
  }
}

if (! function_exists('getUsersCount')) {
  function getUsersCount() {
    return User::count();
  }
}

if (! function_exists('getTagsCount')) {
  function getTagsCount() {
    return Tag::count();
  }
}

if (! function_exists('isMobileDevice')) {
  function isMobileDevice(){
    require_once __DIR__ . '/Mobile_Detect.php';
    $detect = new Mobile_Detect;

    if( $detect->isMobile() || $detect->isTablet() ) 
      return true;
    return false;
  }
}
