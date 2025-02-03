{{-- <div class="row">
    <div class="col-lg-12 col-md-12 otp-hide">
        <div class="mt-4">
            <div class="mb-3 text-center">
                <h2 class="mb-0 otp-head pb-0">{{ __('customer.otp-verification') }}</h2>
                <p class=" mb-0 info">{{ __('customer.an-otp-has-been-sent-to') }} sdzxrf

                    <?php
                    if (!empty($email)) {
                        $email = $email;
                        $pos = strpos($email, '@');
                        $len = strlen($email);
                        echo substr($email, $pos - 5, $len);
                    }

                    ?>
                </p>
                </p>
            </div> 
                @csrf
                <input type="hidden" name="email" class="form-check-input" id="otpshowbox"
                    @if (!empty($email)) value="{{ $email }}" @endif />
                <div class="mb-3 col-lg-8 mx-auto">
                    <div class="d-flex justify-content-between">
                        <input type="text" name="n0" class="otp-box n0" id="opt1" autocomplete="off"
                            autofocus data-next="1" maxlength=1 required>
                        <input type="text" name="n1" class="otp-box n1" id="opt2" autocomplete="off"
                            data-next="2" maxlength=1 required>
                        <input type="text" name="n2" class="otp-box n2" id="opt3" autocomplete="off"
                            data-next="3" maxlength=1 required>
                        <input type="text" name="n3" class="otp-box n3" id="opt4" autocomplete="off"
                            data-next="4" maxlength=1 required>
                        <input type="text" name="n4" class="otp-box n4" id="opt5" autocomplete="off"
                            data-next="5" maxlength=1 required>
                        <input type="text" name="n5"class="otp-box n5" id="opt6" autocomplete="off"
                            maxlength=1 required>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="d-grid mb-3">
                        <button type="button" onclick="$.match_otp();" class="btn btn-primary btn-lg waves-effect waves-light">{{ __('customer.verify') }}</button>
                    </div>
                </div>
 
                <div class="">
                    <span class="mb-0">{{ __('customer.didnot-receive-OTP') }}</span>
                    <a href="{{ route('vendor-otp-resend',['email'=>$email]) }}" class="ms-2 resend-btn"> {{ __('customer.resend-otp') }}</a>
                    <p class="mb-0 text-end"><span id="countdowntimer">{{ __('customer.60') }} </span> {{ __('customer.sec-left') }}</p>
                </div>
            </form>
        </div>
    </div>
</div> --}}
