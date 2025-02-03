{{-- <form method="POST" action="{{ route('login') }}" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="inputWithIcon">
                <input type="email" class="fd-input" placeholder="Enter Your Email" name="email" :value="old('email')"
                    required autofocus autocomplete="username">
                <i class="fa fa-envelope fa-md fa-fw" aria-hidden="true"></i>
                @include('common-components.error_code', [
                'keys' => 'email',
                ])
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="inputWithIcon">
                <input type="password" class="fd-input" placeholder="Enter Your Password" name="password" :value="old('password')"
                    required autofocus>
                <i class="fa fa-lock fa-md fa-fw" aria-hidden="true"></i>
                @include('common-components.error_code', [
                'keys' => 'password',
                ])
            </div>

        </div>
        <div class="col-md-12 mb-3">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                    <label for="" class="font-size-12 ms-2 mb-0">{{ __('common.remember-me') }}</label>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-color font-size-12">{{__('common.forgot-password')}}</a>
                @endif
            </div>
        </div>
        <button type="submit" class="exp-btn">{{__('common.login')}}</button>
        <p class="text-center font-size-12 mt-3 "><span class="me-2">{{__('common.dont-have-accouunt')}}</span><a href="#" class="text-color">{{__('common.register')}}</a></p>

    </div>
</form> --}}
