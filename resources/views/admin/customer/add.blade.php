@extends('layouts.master')
@section('title')
    {{ __('customer.create-customer') }}
@endsection
@section('page-title')
@endsection
@section('css')
    @include('layouts.select2css')
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('customer.create-customer', 'customer-list'); @endphp
        <div class="settings-pg-header"></div>
        <form action="{{ route('customer-store') }}" class="custom-validation" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-bod">
                        <div class="card-body">
                            <div class="setting-title">
                                <h4> {{ __('customer.customer-general-details') }}</h4>
                            </div>
                            <div class="row">

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float mb-3">
                                        <label for="" class="mb-1">{{ __('customer.customer-code') }}</label>
                                        <input type="hidden" name="customer_id" @if ($data) value="{{ base64_encode(convert_uuencode($data?->id)) }}" @endif>
                                        <input type="text" class="form-control" placeholder="Code Will generate automatically" @if ($data) value="{{ $data?->code }}" @endif readonly>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('customer.first-name') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->name }}" name="name" maxlength="30" @if ($data) readonly @endif required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('customer.last-name') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->name }}" name="last_name" maxlength="30" @if ($data) readonly @endif required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="">{{ __('customer.phone-no') }} <span class="text-danger">*</span></label>
                                        <input type='text' class="form-control" onKeyPress="return $.numeric();" name="phone_no" value="{{ $data?->phone_no }}" required />
                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('common.email') }} <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" value="{{ $data?->email }}" name="email" onKeyPress="return $.alpha_num_space_period();" maxlength="100" @if ($data) readonly @endif required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="">{{ __('customer.dob') }} <span class="text-danger">*</span></label>
                                        <input type='Date' name="dob" class="form-control" value="{{ $data?->dob }}" required/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('customer.city') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->city }}" name="city" maxlength="30" required>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('customer.region') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->region }}" name="region" maxlength="30" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('customer.post-box') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->post_box }}" name="post_box" maxlength="30" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for="" class="mb-1">{{ __('common.Country') }} <span class="text-danger">*</span></label>
                                        <select name="country_id" class="form-control select2" required>
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
                                        <select name="customer_type" class="form-control select2" required >
                                            <option value="">{{ __('common.chooseoption') }} </option>
                                            <option value="Individual" @if ($data?->customer_type == 'Individual') selected @endif> Individual </option>
                                            <option value="Business" @if ($data?->customer_type == 'Business') selected @endif> Business </option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-xl-4 col-lg-6 col-md-4">
                                    <div class="form-group form-float  mb-3">
                                        <label for=""> {{ __('common.status') }} </label>
                                        <select name="status" class="form-control select2" required>
                                            <option value="">{{ __('common.chooseoption') }} </option>
                                            <option value="Active" @if (!$data || $data?->status == 'Active') selected @endif> Active</option>
                                            <option value="Inactive" @if ($data?->status == 'Inactive') selected @endif> Inactive </option>
                                            <option value="Blocked" @if ($data?->status == 'Blocked') selected @endif> Blocked </option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label for=""> {{ __('common.address') }} </label>
                                    <textarea name="address" rows="3" class="form-control">{{$data?->address}}</textarea>
                                </div>
 
                                <div class="col-lg-12 text-end">
                                    <a href="{{ route('customer-list') }}"><button type="button" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button></a>
                                    <button type="submit" value="create" name="save" class="btn btn-sm btn-primary">{{ __('common.create') }}</button>
                                    <button type="submit" value="create_another" name="save" class="btn btn-sm btn-primary">{{ __('common.create-another') }}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    @endsection
    @section('scripts')
    @include('layouts.select2js')
        @include('keystroke') 
        @include('layouts.formvalidationjs')
    @endsection
