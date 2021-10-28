@if ($page)
<article class="padding-bottom-lg">
 

    <div class="container max-width-adaptive-lg">
      <div class="text-component text-left margin-top-lg">
        <h1 class="text-xxl">{{ $page->title }}</h1>
      </div>
    </div>
  </div>

  <div class="container max-width-adaptive-lg padding-y-md">
    <div class="line-height-lg v-space-md">
      <section class="max-height-100vh bg-contrast-lower"></section>
      {!! $page->description !!}
    </div>

</article>
@endif