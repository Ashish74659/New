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
    @include('layouts.topbar')
    @include('sweetalert::alert')

    <!-- sidebar components -->
    @include('layouts.sidebar')

    <div class="main-content">
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

            @include('layouts.footer')

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


    <script>
        const laravelTimezone = @json(config('app.timezone'));

        function updateMuscatTime() {
            const now = new Date();
            const options = {
                timeZone: laravelTimezone,
                hour12: true,
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            };

            const formatter = new Intl.DateTimeFormat([], options);
            document.getElementById('muscatTime').textContent = formatter.format(now);
        }
        setInterval(updateMuscatTime, 1000);
        updateMuscatTime();


        function change_company() {
            var company_id = document.getElementById("company_id").value;
            $.ajax({
                type: "POST",
                url: "{{ route('switch-company') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id
                },
                cache: false,
                async: false,
                success: function(response) {
                    if (response == 200) {
                        success("success", "Company Switched");
                        window.location.href = "{{ route('login') }}";
                    } else {
                        error("error", "Something went wrong");
                    }
                }
            });

        }

        $(document).ready(function() {

            $('#changeSystemLang').change(function() {

                var url = "{{ route('language-switch') }}";
                Swal.fire({
                    text: '',
                    icon: 'success',
                    title: "{{ __('frontend.language-changed-successfully') }}",
                    confirmButtonText: "{{ __('frontend.ok') }}", // OK text translated based on locale
                    confirmButtonColor: '#404bcb',
                    timer: 5000,
                    customClass: {
                        popup: document.documentElement.getAttribute('lang') === 'ar' ? 'swal-rtl' :
                            ''
                    }
                });


                window.location.href = url + "?lang=" + $(this).val();
            })
        });
        $(document).ready(function() {
            var savedLanguage = sessionStorage.getItem("languages");
            if (savedLanguage === "Arabic") {
                $("body").addClass("rtl");
            } else {
                $("body").removeClass("rtl");
            }

            $(".language_switch").on("change", function() {
                var selectedLanguage = $(this).val();
                if (selectedLanguage === "Arabic") {
                    $("body").addClass("rtl");
                    sessionStorage.setItem("languages", "Arabic");
                } else if (selectedLanguage === "English") {
                    $("body").removeClass("rtl");
                    sessionStorage.setItem("languages", "English");
                }
            });
        });
    </script>



    </body>

</html>
