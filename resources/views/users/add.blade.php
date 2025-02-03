@extends('layouts.master')
@section('css')
    @include('layouts.select2css')
@endsection
@section('title')
    {{ __('company.user-add') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('company.user-add','user-list'); @endphp

        <div class="card card-bod">
            <div class="card-body">
                <h4 class="card-title border-bottom pb-2 mb-3"> {{ __('company.user-add') }}</h4>

                <form action="{{ route('user-store') }}" class="custom-validation" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="" class="mb-1">{{ __('company.employee-code') }} <span class="text-danger">*</span></label>                            
                            <input type="text" class="form-control" name="code" @if ($data?->code) value="{{ $data?->code }}" readonly @else maxlength="30" placeholder="eg:- E-10100" onkeypress="return $.alpha_num_space_period();" required @endif>
                        </div>

                        <div class="col-md-4 mb-3">
                            <input @if($data) value="{{ base64_encode(convert_uuencode($data?->id)) }}" @endif type="hidden" class="form-control" name="user_id">
                            <label for="name" class="form-label">{{ __('company.emp-name') }} <span class="text-danger">*</span></label>
                            <input value="{{ $data?->name }}" name="name" type="text" onKeyPress="return $.alpha_num_space_period();" class="form-control" @if($data) readonly @endif required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="email" class="form-label">{{ __('common.email') }} <span class="text-danger">*</span></label>
                            <input value="{{ $data?->email }}" name="email" class="form-control" onKeyPress="return $.alpha_num_space_period();" @if($data) readonly @endif required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="company_id" class="form-label">{{ __('company.company-name') }} <span class="text-danger">*</span></label>
                            <select style="width:100%"; class="form-control select2" id="company_id"
                                data-placeholder="Select Company" name="company_id[]" multiple="multiple" required>
                                @foreach ($company as $companies)
                                    <option value="{{ $companies->id }}" @if (in_array($companies->id, $selectedcompany)) selected @endif>
                                        {{ $companies?->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="role" class="form-label">{{ __('common.role') }} <span class="text-danger">*</span></label>
                            <select style="width:100%"; class="form-control select2" id="select2" data-placeholder="Select Roles" multiple="multiple" name="roles[]" required>
                                <option value="">{{ __('company.select-role') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}> {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group form-float mb-3">
                                <label for="">{{ __('customer.dob') }} <span class="text-danger">*</span></label>
                                <input type='Date' name="dob" class="form-control" value="{{ $data?->dob }}" required/>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="username" class="form-label">{{ __('common.password') }} @if(!$data) <span class="text-danger">*</span> @endif </label>
                            <input value="{{ old('password') }}" type="password" class="form-control form-label" id="password" name="password" onKeyPress="return $.alpha_num_space_period();" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Contains atlease one capital character, one small character, one special letter and one digit" @if(!$data) required @endif>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="confirm_password" class="form-label">{{ __('common.confirm-password') }} @if(!$data) <span class="text-danger">*</span> @endif </label>
                            <input value="{{ old('confirm_password') }}" type="text" class="form-control" title="Contains atlease one capital character, one small character, one special letter and one digit" name="confirm_password" onKeyPress="return $.alpha_num_space_period();" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" @if(!$data) required @endif>
                        </div>   

                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('common.status') }} <span class="text-danger">*</span></label></label>
                            <select class="form-control select2" name="status" required>
                                <option value="">{{ __('common.select') }}</option>                                                 
                                <option value="Active" @if ($data?->status == "Active") selected @endif> Active</option> 
                                <option value="Blocked" @if ($data?->status == "Blocked") selected @endif> Blocked</option> 
                            </select>
                        </div>
                         
                        <div class="col-md-4 mb-3">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.city') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->city }}" name="city" maxlength="30" required>
                            </div>
                        </div>
                     
                        <div class="col-md-4 mb-3">
                            <div class="form-group form-float  mb-3">
                                <label for="" class="mb-1">{{ __('customer.post-box') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{ $data?->post_box }}" name="post_box" maxlength="30" required>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
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
                
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                            <label for=""> {{ __('common.address') }} </label>
                            <textarea name="address" rows="3" class="form-control">{{$data?->address}}</textarea>
                        </div>
  
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ __('common.profile-image') }} @if(!$data?->profile_img) <span class="text-danger">*</span> @endif </label>
                            <div class="input-group">
                                <input type="file" class="form-control" aria-label="file example" name="image" onChange="validateFile(this,'image',1);" accept="image/*" @if(!$data?->profile_img) required @endif>
                            </div>
                        </div>                        
 
                        @if($data?->profile_img)
                            <div class="new-logo ms-auto"> <a target="_blank" href="{{document_path($data?->profile_img)}}"> <img src="{{document_path($data?->profile_img)}}" height="50" width="50"> </a> </div>
                        @endif

                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary btn-sm waves-effect"><i class="mdi mdi-update"></i> {{ __('common.save') }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    @endsection
    @section('scripts')
        @include('keystroke')
        @include('layouts.formvalidationjs')
        @include('layouts.select2js')
    @endsection
