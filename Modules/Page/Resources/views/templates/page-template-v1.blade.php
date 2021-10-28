<?php $layout_template = ($theme) ? "templates.blog.{$theme}.layouts.home" : 'templates.blog.site1.layouts.home'; ?>
@extends($layout_template)

<?php $page_title = ($settings_data['post_page_title']) ? $settings_data['post_page_title'] : $page->title; ?>
<?php $meta_title = ($settings_data['post_meta_title']) ? $settings_data['post_meta_title'] : $page->title; ?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')
<x-pages.single-page id='{{ $page->id }}' />
@endsection