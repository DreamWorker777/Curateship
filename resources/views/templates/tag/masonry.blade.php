@extends('templates.layouts.index')

<?php $seo_page_title = ($settings_data['tag_page_title']) ? $settings_data['tag_page_title'] : $page_title; ?>
<?php $seo_meta_title = ($settings_data['tag_meta_title']) ? $settings_data['tag_meta_title'] : $page_title; ?>

@isset($seo_page_title)
  @section('title-tag'){!! $seo_page_title !!}@endsection
@endisset

@isset($seo_meta_title)
  @section('meta-title-tag'){!! $seo_meta_title !!}@endsection
@endisset

@section('content')
<section class="margin-top-md">
  <div class="container max-width-adaptive-lg">
    <div class="author ">
      @if($thumbnail != false)
      <a href="#0" class="author__img-wrapper">
        <img src="{{ $thumbnail }}" alt="Author picture">
      </a>
      @endif
      <div class="author__content text-component text-space-y-xxs">
        <h4 class="text-xl margin-bottom-md">{{ $page_title }}</h4>
        <p class="color-contrast-medium">{!! $description !!}</p>
      </div>
    </div>
  </div>
</section>

<x-posts.lists.masonry-v1 type='tag' tag='{{ $page_title }}'/>

@endsection