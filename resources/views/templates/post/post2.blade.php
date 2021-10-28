@extends('templates.layouts.index')

<?php $page_title = ($settings_data['post_page_title']) ? $settings_data['post_page_title'] : $post->title; ?>
<?php $meta_title = ($settings_data['post_meta_title']) ? $settings_data['post_meta_title'] : $post->title; ?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')
<x-posts.single.infinite-post-load id='{{ $post->id }}' />
@endsection
