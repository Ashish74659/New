@extends('auth.authmaster')
@section('content')

<div class=" crm-log-back">
    <div class="row g-0">
        {{-- left Side Bar --}}
        @include('auth.components.leftside')

        {{-- Right Side Bar --}}
        <div class="col-lg-6">
            <div class="crm-right">
                <div class="sw-lg-50 px-5">
                      
                    <div class="mb-5">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>
                    <div class="mb-5">
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        @include('auth.forms.verify-email')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
