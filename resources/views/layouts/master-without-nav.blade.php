<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('layouts.head-css')
    <link href="{{ URL::asset('build/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets_new/css/toastr.min.css') }}">
    @yield('css')

</head>

<body>

    <div id="status-message" data-status="{{ session('success') }}" style="display: none;"></div>
        <div id="error-message" data-error="{{ session('error') }}" style="display: none;"></div>
    @yield('content')
 

    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ asset('assets_new/js/toastr.min.js') }}"></script>

    @yield('scripts')

    <!-- vendor-scripts -->
    @include('layouts.vendor-scripts')


     


</body>

</html>
