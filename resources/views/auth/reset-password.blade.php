@extends('layouts.master-without-nav')
@section('content')
@php $email = $_GET['e']; @endphp
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
                
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 position-relative">
                            <h2 class="heading mb-2 text-center">Password Reset</h2>
                            <p class="font-size-12 text-center">Create a new password. Ensure it differs from previous ones for security
                            </p>
                        </div> 
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                        <div class="mb-3 filled">
                            <i data-acorn-icon="email"></i>
                            <input class="form-control" type="hidden" placeholder="Email" name="email" value="{{ $email }}" required autofocus autocomplete="username" @required(true) @readonly(true) />                        
                        </div> 
                        <div class="col-md-12 mb-3">
                            <div class="inputWithIcon">
                                <input type="password" class="fd-input" name="password" id="passwordField"
                                    placeholder="Enter Your New Password"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                <img class="pos-left" src="{{ asset('assets_new/images/lock-password.svg') }}" alt="password-icon">
                                <img class="pos-right" id="togglePassword" src="{{ asset('assets_new/images/see-password-icon.svg') }}"
                                    alt="password-icon">
                                <div id="message">
                                    <h3 class="text-color">Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="specialcharacter" class="invalid">A <b>special character</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                                @error('password')
                                    <div id="forgotPasswordEmail-error" class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                        <!-- Confirm Password -->
                        <div class="col-md-12 mb-3">
                            <div class="inputWithIcon">
                                <input class="fd-input" id="confirmPasswordField" placeholder="Enter Your Confirm Password"
                                    type="password" name="password_confirmation" required autocomplete="new-password" @required(true)>
                                <img class="pos-left" src="{{ asset('assets_new/images/lock-password.svg') }}" alt="email-icon">
                                <span id="passwordMismatchMessage"></span>
                                @error('password_confirmation')
                                    <div id="forgotPasswordEmail-error" class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 d-flex gap-3">
                        <button type="button" class="col-md-6 can-btn"><a href="{{route('login')}}">{{ __('common.cancel') }}</a></button>
                        <button type="submit" class="col-md-6 log-btn">{{ __('Reset Password') }}</button>
                    </div>
                </form> 
                
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets_new/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets_new/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets_new/js/main.js')}}"></script>
    <script>
        $(document).ready(function() {             

            $('#togglePassword').on('click', function() {
                const passwordField = $('#passwordField');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
            });
 
            var passwordField = document.getElementById("passwordField");
            var confirmPasswordField = document.getElementById("confirmPasswordField");
            var messageBox = document.getElementById("message");
            var passwordMismatchMessage = document.getElementById("passwordMismatchMessage");
 
            passwordField.onfocus = function() {
                messageBox.style.display = "block";
            };

            passwordField.onblur = function() {
                messageBox.style.display = "none";
            };

            function validatePassword() {
                var letter = document.getElementById("letter");
                var capital = document.getElementById("capital");
                var number = document.getElementById("number");
                var specialcharacter = document.getElementById("specialcharacter");
                var length = document.getElementById("length");

                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                letter.classList.toggle("valid", passwordField.value.match(lowerCaseLetters));
                letter.classList.toggle("invalid", !passwordField.value.match(lowerCaseLetters));

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                capital.classList.toggle("valid", passwordField.value.match(upperCaseLetters));
                capital.classList.toggle("invalid", !passwordField.value.match(upperCaseLetters));

                // Validate numbers
                var numbers = /[0-9]/g;
                number.classList.toggle("valid", passwordField.value.match(numbers));
                number.classList.toggle("invalid", !passwordField.value.match(numbers));

                // Validate special characters
                var specialCharacter = /[@#$!%*?&]/g;
                specialcharacter.classList.toggle("valid", passwordField.value.match(specialCharacter));
                specialcharacter.classList.toggle("invalid", !passwordField.value.match(specialCharacter));

                // Validate length
                length.classList.toggle("valid", passwordField.value.length >= 8);
                length.classList.toggle("invalid", passwordField.value.length < 8);

                // Validate confirm password
                if (passwordField.value === confirmPasswordField.value && confirmPasswordField.value !== "") {
                    passwordMismatchMessage.style.display = "block";
                    passwordMismatchMessage.style.color = "green";
                    passwordMismatchMessage.textContent = "Passwords match successfully!";
                    confirmPasswordField.style.borderColor = "#00A9E2"; // Optional: change border color to green
                } else if (confirmPasswordField.value !== ""){
                    passwordMismatchMessage.style.display = "block";
                    passwordMismatchMessage.style.color = "red";
                    passwordMismatchMessage.textContent = "Passwords do not match";
                    confirmPasswordField.style.borderColor = "red"; // Optional: change border color to red
                } else {
                    passwordMismatchMessage.style.display = "none";
                }
            }

            // Bind input events to validate passwords
            $('#passwordField, #confirmPasswordField').on('input', validatePassword);
        });
    </script>
@endsection
