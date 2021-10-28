<section class="feature-bottom container max-width-adaptive-lg margin-top-md margin-bottom-md">
    <div class="grid gap-md">
      <div class="col-8@md featured-post margin-bottom-lg padding-bottom-xs">

        @if($featured_post)
            @if($featured_post->thumbnail)
                <a href="{{route('single-post-view',['slug'   => $featured_post->slug])}} " class="featured__img-wrapper feautured__img-wrapper-cropped">
                    <img src="{{ $featured_post->showThumbnail('medium') }}" alt="Image of {{ $featured_post->title }}">
                </a>
            @else
                <span class="feautured__img-wrapper-cropped bg-black bg-opacity-50%"></span>
            @endif
            <h1 class="featured__headline-main feature-v12__offset-item text-left margin-x-xs@md">
                <a href="{{route('single-post-view',['slug'   => $featured_post->slug])}}" class="main-featured-title">{{ $featured_post->title }}</a>
            </h1>
        @endif
      </div>

      <div class="col-7@md">
        <div class="stories">
            @foreach($featured_list as $key => $post)
                <li class="stories__story">
                    @if($post->thumbnail)
                        <a href="{{route('single-post-view',['slug'   => $post->slug])}}" class="stories__img-wrapper">
                            <figure>
                                <img src="{{ $post->showThumbnail('medium') }}" alt="Image of {{ $post->title }}">
                            </figure>
                        </a>
                    @else
                        <span class="stories__img-wrapper bg-black bg-opacity-50%"></span>
                    @endif

                    <div class="featured__headline line-height-xl v-space-sm text-sm">
                        <h4 class="padding-bottom-xs">
                            <a href="{{route('single-post-view',['slug'   => $post->slug])}}">
                                {{ $post->title }}
                            </a>
                        </h4>
                        <div class="author author--minimal padding-bottom-xs">
                            @if($post->user->hasAvatar())
                                <a href="{{ route('pages.profile.user', $post->user->username) }}" class="author__img-wrapper">
                                    <img src="{{ $post->user->getAvatar() }}" alt="Author picture">
                                </a>
                            @else
                                <span class="author__img-wrapper"></span>
                            @endif
                            <div class="author__content">
                                <h4 class="stories__metadata">
                                    by
                                    <a href="{{ route('pages.profile.user', $post->user->username) }}" rel="author">
                                        {{ $post->user->name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <p class="stories__metadata padding-bottom-xs">
                            <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                {{ $post->created_at->format('F d, Y') }}
                            </time>
                            <span class="stories__separator" role="separator"></span>
                            @php
                                $tag_pills = $post->getTagNames();
                            @endphp
                            @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
                                <a href="{{ route('pages.tags', $tag_pill_name) }}">{{ $tag_pill_name }}</a>
                                @if($tag_pills_key < count($tag_pills) - 1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>
                </li>
            @endforeach
        </div>

      </div>
    </div>
  </section>