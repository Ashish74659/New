@extends('layouts.master-without-nav')
@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #404E6B !important;
            position: relative;
        }

        .container {
            width: 350px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e68a00;
        }

        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #0073e6;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }



        /* Amy Softech Logo */
        .logo-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logo-container img {
            max-width: 100px;
        }

        /* Copyright Footer */
        .footer-one {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 14px;
            color: #fff;
            background: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Logo -->
        <img src="{{ asset('build/images/Zentaro.png') }}" alt="Zentaro Logo">

        <h2>Login</h2>
        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate class="custom-validation">
            @csrf
            
            <input type="email" class="form-control mb-3" placeholder="{{ __('common.Enter Your Email')}}" name="email"
                :value="old('email')" required autofocus autocomplete="username">
            @error('email')
                <span class="text-danger d-none">{{ $message }}</span>
            @enderror
            <input type="password" class="form-control mb-3" name="password" id="passwordField" required
                placeholder="{{ __('common.Enter Your Password')}}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            
            {{-- <div class="form-check align-items-center mb-3">
                <input class="form-check-input" type="checkbox" value=""
                    aria-label="Checkbox for following text input">
                <label class="form-check-label" for="auth-remember-check">Remember me</label>
            </div> --}}
            <button type="submit">{{ __('admin.login') }}</button>
        </form>
        
        <a href="{{route('password.request')}}">{{ __('common.forgot-password') }}?</a>
    </div>
    <div class="footer-one">
        Copyright @ 2024 Zentaro. All Rights Reserved.
    </div>
    
@endsection

<!-- JS Part Start -->
@section('scripts')
    @include('layouts.formvalidationjs')
    @include('keystroke')



   
    <script>
        $(document).ready(function() {
            $(".hidediv").hide(1000);
            $('#changeSystemLang').change(function() {

                var url = "{{ route('language-switch') }}";
                Swal.fire({
                    text: '',
                    icon: 'success',
                    title: "Language Changed Successfully / تم تغيير اللغة بنجاح",
                    confirmButtonColor: '#404bcb',
                    timer: 5000
                })
                window.location.href = url + "?lang=" + $(this).val();
            })
        });


        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                const passwordField = $('#passwordField');
                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
 
    </script>
@endsection
