@php
    $user = App\Helpers\ModelHelper::leftbar_detaild();
    $type = $user[0];
    $name = $user[1];
    $img = $user[2];
@endphp
<div class="vertical-menu">



    <div class="navbar-brand-box">
        <a href="{{ url()->previous() }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark" height="24">
            </span>
        </a>

        <a href="{{ url()->previous() }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/pos-img/logo.png') }}" alt="logo-sm-dark">
            </span>
        </a>

    </div>
    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        id="vertical-menu-btn"> <i class="mdi mdi-chevron-double-left"></i> </button>
    <div data-simplebar class="vertical-scroll">

        <div id="sidebar-menu">

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('login')}}" class="has-arrow waves-effect nav-li">
                        <i class="mdi mdi-view-grid-outline"></i>
                        <span>Dashboard</span>
                    </a>
 
                </li>

                <li class="bor-bottom">
                    <a href="javascript: void(0);" class="has-arrow waves-effect nav-li">
                        <i class="ri-settings-2-line"> </i>
                        <span>{{ __('common.master-stepup') }}</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                        <li><a href="{{ route('setup') }}" class="">{{ __('common.setup') }}</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Settings</li>
                <li><a href="{{ route('company-list') }}"> <i class="ri-settings-2-lineo"> </i><span>Company Settings</span></a> </li>
                 <li><a href="{{ route('document-view-page',['m'=>base64_encode(convert_uuencode('Item'))]) }}"> <i class="ri-settings-2-line"> </i><span>Item Image</span></a>
                <li><a href="{{ route('document-view-page',['m'=>base64_encode(convert_uuencode('Category'))]) }}"> <i class="ri-settings-2-line"> </i><span>Category Image</span></a>
                <li><a href="{{ route('document-view-page',['m'=>base64_encode(convert_uuencode('User'))]) }}"> <i class="ri-settings-2-line"> </i><span>User Image</span></a>
                </li>

                <li><a href="{{ route('open-registration') }}"> <i class="ri-settings-2-line"> </i><span>POS</span></a>
                </li>


                <li><a href="{{ route('running-order') }}"> <i class="ri-settings-2-line"> </i><span>Running
                            Order</span></a>
                </li>                

                
            </ul>


        </div>

    </div>
</div>
