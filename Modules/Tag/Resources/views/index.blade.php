@extends('admin::layouts.master')
@section('content')
  @include('tag::partials.modals')
  @include('tag::partials.edit-modals')
  @include('tag::partials.modals-setting')
  <section>
    <div class="container max-width-lg">
      <div class="grid">
        <main class="position-relative z-index-1 col-15@md link-card radius-md">
          @include('tag::partials.control')
          <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
          <div class="padding-sm">
            <div id="site-table-with-pagination-container">
              @include('tag::partials.table')
            </div><!-- /#site-table-with-pagination-container -->
          </div><!-- Padding -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-styles')
<!-- MODULE'S CUSTOM Style -->
  @include('tag::partials.custom-style')
@endpush

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('tag::partials.script-js')
@endpush
