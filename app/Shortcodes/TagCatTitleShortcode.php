<?php

namespace App\Shortcodes;
use Modules\Tag\Entities\{Tag, TagCategory};
use Modules\Post\Entities\{Post, PostsTag};

class TagCatTitleShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
    // Need to fetch current post.
    $post_id = 0;
    if ($shortcode->postid) {
      $post_id = $shortcode->postid;
    } else {
      // parse current url: url path should be {prefix/SLUG} in this case. prefix will be "post" for posts.
      $url = parse_url(url()->current());
      $paths = explode("/", trim($url['path'], "/"));

      // validate $prefix
      if ( count( $paths ) >= 2 ) {
        $slug = $paths[ count( $paths)  - 1 ];
        $prefix = $paths[ count( $paths ) - 2 ];

        if ( $prefix != 'post' )
          return '';

        // get post by slug
        $post = Post::firstWhere( 'slug', $slug );
        if ( $post ) {
          $post_id = $post->id;
        }
      }
    }

    if ($post_id == 0)
      return '';

    if (!$shortcode->category)
      return '';
      
    $limit = $shortcode->limit ? intval($shortcode->limit) : -1;

    $tag_category_name = $shortcode->category;

    $tag_category = TagCategory::where('name', strtolower($tag_category_name))->first();

    if (!$tag_category)
      return '';

    $category_id = $tag_category['id'];

    $tags = Tag::leftJoin('posts_tags', 'posts_tags.tag_id', '=', 'tags.id')
      ->where('posts_tags.post_id', $post_id)
      ->where('tags.tag_category_id', $category_id)
      ->where('tags.status', 'published');

    if ($limit > 0) {
      $tags = $tags->offset(0)->limit($limit);
    }
    $tags = $tags->get();

    if (!$tags)
      return '';

    $titles = [];
    foreach($tags as $tag) {
      $titles[] = $tag->name;
    }

    return implode(" ", $titles);
  }
}
