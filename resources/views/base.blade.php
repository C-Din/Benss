<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Test APP')</title>

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}" />

    </head>
    <body class="">
        @yield('content')

        <!-- plugins:js -->
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
        <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
        <!-- endinject -->
        @include('flashy::message')
    </body>
</html>
