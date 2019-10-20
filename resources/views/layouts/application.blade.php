<!DOCTYPE html>
<html>
  <head>
      <title>@yield('title')</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <script src="{{ asset('js/app.js') }}"></script>
  </head>

  <body>
    @include('layouts.header')
    <div class="container"></div>
      @yield('content')
    </div>
    @include('layouts.footer')
  </body>
</html>
