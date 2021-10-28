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
	<!-- NEW via blade component -->
	<x-posts.lists.featured-post />
	<div class="margin-bottom-xl"></div>
	<div class="container max-width-lg">
		<div class="flex justify-between">
		  <p class="text-xl text-white divider-title">Best of Saigon</p>
		  	<div class="margin-left-sm">
				<a href="{{ url('/') }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><title>ic_chevron_right_36px</title><rect data-element="frame" x="0" y="0" width="36" height="36" rx="18" ry="18" stroke="none" fill="#e5e5e5"></rect>
						<g fill="#a8a8a8">
							<path d="M15 9l-2.12 2.12L19.76 18l-6.88 6.88L15 27l9-9z"></path>
					</g>
				</a>
				</svg>
			</div>
		</div>
	  </div>
	  <x-posts.lists.draggable-gallery-simple-itag :tags="['Best of', 'test']"/>
	  <div class="margin-top-md container max-width-lg">
		<div class="flex justify-between">
		  <p class="text-xl divider-title">News</p>
		  	<div class="margin-left-sm">
				<a href="{{ url('/') }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><title>ic_chevron_right_36px</title><rect data-element="frame" x="0" y="0" width="36" height="36" rx="18" ry="18" stroke="none" fill="#e5e5e5"></rect>
						<g fill="#a8a8a8">
							<path d="M15 9l-2.12 2.12L19.76 18l-6.88 6.88L15 27l9-9z"></path>
					</g>
				</a>
				</svg>
			</div>
		</div>
	  </div>
	  <x-posts.lists.draggable-gallery-simple />

	  <div class="margin-top-md container max-width-lg">
		<div class="flex justify-between">
		  <p class="text-xl divider-title">Food & Drinks</p>
		  	<div class="margin-left-sm">
				<a href="{{ url('/') }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><title>ic_chevron_right_36px</title><rect data-element="frame" x="0" y="0" width="36" height="36" rx="18" ry="18" stroke="none" fill="#e5e5e5"></rect>
						<g fill="#a8a8a8">
							<path d="M15 9l-2.12 2.12L19.76 18l-6.88 6.88L15 27l9-9z"></path>
					</g>
				</a>
				</svg>
			</div>
		</div>
	  </div>
	  <x-posts.lists.draggable-gallery-simple />
@endsection

@push('module-styles')
  <!-- MODULE'S CUSTOM Style -->
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@section('before-end')
	@include('custom-scripts.infinite-scroll')
@endsection