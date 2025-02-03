@extends('auth.authmaster')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4">
        <h4 class="text-center mb-4">Two Factor Authentication Settings</h4>
        <form action="{{ route('2fa.setup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="enable_2fa">Enable 2FA</label>
                <input type="checkbox" id="enable_2fa" name="enable_2fa" {{ Auth::user()->is2FAEnabled() ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="float:right;">Save Settings</button>
        </form>
    </div>
</div>

@endsection
