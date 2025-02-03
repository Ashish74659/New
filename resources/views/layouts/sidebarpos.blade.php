 
@php
    $user = App\Helpers\ModelHelper::leftbar_detaild();
    $type = $user[0];
    $name = $user[1];
    $img = $user[2];
@endphp
<div class="vertical-menu sidepos">
    <div class="navbar-brand-box navpos mt-4">
        <a href="{{ url()->previous() }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark" height="22">
            </span>
        </a>

        <a href="{{ url()->previous() }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/pos-img/logo-small.png') }}" alt="logo-sm-dark">
            </span>
            <span class="logo-lg"> <img src="{{ URL::asset('build/images/pos-img/logo.png') }}" alt="logo-sm-dark">
            </span>
        </a>
    </div>
    <div data-simplebar class="vertical-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <form class="app-search d-none p-0 me-0 d-lg-block">
                    <div class="position-relative">
                        <input type="text" id="item_search_text" class="form-control" placeholder="Item Search..." onkeyup="$.item_search(this)" onKeyPress="return $.alpha_num_space_period();">
                        <span class="ri-search-line"></span>
                    </div>
                </form>
                 
                <li class="sidenav mb-2" data-bs-toggle="modal" data-bs-target=".order-history" onclick="$.order_history()">
                    <a href="#"><span>{{__('pos.view-orders')}}</span></a>
                </li> 

                <li class="sidenav mb-2">
                    <a href="#"> <span>{{__('pos.reset')}}</span> </a>
                </li>

                <li class="sidenav mb-2" data-bs-toggle="modal" data-bs-target=".reg-modal" onclick="$.register_details('details')">
                    <a href="#"><span> {{__('pos.register-detail')}} </span></a>
                </li>

                <li class="sidenav mb-2" data-bs-toggle="modal" data-bs-target=".open-customer">
                    <a href="#"><span>{{__('pos.customer')}}</span></a>
                </li>

                <li class="sidenav mb-2">
                    <a href="#"> <span>{{__('pos.sales-return')}}</span></a>
                </li>

                <li class="sidenav mb-2" data-bs-toggle="modal" data-bs-target=".runord-modal" onclick="$.running_order()">
                    <a href="#"><span>{{__('pos.running-order')}}</span></a>
                </li>
                 
                <li class="sidenav mb-2"  data-bs-toggle="modal" data-bs-target=".close-modal" onclick="$.register_details('close')">
                    <a href="#"><span>{{__('pos.close-register')}}</span></a>
                </li>
                <li class="sidenav mb-2">
                    <a href="{{ route('login') }}"> <span> {{__('pos.go-back')}}</span></a>
                </li>
            </ul>

        </div>

    </div>
 
</div>
