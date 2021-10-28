<div class="container-justified-gal">
  @if(count($posts) > 0)
    <div class="flexbin flexbin-margin infinite-scroll">
      @foreach($posts as $post)
        <?php
          $slug = (is_null($post->seo_page_title)) ? $post->title : $post->seo_page_title;
          $slug = Str::slug($slug);
        ?>
        <a class="post-link" href="{{ route('post.show', ['slug' => $slug, 'id' => $post->id]) }}">
          <img src="{{ asset('storage/posts/images') }}/{{ $post->thumbnail_medium }}" class="card-v2" style="object-fit: cover;">
        </a>
      @endforeach

      
    </div>
  @else
    <div class="text-center margin-top-xxxxl color-black color-opacity-40% text-sm">
      No post available.
    </div>
  @endif

</div>
<footer class="footer-v4 padding-y-lg">
