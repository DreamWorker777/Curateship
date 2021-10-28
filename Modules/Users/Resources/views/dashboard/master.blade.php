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

  <title>User Dashboard</title>

  @include('site1.partials.external-fonts-v1')

</head>
<body>

  @include('site1.partials.header')
  @yield('content')
  @include('site1.partials.footer')

  <!-- CODYHOUSE, LIBRARIES -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>

  <!-- COMMON SCRIPTS -->
  @include('admin::partials.custom-script')
  @include('custom-scripts.custom-script')
  <!-- MODULE SCRIPTS -->
  @stack('module-scripts')
</body>
</html>
