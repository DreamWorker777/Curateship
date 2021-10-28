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

@push('module-styles')
  <!-- MODULE'S CUSTOM Style -->
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@section('before-end')
	@include('custom-scripts.infinite-scroll')
@endsection