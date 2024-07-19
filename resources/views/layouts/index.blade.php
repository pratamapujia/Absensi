<!doctype html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    @yield('title')
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('__manifest.json') }}">
  </head>

  <body>

    <!-- loader -->
    <div id="loader">
      <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    @yield('header')
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
      @yield('main')
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    @include('layouts.bottomNav')
    <!-- * App Bottom Menu -->

    <!-- ============== Js Files ==============  -->
    @include('layouts.script')

  </body>

</html>
