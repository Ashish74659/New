@extends('layouts.masterpos')

@section('title')
    Pos
@endsection

@section('css')
@include('layouts.select2css')
<style>
    .page-content {
        padding: 0px 0px 60px;
    }

    .btn-pos {
        position: absolute;
        left: 5px;
        top: 10px;
        width: 32px;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 100px;
        font-size: 15px;
        color: #111;
        background: #FE9F43;
    }

    .btn-pos.active {
        color: #FE9F43;
        background: #fff;
    }

    .btn-back {
        color: #171717;
        padding: 5px 25px 5px 25px;
        border-radius: 100px;
        border: 1px solid #D9D9D9;
        background: #fff;
        text-align: justify;
        font-size: 12px;
        font-weight: 500;
        width: 200px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;

    }

    .btn-back.active {
        color: #fff;
        border-radius: 100px;
        border: 1px solid #FE9F43;
        background: #FE9F43;
        width: 200px;
    }

    #sidebar-menu ul li a i {

        min-width: 1.2rem;
    }

    .btn-sidepos {
        position: absolute;
        left: 3px;
        top: 2px;
        width: 28px;
        height: 28px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 100px;
        font-size: 15px;
        color: #111;
        background: #FE9F43;
    }

    .sidenav {
        background: #182B4C1A;
        border-radius: 22px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }



    .nav-wrapper {
        position: relative;
        overflow: hidden;
        /* Hide the overflow so the scroll is not visible */
        display: flex;
        align-items: center;
    }

    .nav {
        display: flex;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 10px;
    }

    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-75%);
        background-color: rgb(0 0 0 / 18%);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 5px;
        cursor: pointer;
        font-size: 25px;
        z-index: 0;
    }

    .scroll-btn.left {
        left: 0;
    }

    .scroll-btn.right {
        right: 0;
    }

    /* Optional: hide the default scrollbar */
    .nav::-webkit-scrollbar {
        display: none;
    }

    .nav {
        -ms-overflow-style: none;
        /* For Internet Explorer */
        scrollbar-width: none;
        /* For Firefox */
    }
</style>
@endsection

@section('body')

    <body data-sidebar="colored" class="bg-pos">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-md-8 pagepadding">
                <div class="table-responsive" data-simplebar style="max-width: 880px;">
                    <button class="scroll-btn left" onclick="scrollNav('left')"><i
                        class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
                        <ul class="nav nav-pills nav-catenew nav-justified   flex-nowrap gap-3 mb-2" role="tablist">
    
                            <li class="nav-item  waves-light" onclick="$.category_item('category_id','all')"
                                role="presentation">
                                <a class="nav-link nav-catelink active" data-bs-toggle="tab" role="tab" aria-selected="true">
                                    <span class="img-cate mb-1"><img src="{{ document_path('') }}"
                                            class="rounded-circle avatar-sm">
                                    </span>
                                    <p class="font-size-12 mb-0 pt-1"> All </p>
                                    <p class="font-size-10 mb-0 text-muted"> @php echo App\Helpers\ModelHelper::count_cat_subcat_item('all','all'); @endphp items </p>
                                </a>
                            </li>

                            @foreach ($category as $cate)
                                <li class="nav-item  waves-light" onclick="$.category_item('category_id',{{ $cate?->id }})"
                                    role="presentation">
                                    <a class="nav-link nav-catelink"
                                        data-bs-toggle="tab" href="#home-{{ $loop->iteration }}" role="tab"
                                        aria-selected="true">
                                        <span class="img-cate mb-1"><img src="{{ document_path($cate?->image) }}"
                                                class="rounded-circle avatar-sm">
                                        </span>
                                        <p class="font-size-12 mb-0 pt-1"> {{ $cate?->name }} </p>
                                        <p class="font-size-10 mb-0 text-muted"> @php echo App\Helpers\ModelHelper::count_cat_subcat_item('category_id',$cate?->id); @endphp items </p>
                                    </a>
                                </li>
                            @endforeach
                            
    
                        </ul>
                    <button class="scroll-btn right" onclick="scrollNav('right')"><i
                        class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
                </div>


                <div class="tab-content ">
 
                    @foreach ($category as $cate)
                        <div class="tab-pane" id="home-{{ $loop->iteration }}" role="tabpanel">
                            {{-- <div class="d-flex gap-2 mb-2">
                                @foreach ($subcategories[$loop->iteration - 1] as $subcate)
                                    <div class="position-relative cursor-pointer">
                                        <button type="button" class="btn-back active" onclick="$.category_item('subcategory_id',{{ $subcate?->id }})"><span class="font-size-13"> {{ $subcate?->name }}</span><br> <span class="font-size-12">@php echo App\Helpers\ModelHelper::count_cat_subcat_item('subcategory_id',$subcate?->id); @endphp items</span></button>
                                    </div>
                                @endforeach

                            </div> --}}

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="d-flex gap-2 mb-2  list-unstyled table-responsive">
                                        @foreach ($subcategories[$loop->iteration - 1] as $subcate)
                                        <li onclick="$.category_item('subcategory_id',{{ $subcate?->id }})">
                                            <div class="btn-back"><span class="font-size-13">{{ $subcate?->name }}</span><br>
                                                <span class="font-size-12">@php echo App\Helpers\ModelHelper::count_cat_subcat_item('subcategory_id',$subcate?->id); @endphp items</span>
                                            </div>
                                        </li>    
                                        @endforeach
                                      
    
    
    
    
                                    </ul>
                                </div>
    
    
                            </div>
                        </div>
                    @endforeach

                    <div class="table-responsive" data-simplebar style="max-height:500px;">
                        <div class="row" id="item_list">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 pe-0">
                
                <div class="bg-white p-2">
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom mb-2">
                        <div>
                            <h6 class="mb-0">{{ __('pos.order-no') }} : <span id="order_no">{{ $data?->code }}</span> </h6>
                            <h6 class="mb-0">{{ __('pos.customer') }} : <span id="customer_code">{{ $data?->customer?->name }}</span></h6>
                            <input type="hidden" id="customer_id" class="form-control" value="{{$data?->customer_id}}">
                        </div>
                    </div>
                    {{-- data-simplebar  --}}
                                        
                    <div id="cart_products" class="table-responsive" style="max-height: 410px;">
                        @if ($data && $data_line && count($data_line))
                            @foreach ($data_line as $dat)
                                <div id="{{ $dat->company_item?->id }}" class="p-2 bg-grey bod mb-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6>{{ Str::of($dat?->item?->name)->limit(20) }} </h6> 
                                        <input type="hidden" value="{{ $dat->company_item?->id }}" name="ordered_item_id[]">
                                        <div class="d-flex justify-content-between align-items-center gap-2">
                                            <div class="quantity">
                                                <button class="minus" aria-label="Decrease" onclick="$.decrease({{ $dat->company_item?->id }})"> - </button>
                                                <input name="quantity[]" type="number" id="qty_{{ $dat->company_item?->id }}" onblur="$.maxvalue_value({{ $dat?->company_item?->remaining_quantity }},{{ $dat->company_item?->id }})" onkeypress="return $.numeric_period();" class="input-box" value="{{$dat?->quantity}}">
                                                <button class="plus" aria-label="Increase" onclick="$.increase({{ $dat?->company_item?->remaining_quantity }},{{ $dat->company_item?->id }})">+</button>
                                            </div>
                                            <i class="mdi mdi-trash-can-outline text-danger" onclick="$.delete_one_html_order({{ $dat->company_item?->id }})"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Amt. <span id="selling_price_html{{ $dat->company_item?->id }}"></span> </p>
                                        <div class="d-flex justify-content-between align-items-center gap-3">
                                            <p class="mb-0">Tax <span id="tax_per_html{{ $dat->company_item?->id }}"> </p>
                                            <p class="mb-0">Dis. <span id="discount_per{{ $dat->company_item?->id }}"> </p>

                                            <input type="hidden" value="{{$dat?->company_item?->selling_price}}" id="sell_price_id{{ $dat->company_item?->id }}" name="selling_price[]">
                                            <input type="hidden" value="{{$dat?->company_item?->discount_per}}" name="discount_per[]">
                                            <input type="hidden" value="{{$dat?->company_item?->tax_per}}" name="tax_per[]">
                                            <input type="hidden" value="{{$dat?->company_item?->selling_price_tax_type}}" name="selling_price_tax_type[]">

                                            <input type="hidden" value="" name="tax_val[]">
                                            <input type="hidden" value="" name="discount_val[]">
                                            <input type="hidden" value="" name="net_val[]">
                                            <input type="hidden" value="" name="sub_total_val[]">

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
                <div class="p-2 mt-5">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">{{ __('common.sub-total') }}</h6>
                        <h6 class="mb-0" id="all_sub_total">{{ $data?->sub_total }}</h6>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">{{ __('common.Tax') }}</h6>
                        <h6 class="mb-0" id="all_tax">{{ $data?->tax }}</h6>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">{{ __('common.Discount') }}</h6>
                        <h6 class="mb-0" id="all_discount">{{ $data?->discount }}</h6>
                    </div>



                    <div class="d-grid mb-2">
                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">{{ __('pos.grand-total') }} :
                            <span id="all_grand_total"></span></button>
                        <input type="hidden" id="order_id" @if ($data) value="{{ base64_encode(convert_uuencode($data?->id)) }}" @endif>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-info" onclick="$.save_order('Hold')"><i class="mdi mdi-pause"></i> {{ __('pos.hold') }}</button>
                        <button class="btn btn-danger" onclick="$.save_order('Void')"><i class="mdi mdi-trash-can-outline"></i> {{ __('pos.void') }}</button>
                        <button class="btn btn-success" onclick="$.save_order('Ongoing')"><i class="mdi mdi-credit-card-outline"></i> {{ __('pos.payment') }}</button>
                    </div>
                </div>


            </div>
        </div>
        @include('pos.pos_order_modal')
        <div id="status-message" data-status="{{ session('success') }}" style="display: none;"></div>
        <div id="error-message" data-error="{{ session('error') }}" style="display: none;"></div>
    @endsection
    <script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
    @section('scripts')
        @include('keystroke')
        @include('layouts.select2js')
        @include('layouts.formvalidationjs')
        @include('pos.pos_order_js')
    @endsection
