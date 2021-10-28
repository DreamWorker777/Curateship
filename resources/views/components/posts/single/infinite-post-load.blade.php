<div class="js-infinite-scroll container max-width-lg" data-path="{{ url('/api/post/' . $post->id . '/{n}') }}" data-container=".js-infinite-scroll__content" data-current-page="1" data-load-btn="off">
  <!-- Start of infinite scroll post container -->
  <div class="js-infinite-scroll__content">
    <!-- Start of each post content -->
    <article class="container single-post max-width-sm padding-y-md" data-title="{!! $post->seo_title !!}" data-url="{{ url($post->url) }}">
      <div class="text-component text-left line-height-lg v-space-md margin-bottom-md text-sm">
        <h1>{{ $post->title }}</h1>
        <p class="color-contrast-medium text-md">{!! $post->description !!}</p>
        <figure class="">
        @if($post->video)
          <div class="video-wrap margin-bottom-md">
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
          <img src="{{ $post->showThumbnail() }}" alt="Image of {{ $post->title }}">
        @endif

          <div class="author__content">
            <h4 class="story-v2__meta text-sm">
              by:
              <a href="{{ route('pages.profile.user', $post->user->username) }}" rel="author">
                {{ $post->user->name }}
              </a>
            </h4>
          </div>

          <span>
            @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
              <a
                href="{{ route('pages.tags', $tag_pill_name) }}"
                class="btn color-contrast-medium post-thumbnail-tags-pill margin-right-xxxs margin-bottom-xxxs"
                draggable="false" ondragstart="return false;"
              >
                {{ $tag_pill_name }}
              </a>
              @if($tag_pills_key < count($tag_pills) - 1)
              @endif
            @endforeach
          </span>
        </figure>
      </div>
    </article> <!-- End of each post content -->  
  </div> <!-- End of infinite scroll post container -->

  <div class="text-center margin-y-md is-hidden js-infinite-scroll__loader" aria-hidden="true">
    <svg class="icon icon--md icon--is-spinning" viewBox="0 0 32 32"><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none"><circle cx="16" cy="16" r="15" opacity="0.4"></circle><path d="M16,1A15,15,0,0,1,31,16" stroke-linecap="butt"></path></g></svg>
  </div>

  <div class="margin-top-md flex justify-center">
    <button class="btn btn--primary js-infinite-scroll__btn">Load More</button>
  </div>

</div>

@push('module-styles')
  <!-- MODULE'S CUSTOM Style -->
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@push('module-scripts')
  <!-- MODULE'S CUSTOM SCRIPT -->
  @include('custom-scripts.infinite-post-scroll')
@endpush
