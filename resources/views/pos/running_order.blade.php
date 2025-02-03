@extends('layouts.master')

@section('title')    
    {{__('pos.running-order')}} 
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
    
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{__('pos.running-order')}} </h5>
                        <ul class="nav nav-pills nav-runord tender-nav mb-0 justify-content-end" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-th-large"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-order" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-list"></i></button>
                            </li>                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card card-bod pt-3">
                                    <div class="card-body ">
                                        <table class="table table-hover  dt-responsive align-middle mb-0 nowrap">

                                            <thead class="bg-prime">
                                                <tr>
                                                    <th>{{__('pos.order-id')}} </th>
                                                    <th>{{__('pos.user')}} </th> 
                                                    <th>{{__('pos.customer')}} </th> 
                                                    <th>{{__('pos.amount')}} </th> 
                                                    <th>{{__('common.date')}} </th> 
                                                    <th>{{__('common.status')}} </th>
                                                    <th>{{__('common.action')}} </th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                @foreach ($data as $dat)
                                                    <tr data-bs-toggle="modal" data-bs-target=".open-modal" onclick="$.get_order_details('{{base64_encode(convert_uuencode($dat->id))}}')">
                                                        <td> <a href="{{ route('emp-pos-order',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}">{{ $dat->code }}</a> </td>
                                                        <td> <img src="{{document_path($dat?->creator?->profile_img)}}" class="avatar-xs rounded-circle me-2"> <a href="#" class="text-body">{{$dat?->creator?->name}}</a> </td>
                                                        <td>{{$dat->customer?->name}}</td>
                                                        <td>{{no_format($dat->net_total)}}</td>
                                                        <td> @php echo App\Helpers\MasterHelper::date_time_formate($dat->created_at); @endphp  </td> 
                                                        <td> @php echo App\Helpers\MasterHelper::status_check($dat->status); @endphp </td>                 										
                                                        <td>
                                                            {{-- <a href="{{ route('order-invoice-view',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}"><button class="btn btn-sm  btn-outline-primary" title="print"><i class="mdi mdi-printer font-size-15"></i> </button></a> --}}
                                                            <a href="{{ route('emp-pos-order',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}"><button class="btn btn-sm btn-outline-primary" title="Add Item"><i class="mdi mdi-basket-plus-outline font-size-15"></i> </button></a>
                                                            <a href="{{route('pos-payment-page',['order_id'=>base64_encode(convert_uuencode($dat?->id))])}}"> <button class="btn btn-sm  btn-outline-primary" title="Payment"><i class="mdi mdi-cash-plus font-size-15"></i> </button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="row">
 
                            @foreach ($data as $dat)
                                <div class="col-md-3 mb-3">
                                    <div class="list-card cursor" data-bs-toggle="modal" data-bs-target=".open-modal" onclick="$.get_order_details('{{base64_encode(convert_uuencode($dat->id))}}')">
                                        <div class="d-flex">
                                            <img src="{{document_path($dat?->creator?->profile_img)}}" class="avatar-xs rounded-circle me-2"> <p class="mb-0">{{$dat?->creator?->name}}</p>
                                        </div>
                                        <a href="{{ route('emp-pos-order',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}">
                                        <button class="btn-details tender-fees log-btn rounded-2" type="button">
                                            <span><img src="assets/images/list-icon/price-tag-icon.svg" alt="" height="18"></span>
                                            <span class="font-size-13">{{ $dat->code }}</span>
                                        </button></a>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="font-size-13"><b>{{__('pos.store')}}  :</b> {{$dat?->company?->name}} </span>
                                                </div>
                                                <div>
                                                    <span class="font-size-13"><b>{{__('pos.customer')}}  :</b> {{$dat->customer?->name}} </span>
                                                </div>
                                                <div>
                                                    <span class="font-size-13"><b>{{__('pos.amount')}} :</b> {{no_format($dat->net_total)}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="font-size-13"><b>{{__('common.date')}} :</b> @php echo App\Helpers\MasterHelper::date_time_formate($dat->created_at); @endphp </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div>
                                                    <p class="font-size-13"><b>{{__('common.status')}} :</b>
                                                        <span class="text-success mb-0">@php echo App\Helpers\MasterHelper::status_check($dat->status); @endphp</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <a href="{{ route('order-invoice-view',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}"><button class="btn btn-sm btn-primary ps-3 pe-3 me-1 ms-1"> {{__('common.print')}}</button></a> --}}
                                                <a href="{{ route('emp-pos-order',['order_id'=>base64_encode(convert_uuencode($dat->id))]) }}"><button class="btn btn-sm btn-primary ps-3 pe-3 me-1">{{__('pos.add-item')}}</button></a>
                                                <a href="{{route('pos-payment-page',['order_id'=>base64_encode(convert_uuencode($dat?->id))])}}"><button class="btn btn-sm btn-primary ps-3 pe-3"> {{__('pos.payment')}}</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        @endforeach
 
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade open-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover dt-responsive align-middle mb-0 nowrap">

                                    <thead class="bg-prime">
                                        <tr>
                                            <th>{{__('item.item-name')}}</th>
                                            <th>{{__('pos.quantity')}}</th>                                            
                                            <th>{{__('pos.unit-price')}}</th>
                                            <th>{{__('common.Discount')}}</th>
                                            <th>{{__('common.Tax')}}</th>
                                            <th>{{__('pos.net-amount')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order_line_tabel"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    @endsection
    @section('scripts')
    @include('pos.running_order_js')
    @endsection
