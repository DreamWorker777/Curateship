@extends('admin::layouts.master')
@section('content')
@include('admin::editor.component.partials.edit-modal')
@include('admin::editor.component.partials.create-modal')
@include('admin::editor.component.partials.preview-modal')
@include('admin::editor.component.partials.select-component-modal')
<section>
    <div class="container max-width-lg">
      <div class="grid gap-sm">
        <main class="position-relative z-index-1 col-15@md link-card radius-md">
          @include('admin::editor.component.partials.control')
        </div><!-- End Control -->
          <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
            <div id="site-table-with-pagination-container">
              @include('admin::editor.component.partials.table')
            </div><!-- /#site-table-with-pagination-container -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-styles')
  <link rel="stylesheet" href="{{ asset('css/markdownEditor.css') }}">
@endpush

@push('module-scripts')
  <script src="{{ asset('js/markdownEditor.js') }}"></script>
@endpush
