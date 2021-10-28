<?php 
  $components = isset($components) ? $components : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="current-url" content="{{ url()->full() }}">

  <!-- favicon 👇 -->
  <link rel="icon" type="image/svg+xml" href="{{ !empty($settings_data['favicon']) ? asset($settings_data['favicon']) : asset('assets/img/favicon.svg') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <script>
    if('CSS' in window && CSS.supports('color', 'var(--color-var)')) {
      document.write('<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">');
    } else {
      document.write('<link rel="stylesheet" href="{{ asset('assets/css/style-fallback.css') }}">');
    }
  </script>

  <noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/style-fallback.css') }}">
  </noscript>

  <!-- MODULE Style -->
  @stack('module-styles')

  <title>Admin</title>

  @include('partials.external-fonts-v1')

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>
<body>

  @include('admin::partials.main-header-v2')
  @yield('content')
  @include('partials.footers.footer')
  <!-- CODYHOUSE, LIBRARIES -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

  <!-- COMMON SCRIPTS -->
  @include('admin::partials.custom-script')
  @include('custom-scripts.custom-script')
  <!-- MODULE SCRIPTS -->
  @stack('module-scripts')

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var componentInfo = {!! json_encode($components, JSON_HEX_TAG) !!};
  </script>
</body>
</html>
