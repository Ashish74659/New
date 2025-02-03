<div class="modal fade open-customer" tabindex="-1"> 
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-h eader position-relative">
                <button type="button" class="cross-btn" data-bs-dismiss="modal" aria-label="Close"><i class="mdi mdi-close-circle-outline"></i></button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">{{ __('customer.phone-no') }} </label>
                        <select id="customer_phone_no" class="form-control select2 cust_sel" >                            
                            <option value="">{{ __('common.chooseoption') }} </option>
                            @foreach($customer as $cust)
                                <option value="{{$cust?->id}}">{{$cust?->phone_no}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">{{ __('customer.customer-code') }}</label>
                        <select id="customer_code_c" class="form-control select2 cust_sel" >                            
                            <option value="">{{ __('common.chooseoption') }} </option>
                            @foreach($customer as $cust)
                                <option value="{{$cust?->id}}">{{$cust?->code}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">{{ __('common.names') }}</label>
                        <select id="customer_name" class="form-control select2 cust_sel" >                            
                            <option value="">{{ __('common.chooseoption') }} </option>
                            @foreach($customer as $cust)
                                <option value="{{$cust?->id}}">{{$cust?->name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">{{ __('common.email') }}</label>
                        <select id="customer_email" class="form-control select2 cust_sel" >                            
                            <option value="">{{ __('common.chooseoption') }} </option>
                            @foreach($customer as $cust)
                                <option value="{{$cust?->id}}">{{$cust?->email}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-md-4 mb-2" onclick="$.select_cust()"> <button type="button" class="btn btn-warning w-100">{{ __('pos.select') }}</button> </div>
                    <div class="col-md-4 mb-2"> <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger w-100">{{ __('common.cancel') }}</button> </div>
                    <div class="col-md-4 mb-2"><button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target=".add-cus-modal">{{ __('pos.add-customer') }}</button> </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade add-cus-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">          
            <form id="customer_store">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('customer.customer-general-details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.first-name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="name" maxlength="30" required>
                                <input type="hidden" name="submit_type" value="ajax" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.last-name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="last_name" maxlength="30" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="">{{ __('customer.phone-no') }} <span class="text-danger">*</span></label>
                                <input type='text' class="form-control" onKeyPress="return $.numeric();" name="phone_no" required />
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('common.email') }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" onKeyPress="return $.alpha_num_space_period();" maxlength="100" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="">{{ __('customer.dob') }} <span class="text-danger">*</span></label>
                                <input type='Date' name="dob" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.city') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="city" maxlength="30" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.region') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="region" maxlength="30" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.post-box') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="post_box" maxlength="30" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('common.Country') }} <span class="text-danger">*</span></label>
                                <select name="country_id" class="form-control select2 new_select" required>
                                    <option value="">{{ __('common.chooseoption') }} </option>
                                    @foreach($country as $ctry)
                                        <option value="{{$ctry?->id}}" @if($data?->country_id == $ctry?->id) selected @endif>{{$ctry?->name}} / {{$ctry?->code_2}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for="">{{ __('customer.customer-type') }} <span class="text-danger">*</span></label>
                                <select name="customer_type" class="form-control select2 new_select" required >
                                    <option value="">{{ __('common.chooseoption') }} </option>
                                    <option value="Individual"> Individual </option>
                                    <option value="Business" > Business </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-4">
                            <div class="form-group form-float  mb-3">
                                <label for=""> {{ __('common.status') }} </label>
                                <select name="status" class="form-control select2 new_select" required>                                   
                                    <option value="Active"> Active</option> 
                                </select>
                            </div>
                        </div> 
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                            <label for=""> {{ __('common.address') }} </label>
                            <textarea name="address" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-12 text-end">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('common.save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div> 
</div>

<div class="modal fade reg-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('pos.register-details')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.opening-balance')}}</h6>
                            <h6 class="text-muted" id="initial_cash"></h6>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.cash-payment')}}</h6>
                            <h6 class="text-muted" id="cash_payment"></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.card-payment')}}</h6>
                            <h6 class="text-muted" id="card_payment"></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.loyalty-point-payments')}}</h6>                                    
                            <h6 class="text-muted" id="loyality_point_payment"></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.upi-payments')}}</h6> 
                            <h6 class="text-muted" id="upi_payment"></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <h6>{{__('pos.sales-return-payment')}}</h6>                                    
                            <h6 class="text-danger" id="sales_tax_return_payment"></h6>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">                                    
                            <h6>{{__('pos.total-amount')}}</h6> 
                            <h6 class="text-muted" id="total_amount"></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2">                                    
                            <h6>{{__('pos.total-sales-return')}}</h6> 
                            <h6 class="text-danger" id="total_sales_return"></h6>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div> 
</div>

<div class="modal fade close-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('pos.closing-control')}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('close-registration') }}" class="custom-validation" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between">
                                <h6>{{__('pos.closing-cash')}} </h6>
                                <h6 class="text-muted" id="closing_cash"></h6>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex justify-content-between">
                                <h6>{{__('pos.order-cash')}} </h6>
                                <h6 class="text-muted" id="ordered_cash"></h6>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">{{__('pos.cash-count')}} </label>
                            <div class="d-flex">
                                <input type="text" class="form-control" required onKeyPress="return $.numeric_period();" name="final_cash">
                                <button class="btn btn-light ms-1"><i class="mdi mdi-cash font-size-24"></i></button>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">{{__('pos.closing-note')}} </label>
                            <textarea class="form-control" rows="3" onKeyPress="return $.alpha_num_space_period();" name="final_note"></textarea>
                        </div>

                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="mdi mdi-content-save-alert-outline"></i> {{__('pos.close-register')}} </button>
                        </div>                                                  
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade order-history" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h5 class="modal-title">{{__('pos.view-orders')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3"> 
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card card-bod pt-3">
                                        <div class="card-body">
                                            <div class="table-responsive" data-simplebar style="max-height: 358px;">
                                            <table class="table table-hover dt-responsive align-middle mb-0 nowrap">
                                                <thead class="bg-prime">
                                                    <tr>
                                                        <th>{{__('pos.order-id')}}</th>                                                        
                                                        <th>{{__('pos.customer')}}</th>
                                                        <th>{{__('common.amount')}}</th>
                                                        <th>{{__('common.date')}}</th>
                                                        <th>{{__('common.status')}}</th>
                                                        <th>{{__('common.action')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="history_order_table"> </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade runord-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex">
                <h5 class="modal-title">{{__('pos.running-order')}}</h5>


            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <ul class="nav nav-pills nav-runord tender-nav mb-2 justify-content-end" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-th-large"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-order" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-list"></i></button>
                            </li>
                            
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card card-bod pt-3">
                                            <div class="card-body">
                                                <div class="table-responsive" data-simplebar style="max-height: 358px;">
                                                <table class="table table-hover  dt-responsive align-middle mb-0 nowrap">
                                                    <thead class="bg-prime">
                                                        <tr>
                                                            <th>{{__('pos.order-id')}}</th>
                                                            <th>{{__('pos.user')}}</th>
                                                            <th>{{__('pos.customer')}}</th>
                                                            <th>{{__('common.amount')}}</th>
                                                            <th>{{__('common.date')}}</th>
                                                            <th>{{__('common.status')}}</th>
                                                            <th>{{__('common.action')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="running_order_table"> </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="table-responsive" data-simplebar style="max-height: 490px;">
                                    <div class="row" id="running_order_second_div">  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

