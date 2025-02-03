{{-- 



<form method="POST" action="{{ route('password.email') }}" class="custom-validation form-md" novalidate>
    @csrf

    <!-- Email Address -->
    <div class="row">
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <div class="position-relative">
        <input class="form-control fl-inp" id="form_name1"  type="email" name="email" :value="old('email')"
            required autofocus />
			 <label for="form_name1" class="fl-lab"> {{ __('Email') }} <span class="gl-form-asterisk"></span></label>
        @error('email')
            <div id="forgotPasswordEmail-error" class="error">{{ $message }}</div>
        @enderror
		 </div>
    </div>
		
		
    </div>
	 <div class="col-lg-12">
      <div class="d-grid mb-3">
    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light"> Reset</button>
	</div>
	</div>
   </div>
</form> --}}
