<section class="margin-top-md">
  <div class="drag-gallery js-drag-gallery container max-width-adaptive-lg">
    <ul class="drag-gallery__list drag-gallery__list-align-top gap-md">
      @foreach($posts as $post)
        <li class="drag-gallery__item">
          <div class="card">
            @if($post->thumbnail)
                <a src="
                  {{
                      route(
                          'single-post-view',
                          [
                              'slug'   => $post->slug
                          ]
                      )
                  }}
                " draggable="false" ondragstart="return false;" class="j-draggable card__img card__img-cropped">
                    <img src="{{ $post->showThumbnail('medium') }}" alt="Image of {{ $post->title }}">
                </a>
            @else
                <span class="card__img card__img-cropped bg-black bg-opacity-50%"></span>
            @endif

            <div class="card__content card-v8 bg overflow-visible">
              <p class="text-sm color-contrast-medium margin-bottom-sm post-thumbnail-tags">
                <span>
                  @php
                    $tag_pills = $post->getTagNames();
                  @endphp
                  @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
                      <a
                        href="{{ route('pages.tags', $tag_pill_name) }}"
                        class="color-contrast-medium"
                        draggable="false" ondragstart="return false;"
                      >
                        {{ $tag_pill_name }}@if($tag_pills_key < count($tag_pills) - 1),@endif
                      </a>
                  @endforeach
                </span>
              </p>
              <div class="text-component">
                <h4>
                    <a
                      src="
                        {{
                            route(
                                'single-post-view',
                                [
                                    'slug'   => $post->slug
                                ]
                            )
                        }}
                      "
                      class="j-draggable color-contrast-higher card-v8__title"
                      draggable="false" ondragstart="return false;"
                    >
                        {{ $post->title }}
                    </a>
                </h4>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    <div class="custom-drag-gallery-end-overlay right"></div><!-- /.custom-gallery-end-overlay -->
  </div><!-- /.drag-gallery js-drag-gallery container max-width-adaptive-lg -->
</section>
