@extends('admin::layouts.master')
@section('content')
@include('comment::partials.modals')
@include('comment::partials.alert-modal')
  <div class="container max-width-lg">
    <div class="grid gap-md@md">
      @include('comment::partials.sidebar')
      <main class="position-relative padding-top-md z-index-1 col-12@md">
          <div id="site-table-with-pagination-container">
          @include('comment::partials.control')
          @include('comment::partials.table')
        </div><!-- /#site-table-with-pagination-container -->
      </main>
    </div><!-- /.grid -->
  </div><!-- /.container -->
</section>
@endsection
