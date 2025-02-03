{{-- @section('css') 
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	<style>

 

.fl-inp {
  position: relative;
  display: block;
  width: 100%;
  border: 1px solid rgba(0,0,0,.37);
  border-radius: 4px;
  background-color: transparent;
  margin: 0px auto;
  padding: 6px 4px 4px 14px;
  height: 40px;
  outline: none !important;
  font-size: 16px;
  color: rgba(0,0,0,0.85);
  transition: all .2s ease-in-out;
}
.resend-btn{
    display:none;
}

.fl-text {
  position: relative;
  display: block;
  width: 100%;
  border: 1px solid rgba(0,0,0,.37);
  border-radius: 4px;
  background-color: transparent;
  margin: 0px auto;
  padding: 6px 4px 4px 14px;
  
  outline: none !important;
  font-size: 16px;
  color: rgba(0,0,0,0.85);
  transition: all .2s ease-in-out;
}

.fl-lab {
  position: absolute;
  top: 12px;
  left: 18px;
  text-align: left;
  display: inline-block;
  padding: 0 4px;
  height: 14px;
  line-height: 14px;
  font-size: 12px;
  font-weight: 400;
  background: #fff;
  color: rgba(0,0,0,0.5);
  margin: 0px auto;
  cursor: text;
  transition: all .15s ease-in-out;
}
.fl-inp:hover, .fl-inp:focus,.fl-text:hover, .fl-text:focus { border: 1px solid #eee; }

.fl-inp:valid + .fl-lab, .fl-inp:focus + .fl-lab,.fl-text:valid + .fl-lab, .fl-text:focus + .fl-lab {
  top: -6px; 
}
.gl-form-asterisk {
    background-color: inherit;
    color: #e32b2b;
    padding: 0;
    padding-left: 3px;

}
.gl-form-asterisk:after {
    content: "*";
}

.fl-inp:-internal-autofill-selected, .fl-text:-internal-autofill-selected  {
background-color:#FF0000 !important;

}

 
</style>
@endsection

<form method="POST" action="{{ route('supplier-otp-request-store') }}" class="custom-validation form-md" novalidate>
    @csrf

    <div class="row register-hide">
        <div class="col-lg-12 col-md-12">
            <div class="form-group mb-3">
                <input class="form-control fl-inp" id="form_name1" name="organization_name" type="text" parsley-type="text" :value="old('organization_name')" required autofocus autocomplete="organization_name" />
					 <label for="form_name1" class="fl-lab">{{__('customer.organization-name')}} <span class="gl-form-asterisk"></span></label>
                    @include('common-components.error_code', [ 'keys' => 'organization_name', ])

            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3" style="margin-right: 10px;">

                <input class="form-control fl-inp" id="form_name2" name="name" parsley-type="text" :value="old('name')" required autofocus autocomplete="contact_person"/>
					<label for="form_name2" class="fl-lab">{{__('customer.first-name')}}<span class="gl-form-asterisk"></span></label>
                    @include('common-components.error_code', [ 'keys' => 'name', ])
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3">

                <input class="form-control fl-inp" id="form_name3" name="last_name" parsley-type="text"
                    :value="old('last_name')" required autofocus autocomplete="last_name"/>
					<label for="form_name3" class="fl-lab"> {{__('customer.last-name')}} <span class="gl-form-asterisk"></span></label>
                    @include('common-components.error_code', [
                        'keys' => 'last_name',
                    ])
            </div>
        </div>
        
         <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3" style="margin-right: 10px;">

                <input class="form-control fl-inp" parsley-type="text"  id="cr_number" type="text" name="cr_number" :value="old('cr_number')" required autocomplete="cr_number" @required(true) onblur="$.cr_check();"/>
					<label for="cr_number" class="fl-lab"> {{ __('customer.cr-number') }} <span class="gl-form-asterisk"></span></label>
                    @include('common-components.error_code', [ 'keys' => 'cr_number', ])
            </div>
        </div>
         
        <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3" style="margin-right: 10px;">
                <input class="form-control fl-inp" parsley-type="email"  id="email" type="email" name="email" :value="old('email')" required autocomplete="email" onblur="$.email_check();" @required(true) />
				<label for="email" class="fl-lab"> {{__('customer.email')}} <span class="gl-form-asterisk"></span></label>
                @include('common-components.error_code', [ 'keys' => 'email', ])
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3"> 
                <input class="form-control fl-inp" parsley-type="text"  id="mobile_no" type="text" name="mobile_no" :value="old('mobile_no')" required autocomplete="mobile_no" onkeypress="return ((event.charCode > 47 &amp;&amp; event.charCode < 58) || event.charCode == 43 )" @required(true) />
                <label for="mobile_no" class="fl-lab"> {{ __('customer.contact-no') }} <span class="gl-form-asterisk"></span></label>
                @include('common-components.error_code', [ 'keys' => 'mobile_no', ])
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group mb-3"> 
                <select class="select2 form-control select2-multiple" name="company_id[]" multiple="multiple" required data-placeholder="{{ __('common.company') }}">
                    @foreach($all_companies as $itm)
                        <option value="{{$itm->id}}">{{$itm->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="form-group mb-3">                  
					<textarea class="form-control fl-text" id="form_name6"  parsley-type="text" type="text" name="address" :value="old('address')" autocomplete="address" @required(true)  rows="4" cols="50"> </textarea>										
					<label for="form_name6" class="fl-lab"> {{__('customer.address')}} <span class="gl-form-asterisk"></span></label>
                    @include('common-components.error_code', [ 'keys' => 'address', ])
            </div>
        </div>
 
        <div class="col-lg-12 col-md-12">
            <div class="mb-3 position-relative form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="registerCheck" name="registerCheck" @required(true) />
                    @error('registerCheck') <div id="forgotPasswordEmail-error" class="error">{{ $message }}</div> @enderror
                    <label class="form-check-label" for="registerCheck"> {{__('customer.i-have-read-and-accept-the')}} <a href="#" class="text-green">{{__('customer.terms-and-conditions')}}</a> </label>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
		 <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">{{__('common.submit')}}</button> </div>
        </div>

        <input type="hidden" class="form-check-input" id="db_email" @if(!empty($email)) value="{{$email}}"  @endif/>
        <input type="hidden" class="form-check-input" id="db_otp" @if(!empty($otp)) value="{{$otp}}"  @endif/>
 
    </div>


</form>

<div class="mt-4 text-center">
	 <p class="mb-0">Do you have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login Here </a> </p>
	 </div>
@include('auth.forms.otp-from')
@section('scripts') 
 
       
        <script>
             var timeleft = {{$otp_time}};        
            var downloadTimer = setInterval(function(){
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
                if(timeleft <= 0){
                    clearInterval(downloadTimer);                                                         
                    $(".resend-btn").css("display", "block");
                }                
                },1000);
            
        </script>
        <script>
            // Show OTP Part & Hide SignUp Page
            $(document).ready(function() {
                var db_email = $('#db_email').val();                      
                 if(db_email)
                 {                    
                    $(".otp-hide").show();
                    $(".register-hide").hide();
                 }
                  else{                  
                    $(".otp-hide").hide();
                    $(".register-hide").show();
                  }
                
                setTimeout(function() {                 
                    $(".resend-btn").show();
                }, 60000);

            // Automatic Jump to Next Input Box
                $('.otp-box').keyup(function(e) {
                    if (this.value.length === this.maxLength) {
                        let next = $(this).data('next');
                        $('.n' + next).focus();
                    }
                });

                $.match_otp = function(){
                    var db_otp = $('#db_otp').val(); 
                    var email = $('#db_email').val();  
                    var opt1 = $('#opt1').val();  
                    var opt2 = $('#opt2').val(); 
                    var opt3 = $('#opt3').val(); 
                    var opt4 = $('#opt4').val(); 
                    var opt5 = $('#opt5').val(); 
                    var opt6 = $('#opt6').val(); 
                    if(opt1 && opt2 && opt3 && opt4 && opt5 && opt6 && db_otp && email){
                        if(opt1 +''+ opt2 +''+ opt3 +''+ opt4 +''+ opt5 +''+ opt6 == db_otp){                            
                            $.ajax({            
                                url:"{{ route('vendor-otp-matched') }}",   
                                method: 'post',
                                data: {
                                    email:email,
                                    _token: '{{ csrf_token() }}'
                                },
                                cache: false,  
                                async: false,      
                                success: function(response) { 
                                    if (response == 200) {
                                        Swal.fire({
                                            icon: 'success',
                                            timer: 5000,
                                            title: "Registration request Sent",
                                            showConfirmButton: false
                                        }) 
                                        window.location.href ="/";
                                    }
                                    else{
                                        Swal.fire({
                                            icon: 'error',
                                            timer: 5000,
                                            title: "Something Went wrong",
                                            showConfirmButton: false
                                        })
                                    }
                                }              
                            });
                        }
                        else{                            
                            Swal.fire({
                                icon: 'error',
                                timer: 5000,
                                title: "OTP does not matched",
                                showConfirmButton: false
                            })
                        }
                    }    
                    else{                        
                        Swal.fire({
                            icon: 'error',
                            timer: 5000,
                            title: "OTP length does not matched",
                            showConfirmButton: false
                        })                                    
                    }
                }
                
                
                
                $.cr_check = function(){
                var cr_number = $('#cr_number').val(); 
                    if(cr_number){
                        $.ajax({
                            url: "{{ route('cr-no-check') }}",
                            type: "GET",
                            data: {
                                _token: '{{ csrf_token() }}',
                                cr_number: cr_number
                            },
                            cache: false,
                            async: false,
                            success: function(response) {
                               if(response){
                                    Swal.fire({
                                        icon: 'error',
                                        timer: 5000,
                                        title: 'CR Number exists',
                                        showConfirmButton: false
                                    })
                                    $('#cr_number').val('');
                               }
                            }
                        });
                    }
                }

                $.email_check = function(){
                var email = $('#email').val(); 
                    if(email){
                        $.ajax({
                            url: "{{ route('email-check') }}",
                            type: "GET",
                            data: {
                                _token: '{{ csrf_token() }}',
                                email: email
                            },
                            cache: false,
                            async: false,
                            success: function(response) {
                               if(response){
                                    Swal.fire({
                                        icon: 'error',
                                        timer: 5000,
                                        title: 'Email already exists',
                                        showConfirmButton: false
                                    })
                                    $('#email').val('');
                               }
                            }
                        });
                    }
                }
                
            });
        </script>
		
		
		
		

    @endsection --}}
