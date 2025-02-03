@extends('layouts.master')
@section('title')
    {{ __('company.company-add') }}
@endsection
@section('page-title')
@endsection
@section('css')
    @include('layouts.select2css')   
@endsection
@section('body')

    <body data-sidebar="colored" class="bg-white">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('company.company-add', 'company-list'); @endphp

        <input type="hidden" id="company_id" @if($data) value="{{base64_encode(convert_uuencode($data?->id))}}" @endif>

        <div class="settings-pg-header"></div>


        <div class="row">
            <div class="col-md-3">
                <div class="card-bod rounded-2 p-2">
                    <div id="accordion" class="custom-accordion">
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseOne" class="text-dark" data-bs-toggle="collapse" aria-expanded="true"
                                aria-controls="collapseOne">
                                <div class="card-header border-0" id="headingOne">
                                    <h6 class="m-0">
                                        {{ __('company.settings') }}
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>                                
                            </a> 

                            
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills comp-tab" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                            aria-selected="true"> {{ __('company.gen-settings') }} </a>
                                        <a class="nav-link mb-2" @if($data) id="v-pills-profile-tab" data-bs-toggle="pill"
                                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                            aria-selected="false" @endif>{{ __('company.contact-info') }}</a>
                                        <a class="nav-link mb-2" @if($data) id="v-pills-messages-tab" data-bs-toggle="pill"
                                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false" @endif>{{ __('company.localization') }}</a>
                                        <a class="nav-link" @if($data) id="v-pills-settings-tab" data-bs-toggle="pill"
                                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false" @endif>{{ __('company.Premgt') }} </a>

                                        <a class="nav-link" @if($data) id="v-pills-tile-tab" data-bs-toggle="pill"
                                            href="#v-pills-tile" role="tab" aria-controls="v-pills-tile"
                                            aria-selected="false" @endif>{{ __('company.tender-tile') }} </a>
 
                                        <a class="nav-link" @if($data) id="v-pills-logo-tab" data-bs-toggle="pill" href="#v-pills-logo"
                                            role="tab" aria-controls="v-pills-logo"
                                            aria-selected="false" @endif>{{ __('company.comapay-logoinfo') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-9">
                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="setting-title"> <h4>{{ __('company.gen-info') }} </h4> </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('company.company-code') }} </label>
                                    <input type="text"  class="form-control" onKeyPress="return $.alpha_num_space_period();" id="code" value="{{$data?->code}}" @if($data) readonly @endif required>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('company.company-name') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->name}}" id="name" maxlength="30" @if($data) readonly @endif required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> <input type="checkbox" id="enable_parent" class="form-check-input" @if($data?->enable_parent == "Yes") checked @endif onclick="$.enable_parent()"> {{ __('company.enable-Parent-Comp') }} </label>                                        
                                    <span id="parent_company">
                                        <select class="form-control select2" id="parent_id">
                                            <option value="">{{ __('common.chooseoption') }} </option>
                                            @foreach($company as $cmpy)
                                                <option value="{{$cmpy?->id}}" @if($cmpy?->id == $data?->parent_id) selected @endif>{{$cmpy?->name}}</option>
                                            @endforeach                                        
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="setting-title">
                                <h6>{{ __('company.company-mode') }}</h6>
                            </div>
                             
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('common.type') }}</label>
                                    <select class="form-control select2" id="pos_type_id" onchange="$.pos_type()">
                                        <option value="">{{ __('common.chooseoption') }} </option>
                                        @foreach($pos_type as $pos) 
                                            <option value="{{$pos?->id}}" @if($pos?->id == $data?->pos_type_id) selected @endif>{{$pos?->name}}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3" id="enable_restorent">
                                <div class="mb-3">
                                    <label class="form-label"> </label>
                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="enable_table_booking" @if($data?->enable_table_booking == "Yes") checked @endif>
                                        <label class="form-check-label">{{ __('company.table-booking') }} </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="enable_receipt_printing" @if($data?->enable_receipt_printing == "Yes") checked @endif>
                                        <label class="form-check-label">{{ __('company.Initial-Receipt') }} </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.Floor-Seating') }}</label>
                                    <select class="form-control select2">
                                        <option value="">{{ __('common.chooseoption') }} </option>
                                        <option value="1">Restaurant </option>
                                        <option value="2">Saloon </option>
                                        <option value="3">SPA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label"> &nbsp;</label>
                                    <button class="btn btn-sm btn-primary"> {{ __('common.create') }} </button>
                                </div>
                            </div>
                            <div class="text-end mb-3"><button class="btn btn-sm btn-primary" onclick="$.company_setting()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button> </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="setting-title">
                            <h4>{{ __('company.contact-info') }} </h4>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.company-address') }}</label>
                                    <textarea class="form-control" rows="2" onKeyPress="return $.alpha_num_space_period();" id="address" maxlength="200">{{$data?->address}}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('company.city') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="city" maxlength="50" value="{{$data?->city}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('common.Country') }}</label>
                                    <select class="form-control select2" id="country_id" style="width:100%">
                                        <option value="">{{ __('common.chooseoption') }} </option>
                                        @foreach($country as $cntry)
                                            <option value="{{$cntry?->id}}" @if($cntry?->id == $data?->country_id) selected @endif>{{$cntry?->name}}</option>
                                        @endforeach                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.region') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="region" maxlength="50" value="{{$data?->region}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.phone') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.numeric_period();" id="phone_no" maxlength="15" value="{{$data?->phone_no}}">                                    
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.Post') }} </label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="post_box" maxlength="15" value="{{$data?->post_box}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('common.email') }} </label>
                                    <input type="email" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="email" maxlength="110" value="{{$data?->email}}">
                                </div>
                            </div>

                            
                            <div class="text-end mb-3">
                                <button class="btn btn-sm btn-primary" onclick="$.contact_information()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <div class="setting-title">
                            <h4>{{ __('company.localization') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('company.Date') }}</label>
                                    <select class="form-control select2" id="date_formate_id" style="width:100%"> 
                                        <option value="">{{ __('common.chooseoption') }} </option> 
                                        @foreach($date_formate as $date_for)
                                            <option value="{{$date_for?->id}}" @if($date_for?->id == $data?->date_formate_id) selected @endif>{{$date_for?->description}}</option>
                                        @endforeach   
                                    </select>                                  
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('company.time') }}</label>
                                    <select class="form-control select2" id="time_formate" style="width:100%">
                                        <option value="">{{ __('common.chooseoption') }} </option>
                                        <option value="12" @if($data?->time_formate == "12") selected @endif>12 Hours </option>
                                        <option value="24" @if($data?->time_formate == "24") selected @endif>24 Hours </option>
                                    </select>   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('company.timezone') }}</label> 
                                    <select class="form-control select2" id="time_zone_id" style="width:100%">
                                        <option>{{ __('common.select') }}</option> 
                                        @foreach($time_zone as $time_for)
                                            <option value="{{$time_for?->id}}" @if($time_for?->id == $data?->time_zone_id) selected @endif>{{$time_for?->description}} => {{$time_for?->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="setting-title">
                                <h6>{{ __('common.Currency') }}</h6>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('common.Currency') }}</label>
                                    <select class="form-control select2" id="currency_id" style="width:100%">
                                        <option>{{ __('common.select') }}</option> 
                                        @foreach($currency as $curr)
                                            <option value="{{$curr?->id}}" @if($curr?->id == $data?->currency_id) selected @endif> {{$curr?->code}} / {{$curr?->symbol}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-end mb-3">
                                <button class="btn btn-sm btn-primary" onclick="$.business_localization()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                            </div>
 
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="setting-title">
                            <h4>{{ __('company.Premgt') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.order') }} </label>
                                        <i onclick="$.get_prefix('order_prefix')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>
                                    <input type="text" class="form-control" id="order_prefix" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->order_prefix}}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.sales-return') }} </label>
                                        <i onclick="$.get_prefix('sales_return_prefix')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div> 
                                    <input type="text" class="form-control" id="sales_return_prefix" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->sales_return_prefix}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">                                    
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.receipt') }} </label>
                                        <i onclick="$.get_prefix('receipt_prefix')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="receipt_prefix" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->receipt_prefix}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> {{ __('company.customer') }} </label>
                                        <i onclick="$.get_prefix('customer_prefix')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="customer_prefix" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->customer_prefix}}">
                                </div>
                            </div>                            

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.invoice') }} </label>
                                        <i onclick="$.get_prefix('invoice_prefix')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="invoice_prefix" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->invoice_prefix}}">
                                </div>
                            </div>
                            <div class="text-end mb-3">
                                <button class="btn btn-sm btn-primary" onclick="$.all_prefix_store()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                            </div>
 
 
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-tile" role="tabpanel" aria-labelledby="v-pills-tile-tab">
                        <div class="setting-title">
                            <h4>{{ __('company.tender-tile') }}</h4>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="mb-3">                                    
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.tile') }} 1</label>
                                        <i onclick="$.get_tile('tile_1')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="tile_1" onKeyPress="return $.numeric();" value="{{$data?->tender_tile_1}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> {{ __('company.tile') }} 2 </label>
                                        <i onclick="$.get_tile('tile_2')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="tile_2" onKeyPress="return $.numeric();" value="{{$data?->tender_tile_2}}">
                                </div>
                            </div>                            

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.tile') }} 3 </label>
                                        <i onclick="$.get_tile('tile_3')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>

                                    <input type="text" class="form-control" id="tile_3" onKeyPress="return $.numeric();" value="{{$data?->tender_tile_3}}">
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">{{ __('company.tile') }} 4</label>
                                        <i onclick="$.get_tile('tile_4')" class="mdi mdi-circle-edit-outline cursor"></i>
                                    </div>
                                    <input type="text" class="form-control" id="tile_4" onKeyPress="return $.numeric();" value="{{$data?->tender_tile_4}}">
                                </div>
                            </div>
                            

                            <div class="text-end mb-3">
                                <button class="btn btn-sm btn-primary" onclick="$.all_tile_store()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                            </div>
 
 
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                        <div class="setting-title">
                            <h4>{{ __('company.logo-info') }} </h4>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>{{ __('company.favicon') }}</h6>
                                <p class="font-size-13">{{ __('company.Upload-favicon') }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="file" class="form-control" aria-label="file example" id="company_logo" onChange="validateFile(this,'image',1);" accept="image/*">
                                </div>
                                <p class="font-size-13">{{ __('company.Upload-size') }} </p>
                            </div>
                            <div class="col-md-2" id="company_logo_html"></div>
                        </div>
                         
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>{{ __('company.logo-bill') }}</h6>
                                <p class="font-size-13">{{ __('company.Upload-logo') }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="file" class="form-control" aria-label="file example" id="bill_logo" onChange="validateFile(this,'image',1);" accept="image/*">
                                </div>
                                <p class="font-size-13">{{ __('company.Upload-size') }} </p>
                            </div>
                            <div class="col-md-2" id="bill_logo_html"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>{{ __('company.logo-Upload-report') }} </h6>
                                <p class="font-size-13">{{ __('company.Upload-report') }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="file" class="form-control" aria-label="file example" id="report_logo" onChange="validateFile(this,'image',1);" accept="image/*">
                                </div>
                                <p class="font-size-13">{{ __('company.Upload-size') }} </p>
                            </div>                            
                            <div class="col-md-2" id="report_logo_html"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>{{ __('company.bill-head-info') }} </h6>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="bill_header" value="{{$data?->bill_header}}" maxlength="200" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>{{ __('company.bill-foot-info') }}</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="bill_footer" value="{{$data?->bill_footer}}" maxlength="200" required="">
                                </div>
                            </div>
                        </div> 
                        <div class="text-end mb-3">
                            <button class="btn btn-sm btn-primary" onclick="$.logo_information()"> <i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bs-example-modal-center" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('company.Premgt') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('company.currpre') }}</label>
                                <input type="text" id="old_prefix" class="form-control" readonly>
                                <input type="hidden" id="col_name" class="form-control" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('company.newpre') }}</label>
                                <input type="text" id="prefix" class="form-control" onKeyPress="return $.alpha_num_space_period();">
                            </div>
 
                            <div class="col-md-12 mb-3 text-end">
                                <button class="btn btn-sm btn-primary" onclick="$.store_prefix()"><i class="mdi mdi-content-save-alert-outline"></i>
                                    {{ __('common.save') }}</button> 
                            </div>

                            <hr>
                            <h6>{{ __('company.history') }}</h6>
                            <hr>

                            <div class="table-responsive" data-simplebar style="max-height: 200px;">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('company.prefix') }}</th>
                                            <th>{{ __('common.modify-date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="prefix_table_html"> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bs-example-modal-tile" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('company.tender-tile') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('company.curr-tile') }}</label>
                                <input type="text" id="old_tile" class="form-control" readonly>
                                <input type="hidden" id="col_name_tile" class="form-control" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('company.new-tile') }}</label>
                                <input type="text" id="tile" class="form-control" onKeyPress="return $.numeric();">
                            </div>
 
                            <div class="col-md-12 mb-3 text-end">
                                <button class="btn btn-sm btn-primary" onclick="$.store_tile()"><i class="mdi mdi-content-save-alert-outline"></i>
                                    {{ __('common.save') }}</button> 
                            </div>

                            <hr>
                            <h6>{{ __('company.tile-history') }}</h6>
                            <hr>

                            <div class="table-responsive" data-simplebar style="max-height: 200px;">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('company.tile') }}</th>
                                            <th>{{ __('common.modify-date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tile_table_html"> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    
    @section('scripts')    
    @include('keystroke')
    @include('admin.company.company.extrajs')
    @include('layouts.select2js')  
    @include('layouts.formvalidationjs') 
        <script src="{{ URL::asset('build/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
    @endsection
