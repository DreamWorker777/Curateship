@extends('admin::layouts.master')
@section('content')
<div class="container max-width-lg">
  <div class="grid">
    @include('admin::partials.sidebar')
        <main class="position-relative z-index-1 col-12@md link-card">
            <div id="site-table-with-pagination-container">
                <div class="container max-width-lg margin-top-xs">
                    <div class="grid gap-md@md">
                    {!! Menu::render() !!}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
{!! Menu::scripts() !!}
  @include('admin::partials.settings-script-js')
@endpush
