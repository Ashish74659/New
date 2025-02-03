@php
    $notifications = App\Models\Notifications::get();
    $test = App\Http\Controllers\NotificationController::index();
    $cmps = App\Helpers\ModelHelper::companies();

    $user = App\Helpers\ModelHelper::leftbar_detaild();
    $type = $user[0];
    $name = $user[1];
    $img = $user[2];
    $company_name = $user[3];

    $secondLastLogin = App\Models\LastLogin::where('user_id', Auth::user()->id)
        ->orderByDesc('id')
        ->offset(1)
        ->first();

@endphp

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/pos-img/logo.png') }}" alt="logo-sm-dark" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-dark"
                            height="25">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/pos-img/logo.png') }}" alt="logo-sm-dark" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-dark"
                            height="25">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
                id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <div class="page-title-box align-self-center d-none d-md-block">
                <h5 class="page-title mb-0">@yield('page-title')</h5>
            </div>
        </div>


        <div class="d-flex flex-column pb-0 ms-auto me-3 ">
            <div class="d-flex ">
                <div class="curlogin d-flex ">
                    <h6 class="text-muted m-0">
                        Current Time: <span class="text-warning me-3" id="muscatTime">
                    </h6>
                </div>
                <div class="prevlogin d-flex ms-3 ">
                    <h6 class="text-muted m-0">
                        Last Login :
                        {{ $secondLastLogin?->login_time ? \Carbon\Carbon::parse($secondLastLogin->login_time)->format('M d, Y, h:i:s A') : 'No previous login' }}
                    </h6>
                </div>
            </div>

        </div>

        <div class="d-flex">

            @if (count($cmps[0]) > 1)
                <div class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <select class="form-control" id="company_id" onchange="change_company();">
                            @foreach ($cmps[0] as $cmp)
                                <option value="{{ base64_encode(convert_uuencode($cmp?->company_id)) }}"
                                    @if ($cmp?->company_id == $cmps[1]) selected @endif>{{ $cmp?->company?->code }}
                                </option>
                            @endforeach
                        </select>
                        <span class="mdi mdi-repeat"></span>
                    </div>
                </div>
            @elseif($company_name)
                <div class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <select class="form-control" disabled>
                            <option value=""> {{ $company_name }} </option>
                        </select>
                        <span class="mdi mdi-repeat"></span>
                    </div>
                </div>
            @endif

            <div class="dropdown d-none d-sm-inline-block mt-3">
                <select class="form-control bord-select w-auto rounded-pill ps-3 pe-3 language_switch changeLang"
                    aria-label="Default select example" id="lang_name">
                    <option value="English" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>ENG</option>
                    <option value="Arabic" {{ app()->getLocale() === 'ar' ? 'selected' : '' }}>ARB</option>
                </select>
            </div>



            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                @php
                    $id = Auth::user()->id;
                    $allnotify = App\Models\CustomNotifications::where('user_id', $id)->latest()->limit(5)->get();

                @endphp
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    @if (count($allnotify) > 0)
                        <span class="noti-dot"></span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> {{ __('common.notifications') }} </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('mark-as-read') }}" class="small"> {{ __('common.Read-All') }} </a>
                            </div>
                        </div>
                    </div>

                    @forelse ($allnotify as $notify)
                        <div data-simplebar style="max-height: 230px;" class="m-2">
                            <div class="d-flex">
                                <div class="avatar-xs me-3 ms-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-bell-ring"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <a href="{{ $notify?->url }}">
                                        <h6 class="mb-1 font-size-12">{{ $notify->message }} </h6>
                                    </a>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-2"><i class="mdi mdi-clock-outline"></i>
                                            {{ App\Helpers\Helpers::getTimeAgo($notify?->created_at) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div data-simplebar>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <h6 class="mb-1 text-center"> {{ __('common.All-Read') }} </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforelse



                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center"
                                href="{{ route('view-all-notify') }}">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> {{ __('common.view-More') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button type="button" class="btn w-100 px-3 border-0" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="align-items-center">
                        <div class="d-flex align-items-center mt-2">                                                       
                            <img src="{{document_path($img)}}" 
                                class="img-fluid header-profile-user rounded-circle" alt="">                             
                            <div class="ms-2 text-start">
                                <span class="fw-medium text-muted"> {{ $name }} </span>
                            </div>
                        </div>

                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    @if (Auth::user() && Auth::user()->roles->isNotEmpty() && Auth::user()->roles->first()->name == 'Vendor')
                        @php
                            $vendoremail = App\Helpers\Helpers::getVendorProfile(Auth::user()->email);
                        @endphp
                        <a class="dropdown-item"
                            href="{{ route('vendor-view', ['id' => base64_encode(convert_uuencode($vendoremail?->id))]) }}"><i
                                class="mdi mdi-account text-muted font-size-16 align-middle me-1"></i><span
                                class="align-middle">{{ __('common.profile') }}</span></a>

                        <a class="dropdown-item" href="{{ route('emp-admin-password-change') }}"><i
                                class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i><span
                                class="align-middle">{{ __('common.change-password') }}</span></a>
                    @else
                        <a class="dropdown-item" href="{{ route('emp-admin-profile') }}"><i
                                class="mdi mdi-account text-muted font-size-16 align-middle me-1"></i><span
                                class="align-middle">{{ __('common.profile') }}</span></a>
                    @endif


                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="dropdown-item" href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i>
                            <span class="align-middle">{{ __('common.logout') }}</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

@include('keystroke')
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
