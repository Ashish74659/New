 
@extends('layouts.layout-horizontal')
@section('title')
    {{ __('pos.payment') }}
@endsection
@section('css')
    <style>
        .calculator button {
            height: 41px !important;
        }
    </style>
@endsection
@section('body') 

    <body data-topbar="colored" class="bg-white" data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row">            
            <form action="{{ route('complete-payment') }}" class="custom-validation" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" class="form-control" id="use_loyality" name="use_loyality" readonly>            
                <div class="col-md-6">
                     <h5 class="mb-3">{{ __('pos.payment-settlement') }}</h5>
                <div class="card bg-light rounded-0 mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <span>{{ __('customer.customer-name') }} : {{$order?->customer?->name}}</span>
                            </div>

                            <div class="col-md-3">
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target=".redeem"><i class="mdi mdi-card-account-details-star-outline"></i> {{ __('pos.loyality-redeem') }} </button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card bg-light rounded-0 mb-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-1">
                                    <input type="hidden" name="order_id" value="{{ base64_encode(convert_uuencode($order?->id)) }}">
                                    <label class="mb-0">{{ __('pos.order-total') }} </label>
                                    <input type="text" class="form-control" id="rem_balance_val" name="net_total" readonly>
                                </div>

                                <div class="col-md-4 mb-1">
                                    <label class="mb-0"> {{ __('pos.total-cash') }} </label>
                                    <input type="text" class="form-control" id="display" readonly>
                                </div>

                                <div class="col-md-4 mb-1">
                                    <label class="mb-0"> {{ __('pos.return-total') }}</label>
                                    <input type="text" class="form-control" id="rem_result_balance" readonly>
                                </div>

                                <div class="col-md-9">
                                    <div class="calculator my-3">
                                        <div class="text-center">
                                            <button type="button" onclick="appendToDisplay('1')">1</button>
                                            <button type="button" onclick="appendToDisplay('2')">2</button>
                                            <button type="button" onclick="appendToDisplay('3')">3</button>
                                            
                                        </div>
                                        <div class="text-center">
                                            <button type="button" onclick="appendToDisplay('4')">4</button>
                                            <button type="button" onclick="appendToDisplay('5')">5</button>
                                            <button type="button" onclick="appendToDisplay('6')">6</button> 
                                        </div>
                                        <div class="text-center">
                                            <button type="button" onclick="appendToDisplay('7')">7</button>
                                            <button type="button" onclick="appendToDisplay('8')">8</button>
                                            <button type="button" onclick="appendToDisplay('9')">9</button> 
                                        </div>
                                        <div class="text-center">
                                            <button type="button" data-bs-dismiss="modal"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
                                            <button type="button" onclick="appendToDisplay('0')">0</button>
                                            <button type="button" onclick="clearDisplay()">C</button>                                            
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-3"> 
                                    <div class="my-3">                                        
                                        @foreach($tile as $tls)
                                            <button type="button" onclick="appToDisplay({{$tls}})" class="btn bg-warning w-100 mb-2">{{$tls}}</button>                                           
                                        @endforeach 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mb-2"> <button type="submit" class="btn btn-warning w-100"> {{ __('pos.cash') }}</button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-warning w-100"> {{ __('pos.card') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-warning w-100"> {{ __('pos.loyalty') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-warning w-100"> {{ __('pos.coupon') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-success w-100">{{ __('common.Discount') }}  </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-warning w-100"> {{ __('pos.void') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-warning w-100"> {{ __('pos.split-bill') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-info w-100"> {{ __('pos.hold') }} </button> </div>
                                <div class="col-md-2 mb-2"> <button type="button" class="btn btn-danger w-100">{{ __('common.cancel') }} </button> </div>
                                <div class="col-md-2 mb-2"> <a href="{{ route('emp-pos-order',['order_id'=>base64_encode(convert_uuencode($order->id))]) }}"> <button type="button" class="btn btn-warning w-100"> {{ __('common.back') }} </button></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-3">{{ __('pos.order-settlement') }}</h5>
                        <p class="mb-0">{{ __('pos.order-no') }}: {{$order?->code}}</p>
                    </div>
                    <div class="table-responsive" data-simplebar style="max-height: 300px;">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead>  
                                <tr>
                                    <th>{{ __('pos.product') }} </th>
                                    <th>{{ __('common.qty') }}</th>
                                    <th>{{ __('common.price') }}</th>
                                    <th>{{ __('common.Discount') }}</th>
                                    <th>{{ __('pos.sales-tax') }}</th> 
                                    <th>{{ __('pos.tax-type') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_line as $dat)
                                    <tr class="bg-light border-bottom border-white">
                                        <td> <p class="mb-0">{{ Str::of($dat?->item?->name)->limit(20) }} </p> </td>
                                        <td>{{$dat?->quantity}}</td>
                                        <td> {{$dat?->price}} </td>
                                        <td>{{$dat?->discount}} </td>
                                        <td>{{$dat?->tax}} </td>
                                        <td> @if($dat?->tax_type == "Exclusive")
                                                <span class='badge badge-soft-warning'>Exclusive</span>
                                            @elseif($dat?->tax_type == "Inclusive")                                                
                                                <span class='badge badge-soft-info'>Inclusive</span>                                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                 
                            </tbody>
                        </table>
                    </div>

                    <div class="row bg-light rounded-3 p-4 pb-1 mb-2">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <p>{{ __('common.sub-total') }}</p>
                                <p>{{$currency}} {{$order?->sub_total}}</p>
                            </div>                            
                            <div class="d-flex justify-content-between">
                                <p class="text-danger">{{ __('common.Discount') }} {{ __('common.amount') }}</p>
                                <p class="text-danger">{{$currency}} {{$order?->discount}}</p>
                            </div>
                        </div>

                        <div class="col-md-6">                            
                            <div class="d-flex justify-content-between">
                                <p>{{ __('common.Tax') }} {{ __('common.amount') }} </p>
                                <p>{{$currency}} {{$order?->tax}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>{{ __('pos.net-total') }}</p>
                                <p>{{$currency}} {{$order?->net_total}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-2">{{ __('pos.cash') }}: <span id="p_cash">0</span></div>
                                <div class="col-md-3 mb-2">{{ __('pos.coupan') }}: <span id="p_coupan">0</span></div>
                                <div class="col-md-3 mb-2">{{ __('pos.card-debit') }}: <span id="p_debit">0</span></div>
                                <div class="col-md-3 mb-2">{{ __('pos.card-credit') }}: <span id="p_credit">0</span></div>
                                <div class="col-md-3 mb-2">{{ __('pos.loyalty') }}: <span id="p_loyalty">0</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>            
        </div>
        @include('pos.payment_modal')
        
        <div id="status-message" data-status="{{ session('success') }}" style="display: none;"></div>
        <div id="error-message" data-error="{{ session('error') }}" style="display: none;"></div>
    @endsection
    @section('scripts') 
    @include('pos.payment_js')
    @include('layouts.formvalidationjs')
    @include('keystroke') 

    @endsection
