@extends('templates.layouts.index')

<?php $page_title = ($settings_data['page_title']) ? $settings_data['page_title'] : ''; ?>
<?php $meta_title = ($settings_data['meta_title']) ? $settings_data['meta_title'] : ''; ?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')
<x-posts.lists.masonry-v1 />
@endsection
