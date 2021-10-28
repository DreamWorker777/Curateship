@extends('admin::layouts.master')
@section('content')
  @include('page::partials.modals')
  @include('page::partials.edit-modals')
  @include('page::partials.reject-modal')
  <section>
    <div class="container max-width-lg">
      <div class="grid">
        @include('admin::partials.sidebar')
        <main class="position-relative z-index-1 col-12@md link-card radius-md">
          @include('page::partials.control')
          <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
          <div class="padding-sm">
            <div id="site-table-with-pagination-container">
              @include('page::partials.table')
            </div><!-- /#site-table-with-pagination-container -->
          </div><!-- Padding -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('page::partials.script-js')
@endpush
