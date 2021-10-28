@if($nextpage > 0)
<ul class="js-infinite-scroll__content" data-path="{{ url('/api/' . $api_route . '/page={n}') }}" data-current-page="{{ $nextpage }}">
@else
<ul class="js-infinite-scroll__content">
@endif
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
       
      </div>
    @endif
      <div class="user-cell">
          <h3 class="text-xs padding-xs@md text-md@md"><a class="color-contrast-low" href="{{ route('single-post-view', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
      </div>
    </li>  
  @endforeach 
</ul>
