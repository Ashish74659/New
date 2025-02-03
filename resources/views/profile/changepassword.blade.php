@extends('layouts.master')

@section('title')
    {{ __('common.change-password') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @include('common-components.pages-heads')

    @section('content')

    @section('breadcrumb')
	
	 
        @php echo App\Helpers\MasterHelper::header('common.change-password','common.home'); @endphp
         
 <a href="#"> <button type="button"
                class="btn btn-sm btn-primary waves-effect waves-light">Back</button></a>
        @php echo App\Helpers\MasterHelper::footer(); @endphp
    @endsection

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                 <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">
				 
						<div class="row"> 
                        <div class="card-body">
                              <form  method="POST" action="{{url('passwordd-update')}}">
                              @csrf
                                
							     <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="">Email Id </label>
                                                <input  class="form-control" value="{{ auth()->user()->email }}" disabled readonly>
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="">Old password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="old_password" placeholder="Enter old password" value="" @required(true)>
                                                @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="">New password<span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                    <input type="password" class="form-control ps-3" id="password" placeholder="Enter password" name="password">
                                                    <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                    </button>
                                                    </div>
                                                <span class="text-danger"></span>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="">Confirm password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password"  @required(true)>
                                                 <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addoncong">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                    </button>
                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 
	@endsection
    @section('scripts')
	
	<script>
          document.addEventListener('DOMContentLoaded', function () {
       
        var passwordButton = document.getElementById('password-addon');
        var passwordCongButton = document.getElementById('password-addoncong');
        var passwordInput = document.getElementById('password');
         var passwordconInput = document.getElementById('password_confirmation');
  
        passwordButton.addEventListener('click', function () {
            passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';
        });
         passwordCongButton.addEventListener('click', function () {
             passwordconInput.type = (passwordconInput.type === 'password_confirmation') ? 'text' : 'password_confirmation';
        });
    });

        // Disable copy-paste
        document.addEventListener('copy', function (e) {
            e.preventDefault();
        });

        document.addEventListener('cut', function (e) {
            e.preventDefault();
        });

        document.addEventListener('paste', function (e) {
            e.preventDefault();
        });
   
    </script>
       
    @endsection