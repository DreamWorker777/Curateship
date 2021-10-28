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

<x-posts.single.single-post id='{{ $post->id }}' />

<div class="margin-top-md container max-width-xl">
  <div class="flex justify-between">
    <p class="text-xl divider-title">Recommended</p>
      <div class="margin-left-sm">
        <a href="{{ url('/') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><title>ic_chevron_right_36px</title><rect data-element="frame" x="0" y="0" width="36" height="36" rx="18" ry="18" stroke="none" fill="#e5e5e5"></rect>
            <g fill="#a8a8a8">
              <path d="M15 9l-2.12 2.12L19.76 18l-6.88 6.88L15 27l9-9z"></path>
          </g>
          </svg>
        </a>
      </div>
    </p>
  </div>
</div>

<x-posts.lists.draggable-gallery-simple-itag :tags="['Best of', 'video']"/>

@endsection
