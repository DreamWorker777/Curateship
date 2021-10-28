<div class="masonry js-masonry js-infinite-scroll container max-width-lg margin-top-md" data-path="{{ url('/api/posts/page/{n}') }}" data-container=".js-infinite-scroll__content" data-current-page="1" data-load-btn="off">
  <div class="masonry__loader" aria-hidden="true">
    <svg class="icon icon--md icon--is-spinning" viewbox="0 0 32 32">
      <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none">
        <circle cx="16" cy="16" r="15" opacity="0.4"></circle>
        <path d="M16,1A15,15,0,0,1,31,16" stroke-linecap="butt"></path>
      </g>
    </svg>
  </div>
  <ul class="masonry__list js-masonry__list js-infinite-scroll__content">
  @foreach($posts as $post)
    <li class="masonry__item js-masonry__item post">
    @if($post->thumbnail)
      <a class="thumb" href="{{ route('single-post-view', ['slug'   => $post->slug]) }}">
        <figure class="card-v2">
          <img class="block width-500% radius-md radius-bottom-right-0 radius-bottom-left-0" src="{{ $post->showThumbnail('medium') }}" alt="Image of {{ $post->title }}">
          <figcaption class="card-v2__caption padding-x-sm padding-top-md padding-bottom-sm text-left">
            
          </figcaption>
        </figure>
      </a>
    @else
      <span class="card__img card__img-cropped bg-opacity-50%"></span>
      <div class="post-cell text-component line-height-xs v-space-xxs text-sm line-height-md">
        <p><a class="color-contrast-low" href="{{ route('single-post-view', ['slug' => $post->slug]) }}">{{ $post->title }}</a></p>
      </div>
    @endif
      <div class="user-cell">
        <div class="text-component text-xxxxs text-base@md padding-bottom-xs"><a class="color-contrast-lower" href="{{ route('single-post-view', ['slug' => $post->slug]) }}">{{ $post->title }}</a></div>
        <br>
      </div>
    </li>  
  @endforeach
  </ul>

  <div class="text-center margin-y-md is-hidden js-infinite-scroll__loader" aria-hidden="true">
    <svg class="icon icon--md icon--is-spinning" viewBox="0 0 32 32"><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none"><circle cx="16" cy="16" r="15" opacity="0.4"></circle><path d="M16,1A15,15,0,0,1,31,16" stroke-linecap="butt"></path></g></svg>
  </div>

  <div class="margin-top-md flex justify-center">
    <button class="btn btn--primary js-infinite-scroll__btn">Load More</button>
  </div>
</div>

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('custom-scripts.masonry-scroll')
@endpush
