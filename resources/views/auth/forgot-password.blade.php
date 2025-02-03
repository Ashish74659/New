@extends('layouts.master-without-nav')
@section('content')

<div class="container-fluid"> 
    <div class="row p-4">
        <div class="col-md-6 col-lg-6">
            <div class="fdo-left"> 
                <img src="{{ asset('build/images/pos-img/logo.png') }}" alt="" height="100px"> 
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="fdo-logo">
                <img src="{{ asset('build/images/pos-img/logo.png') }}" alt="" height="100px"> 
            </div>
            <div class="fdo-right"> 
                <form action="{{ route('password.email') }}" class="custom-validation" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="col-md-12 mb-3 position-relative">
                                <h2 class="heading mb-2 text-center">{{ __('common.Forgot Password')}}</h2>
                                <p class="font-size-12 text-center">{{ __('common.Please enter your email id to reset the password')}}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="inputWithIcon">
                                    <input type="email" onKeyPress="return $.alpha_num_space_period();" class="fd-input" placeholder="{{ __('common.Enter Your Email')}}" name="email" :value="old('email')"  autofocus>
                                     <img class="pos-left" src="{{ asset('assets_new/images/email-icon.svg')}}" alt="email-icon">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 d-flex gap-3">
                                <button type="button" class="col-md-6 can-btn" onclick="window.location.href='{{ route('login') }}'">{{ __('common.cancel') }}</button>
                                <button type="submit" class="col-md-6 log-btn">{{ __('common.Reset Password')}}</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets_new/js/jquery.min.js')}}"></script>
@include('keystroke') 

<div id="status-message" data-status="{{ session('status') }}" style="display: none;"></div>
<div id="error-message" data-error="{{ $errors->first('email') }}" style="display: none;"></div>
@endsection 
