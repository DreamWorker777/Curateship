@if ($post)
<article class="padding-bottom-lg">
  @php
    $wrapper_class = $post->video ? "main-video-wrap" : ""
  @endphp
  <div class="t-article-v2__hero {{ $wrapper_class }}">
    @if ($post->video)
    <div class="video-wrap">
      <video id="video-player-{{$post->id}}" class="video-js video-small vjs-big-play-centered video-player" width="320" height="150" data-setup='{"controls": false, "autoplay": true, "preload": "auto", "fluid": true, "loop": true}'>
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
    <div
      class="t-article-v2__cover"
      aria-hidden="true"
      @if($post->thumbnail)
        style="background-image: url('{{ $post->showThumbnail() }}');"
      @endif
    ></div>
    @endif

    <div class="t-article-v2__intro container max-width-adaptive-sm radius-lg">
      <div class="text-component text-center">
        <h1 class="text-xxl">{{ $post->title }}</h1>
        <p class="text-sm">
          By
          <a href="{{ route('pages.profile.user', $post->user->username) }}">
            {{ $post->user->name }}
          </a>
        </p>
      </div>

      <div class="t-article-v2__divider margin-top-lg" aria-hidden="true"><span></span></div>
    </div>
  </div>

  <div class="container max-width-adaptive-sm padding-y-md">
    <div class="text-component line-height-lg v-space-md">
      <section class="max-height-100vh bg-contrast-lower" id="sticky-banner-target"></section>
      {!! $post->description !!}
    </div>
  </div>

<!-- Social Share -->

  <div class="sticky-banner bg shadow-xs js-sticky-banner" data-target-in="#sticky-banner-target">
    <!--👇 sticky banner content -->
    <div class="flex padding-sm margin-xxxxs@md">
      <div>
        <a href="{{ url('/') }}"><div class="flex"><svg version="1.0" xmlns="http://www.w3.org/2000/svg"
        width="24.000000pt" height="24.000000pt" viewBox="0 0 200.000000 200.000000"
        preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,200.000000) scale(0.100000,-0.100000)"
            fill="#000000" stroke="no">
            <path d="M855 1989 c-234 -33 -481 -175 -630 -362 -457 -571 -175 -1417 532
            -1598 42 -10 88 -19 103 -19 l27 0 12 118 c21 200 17 188 76 228 80 52 126
            120 146 213 8 40 7 62 -6 113 -9 34 -20 67 -24 71 -5 5 -10 -25 -13 -67 -9
            -131 -78 -235 -194 -292 -54 -27 -68 -29 -169 -29 -98 0 -116 3 -167 27 -76
            35 -130 79 -158 130 -22 40 -23 41 -4 55 24 18 115 65 118 61 90 -149 183
            -183 315 -117 99 49 128 126 78 200 -38 56 -81 79 -222 118 -62 16 -132 68
            -162 118 -21 36 -27 63 -31 122 -4 68 -1 84 22 134 37 76 101 132 184 157 52
            16 92 20 216 20 l152 0 12 116 c27 256 60 333 181 426 l35 26 -41 11 c-106 29
            -269 37 -388 20z"/>
            <path d="M1410 1819 c-50 -15 -85 -44 -105 -86 -15 -32 -24 -85 -49 -305 l-4
            -38 124 0 124 0 0 -75 0 -75 -135 0 c-74 0 -135 -2 -135 -5 0 -4 -83 -718
            -132 -1128 -6 -53 -9 -99 -6 -102 8 -8 160 23 234 49 269 91 503 315 604 579
            52 132 63 199 64 357 1 221 -45 381 -161 559 -60 93 -198 236 -247 256 -45 19
            -135 26 -176 14z"/>
            <path d="M695 1226 c-42 -18 -68 -61 -69 -113 -2 -75 72 -132 244 -188 47 -15
            91 -32 98 -38 7 -5 14 -8 16 -6 2 2 11 67 20 144 9 77 19 157 22 178 l6 37
            -154 0 c-104 -1 -163 -5 -183 -14z"/>
            </g>
        </svg></div></a>
      </div>

      <div class="flex-2 sticky-title margin-left-sm margin-right-sm text-xs padding-top-xs">
        <h3>{{ $post->title }}</h3>
      </div><!-- /.margin-left-sm margin-right-sm -->

      <ul class="socials__btns">
        <li>
          <a href="#0">
            <svg class="icon" viewBox="0 0 32 32"><title>Follow us on Twitter</title><g><path d="M32,6.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6C25.7,3.8,24,3,22.2,3 c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5C10.3,10.8,5.5,8.2,2.2,4.2c-0.6,1-0.9,2.1-0.9,3.3c0,2.3,1.2,4.3,2.9,5.5 c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1C2.9,27.9,6.4,29,10.1,29c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C30,8.5,31.1,7.4,32,6.1z"></path></g></svg>
          </a>
        </li>

        <li>
          <a href="#0">
            <svg class="icon" viewBox="0 0 32 32"><title>Follow us on Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg>
          </a>
        </li>
      </ul>

    </div><!-- /.flex -->
  </div><!-- /.sticky-banner -->

</article>
@endif

@push('module-styles')
  <!-- MODULE'S CUSTOM Style -->
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@push('module-scripts')
  <!-- MODULE'S CUSTOM SCRIPT -->
  <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
  <script type="text/javascript">
    videojs.hook('setup', function(player) {
      $('.main-video-wrap').addClass("loaded");
    });  
  </script>
@endpush
