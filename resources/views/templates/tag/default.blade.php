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
      <p class="text-xl margin-bottom-md">{{ $page_title }}</p>
      <ul class="grid-auto-md gap-md">
      @foreach($posts as $key => $post)
        <li>
          <span class="card-v8 bg radius-lg">
            @if($post->video)
              <div class="video-wrap">
                <video id="video-player-{{$post->id}}" class="video-js video-small vjs-big-play-centered video-player" width="320" height="150" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "fluid": true}' poster="{{ $post->showThumbnail('medium') }}">
                  <source src="{{ $post->video }}" type="{{ $post->video_type }}" />
                  <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                      >supports HTML5 video</a
                    >
                  </p>
                </video>
              </div>
            @else
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
            @endif

            <footer class="padding-sm" style="position:relative">
              <p class="text-sm color-contrast-medium margin-bottom-sm post-thumbnail-tags-sm">
                <span>
                  @php
                    $tag_pills = $post->getTagNames();
                  @endphp
                  @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
                      <a
                        href="{{ route('pages.tags', $tag_pill_name) }}"
                        class="color-contrast-medium post-thumbnail-tags-pill"
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

@push('module-styles')
  <!-- MODULE'S CUSTOM Style -->
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@push('module-scripts')
  <!-- MODULE'S CUSTOM SCRIPT -->
  <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
@endpush
