@extends('templates.layouts.index')
@section('content')
  <section>
    <div class="container max-width-lg">
      <div class="grid">
        @include('postbox.partials.sidebar')
        <main class="position-relative z-index-1 col-12@md link-card radius-md">
            <div id="site-table-with-pagination-container">
                @include('postbox.partials.control')
                <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
                    <div class="padding-sm">

                    </div><!-- Padding -->
                </div>
            </div><!-- /#site-table-with-pagination-container -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
 
@endpush
