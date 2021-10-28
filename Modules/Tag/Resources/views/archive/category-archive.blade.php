@extends('templates.layouts.index')

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($page_title)
  @section('meta-title-tag'){!! $page_title !!}@endsection
@endisset

@section('content')
<section class="margin-top-md">
    <div class="container max-width-adaptive-lg">
      <p class="text-xl margin-bottom-md">{{ $page_title }}</p>
      <ul class="grid-auto-md gap-md">
      @foreach($posts as $key => $post)
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