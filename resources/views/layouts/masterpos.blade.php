<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | POS - Powered By Amysoftech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="google" content="notranslate">

    <!-- App favicon -->

    <link rel="icon" type="image/png" href="https://www.amysoftech.com/images/favicon-1.ico">
    {{-- <link rel="icon" type="image/png" href="{{ URL::asset('build/images/favicon.png') }}"> --}}


    <!-- include head css -->
    <link href="{{ URL::asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets_new/css/toastr.min.css') }}">
    @yield('css')

</head>

@yield('body')

<!-- Begin page -->
<div id="layout-wrapper">
    <!-- topbar -->
    {{-- @include('layouts.topbar') --}}
    @include('sweetalert::alert')

    <!-- sidebar components -->
    @include('layouts.sidebarpos')

    <div class="main-content posnavmar">
        <div id="status-message" data-status="{{ session('success') }}" style="display: none;"></div>
        <div id="error-message" data-error="{{ session('error') }}" style="display: none;"></div>
        <div class="page-content">
            <div class="container-fluid">
                <div id="layout-wrapper">
                    <div class="loader-wrapper">
                        <div class="loader"></div>
                    </div>
                    @yield('content')

                </div>
            </div>

            {{-- @include('layouts.footer') --}}

        </div>
    </div>


    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ asset('assets_new/js/toastr.min.js') }}"></script>

    @yield('scripts')
    @yield('internalpagejs')

    @include('layouts.vendor-scripts')
  
    </body>

</html>
