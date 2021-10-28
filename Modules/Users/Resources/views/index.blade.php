@extends('admin::layouts.master')
@section('content')
@include('users::partials.modals')
  <section>
    <div class="container max-width-lg">
      <div class="grid">
        <main class="position-relative z-index-1 col-15@md link-card radius-md">
          @include('users::partials.control')
          <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
          <div class="padding-sm">
            <div id="site-table-with-pagination-container">
              @include('users::partials.table')
            </div><!-- /#site-table-with-pagination-container -->
          </div><!-- Padding -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection
@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('users::partials.script-js')
@endpush
