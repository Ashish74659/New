@extends('layouts.master')
@section('title')
    Profile 
@endsection
@section('page-title') 
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection 
    @section('content')
         
        @php echo App\Helpers\MasterHelper::header('common.employee-profile'); @endphp

        <div class="d-flex gap-2">
            <div class="position-relative">
                <span class="btn-pos"><i class="mdi mdi-arrow-left"></i><a href="{{ route('dashboard') }}"></span><button
                    type="button" class="btn btn-back">{{ __('common.back') }}</button></a>
            </div>
        </div>
        @php echo App\Helpers\MasterHelper::footer(); @endphp

        {{-- <form method="POST" action="{{ route('emp-profile-update') }}" enctype="multipart/form-data"> --}}
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <div class="row">
                        <hr class="bord-top">
                        <div class="col-md-6 mb-3">
                            <label for=" " class="form-label mb-0">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user?->name }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=" " class="form-label mb-0">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user?->email }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=" " class="form-label mb-0">Profile Photo</label>
                            <input type="file" id="image-size" class="form-control" name="image"
                                accept=".jpg, .jpeg, .png">
                            <p class="text-danger mb-0" style="font-size: 12px;">( Accept only JPG, JPEG, PNG, formats.
                                Total file size upto 2 MB ).</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=" " class="form-label mb-0">Mobile Number</label>
                            <input type="text" class="form-control" name="name" value="" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Other Details</h5>
                <div class="row">
                    <hr class="bord-top">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for=" " class="form-label mb-0 ">Position</label>
                                <input type="text" class="form-control" name="name" value="" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for=" " class="form-label mb-0">Report to position</label>
                                <input type="text" class="form-control" name="name" value="" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for=" " class="form-label mb-0">Department</label>
                                <input type="text" class="form-control" name="name" value="" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for=" " class="form-label mb-0">Address</label>
                                <textarea name="" id="" class="form-control" cols="30" rows="1" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=" " class="form-label mb-0">Company Detail</label>
                        <div class="table-responsive" data-simplebar style="max-height: 265px;">
                            <table class="table table-striped table-hover" >
                                <thead class="bg-light">
                                    <tr>
                                        <th>Company</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($company)
                                        @foreach ($company as $item)
                                            <tr>
                                                <td>{{ $item?->company?->code }}</td>
                                                <td>{{ Auth::user()->roles[0]->name}}</td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <form action="{{ route('change-Password') }}" method="POST"> --}}
            @csrf
            <div class="card">
                <div id="accordion" class="custom-accordion">
                    <div class="card mb-0 mt-0 shadow-none">
                        <a href="#collapseOne" class="text-dark p-3" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="collapseOne">
                            <div class="" id="headingOne">
                                <h5 class="card-title m-0">Change Password <i
                                        class="mdi mdi-minus float-end accor-plus-icon"></i>
                                </h5>
                                <hr class="bord-top">
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion"
                            style="">
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label mb-0">Current Password</label>
                                        <input type="text" class="form-control" name="oldPassword" minlength="6"
                                            maxlength="15">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label mb-0">New Password</label>
                                        <input type="password" class="form-control" id="passwordField"
                                            placeholder="Enter Your New Password" minlength="6" name="newPaassword"
                                            maxlength="15">
                                        <img src="{{ URL::asset('build/images/see-password-icon.svg') }}" class="pos-right"
                                            id="togglePassword" alt="password-icon">
                                        <div id="message">
                                            <h3 class="text-color">Password must contain the following:</h3>
                                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                            <p id="number" class="invalid">A <b>number</b></p>
                                            <p id="specialcharacter" class="invalid">A <b>special character</b></p>
                                            <p id="length" class="invalid">Min. <b>6</b> & Max. <b>15</b> characters
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=" " class="form-label mb-0">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPasswordField"
                                            placeholder="Enter Your Confirm Password" minlength="6" maxlength="15">
                                        <span id="passwordMismatchMessage"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
    @endsection
    @section('scripts')
 
        <script>
            document.getElementById('image-size').addEventListener('change', function(event) {
                var file = event.target.files[0];
 
                if (!file) {
                    return;
                }
 
                var maxSizeInBytes = 2 * 1024 * 1024; // 2 MB
                if (file.size > maxSizeInBytes) {
                    alert('File size exceeds 2 MB. Please upload a smaller file.');
                    event.target.value = '';
                    return;
                }

                // Validate file type
                var validTypes = ['image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('Invalid file type. Please upload a JPG, PNG, or PDF file.');
                    event.target.value = '';
                    return;
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#togglePassword').on('click', function() {
                    const passwordField = $('#passwordField');
                    const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                    passwordField.attr('type', type);
 
                    $(this).attr('src', type === 'password' ? 'build/images/see-password-icon.svg' :
                        'build/images/hide-password-icon.svg');
                });

                // Password validation
                var passwordField = document.getElementById("passwordField");
                var confirmPasswordField = document.getElementById("confirmPasswordField");
                var messageBox = document.getElementById("message");
                var passwordMismatchMessage = document.getElementById("passwordMismatchMessage");

                // Show and hide message box
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
                    } else if (confirmPasswordField.value !== "") {
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
