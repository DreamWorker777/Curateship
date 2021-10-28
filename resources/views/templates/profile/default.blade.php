@extends('templates.layouts.index')

<?php 
  $is_authorized = auth()->user() ? true : false;
  $username = $user ? $user->name : ($is_authorized ? auth()->user()->name : '');
  $page_title = ($is_authorized && $settings_data['profile_page_title']) ? $settings_data['profile_page_title'] : $username;
  $meta_title = ($is_authorized && $settings_data['profile_meta_title']) ? $settings_data['profile_meta_title'] : $username;
?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')
<x-users.profile id='{{ $user->id }}' />

<div class="text-divider padding-bottom-xs text-lg max-width-adaptive-lg">
    <span>
        {{ $user->name }}&apos;{{
            (substr($user->name, -1) == 's' ? '' : 's')
        }}
        Content
    </span>
</div>

<section class="margin-top-md">
  <div class="container max-width-adaptive-lg">
    <ul class="grid-auto-md gap-md">
      @foreach($posts as $post)
        <li>
          <span class="card-v8 bg radius-lg">
            <a href="
              {{
                  route(
                      'single-post-view',
                      [
                          'slug'   => $post->slug
                      ]
                  )
              }}
            ">
            @if($post->thumbnail)
                <figure class="card__img card__img-cropped">
                    <img src="{{ $post->showThumbnail('medium') }}" alt="Image of {{ $post->title }}">
                </figure>
            @else
                <span class="card__img card__img-cropped bg-black bg-opacity-50%"></span>
            @endif
            </a>

            <footer class="padding-sm">
              <p class="text-sm color-contrast-medium margin-bottom-sm post-thumbnail-tags-sm">
                <span>
                  @php
                    $tag_pills = $post->getTagCategoryNames();
                  @endphp
                  @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
                      <a
                        href="{{ route('pages.tag-categories', $tag_pill_name) }}"
                        class="color-contrast-medium"
                        draggable="false" ondragstart="return false;"
                      >
                        {{ $tag_pill_name }}
                      </a>
                      @if($tag_pills_key < count($tag_pills) - 1)
                          ,
                      @endif
                  @endforeach
                </span>
              </p>
              <div class="text-component">
                <h4>
                    <a href="{{
                        route(
                            'single-post-view',
                            [
                                'slug'   => $post->slug
                            ]
                        )
                    }}" class="color-contrast-higher card-v8__title text-sm">
                        {{ $post->title }}
                    </a>
                </h4>
              </div>
            </footer>
          </span>
        </li>
      @endforeach
    </ul>
  </div>
</section>

@endsection
