@extends('templates.layouts.index')
@section('content')
  @if ($posts_published_count == 0 && $posts_draft_count == 0 && $posts_pending_count == 0 && $posts_deleted_count == 0)
    <section>
      <div class="container max-width-lg margin-top-lg">
        @include('users::dashboard.no-post')
      </div><!-- /.container -->
    </section>
  @else
  
    <section>
      <div class="container max-width-lg">
        <div class="grid">

        <main class="position-relative z-index-1 col-15@md link-card radius-md">
          @include('users::dashboard.notification')
          @include('users::dashboard.sub-nav')
          <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
          <div id="site-table-with-pagination-container" class="posts-wrp">
            @include('users::dashboard.table')
          </div><!-- /#site-table-with-pagination-container -->
          @include('users::dashboard.add-post')
          @include('users::dashboard.edit-post')
       </main><!-- .column -->
        </div><!-- /.grid -->
      </div><!-- /.container -->
    </section>
    @include('users::dashboard.reject-modal')
  @endif
@endsection

@push('module-styles')
<!-- MODULE'S CUSTOM Style -->
  @include('post::partials.custom-style')
@endpush

@push('module-scripts')
  <!-- MODULE'S CUSTOM SCRIPT -->
  @include('users::dashboard.script-js')
@endpush
