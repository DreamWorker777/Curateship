<?php

namespace App\Shortcodes;
use Modules\Post\Entities\Post;
use Modules\Page\Entities\Page;

class PostTitleShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    // parse current url: url path should be {prefix/SLUG} in this case. prefix will be "post", "page" for posts and pages.
    $url = parse_url(url()->current());
    $paths = explode("/", trim($url['path'], "/"));

    // validate $prefix
    if ( count( $paths ) >= 2 ) {
      $slug = $paths[ count( $paths)  - 1 ];
      $prefix = $paths[ count( $paths ) - 2 ];
  
      if ( $prefix == 'page' ) {
        // get page by slug
        $page = Page::firstWhere( 'slug', $slug );

        if ( $page ) {
          return $page->title;
        } else {
          return '';
        }
      } else if ( $prefix == 'post' ) {
        // get post by slug
        $post = Post::firstWhere( 'slug', $slug );
        if ( $post ) {
          return $post->title;
        } else {
          return '';
        }
      }
    }

    return '';
  }
}
