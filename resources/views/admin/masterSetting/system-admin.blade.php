@extends('layouts.master')
@section('title')
    System Setup
@endsection
@section('page-title')
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection 
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('System Setup','dashboard'); @endphp

        <form class="custom-validation" method="POST" action="{{ route('systemadminStore') }}" novalidate>
            @csrf
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <hr class="bord-top">
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <h4 class="card-title">{{ __('admin.system-administration') }}</h4>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <ul class="nav nav-tabs justify-conten-start ">
                                        <li class="nav-item ">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                                href="#otp-setting">{{ __('admin.general') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#email-setting">{{ __('admin.email-setting') }}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-end border-bottom">
                                    <button type="submit" class=" btn btn-primary btn-sm waves-effect"><i
                                            class=" mdi mdi-content-save-outline"></i> {{ __('admin.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="tab-content">
                        <div id="otp-setting" class="tab-pane fade in active show mb-4">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title border-bottom pb-2 mb-3">{{ __('admin.otp-setting') }}
                                            </h4>
                                            <input type="hidden" name="id" parsley-type="text"
                                                @if (!@empty($systemadmin)) value="{{ $systemadmin->id }}" @endif />
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.otp-timeout') }}</label>
                                                    <input type="text" name="otp_time" parsley-type="text"
                                                        @if (!@empty($systemadmin)) value="{{ $systemadmin->otptime }}" @endif
                                                        required
                                                        onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                                                        maxlength="3" class="form-control form-control-sm otp-time-enable"
                                                        id="" placeholder=" " />
                                                    
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label class="form-check-label"
                                                        for="otpcheck">{{ __('admin.enable') }}</label>
                                                    <div class=" form-switch">
                                                        <input class="form-check-input" name="otp_time_enable"
                                                            type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="" class="col-form-label col-form-label-sm">
                                                        {{ __('admin.number-of-attempts') }}
                                                    </label>
                                                    <input type="text" name="number_attempts"
                                                        @if (!@empty($systemadmin)) value="{{ $systemadmin->numbertime }}" @endif
                                                        parsley-type="text"
                                                        onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                                                        maxlength="1" class="form-control form-control-sm number-enable"
                                                        placeholder=" " id="numberAttemptsInput" />
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-check-label" for="numbercheck">{{ __('admin.enable') }}</label>
                                                    <div class="form-switch">
                                                        <input class="form-check-input" name="number_attempts_enable"
                                                            type="checkbox" id="numbercheck"
                                                            @if (isset($systemadmin) && $systemadmin->number_enable == 1) checked @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="" class="col-form-label col-form-label-sm">
                                                        {{ __('admin.time-of-auto-release') }}(In Hour)
                                                    </label>
                                                    <input type="text" name="auto_release_time"
                                                        @if (!@empty($systemadmin)) value="{{ $systemadmin->auto_release_time }}" @endif
                                                        parsley-type="text"
                                                        onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                                                        maxlength="2" class="form-control form-control-sm number-enable"
                                                        placeholder="In Hour" id="auto_release_time" />
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-check-label" for="auto_release">{{ __('admin.enable') }}</label>
                                                    <div class="form-switch">
                                                        <input class="form-check-input" name="auto_release_enable"
                                                            type="checkbox" id="auto_release_enable"
                                                            @if (isset($systemadmin) && $systemadmin->auto_release_enable == 1) checked @endif>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <label for="" class=" col-form-label col-form-label-sm">
                                                        {{ __('common.workflow-type') }}</label>
                                                    <select name="workflow_type" required class="form-control">
                                                        <option value="">{{ __('common.chooseoption') }}</option>
                                                        <option value="Consolidated"
                                                            @if ($systemadmin?->workflow_type == 'Consolidated') selected @endif>Consolidated
                                                        </option>
                                                        <option value="Company Wise"
                                                            @if ($systemadmin?->workflow_type == 'Company Wise') selected @endif>Company Wise
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class=" col-form-label col-form-label-sm">
                                                        {{ __('common.no-seq-type') }}</label>
                                                    <select name="numbersequence_type" required class="form-control">
                                                        <option value="">{{ __('common.chooseoption') }}</option>
                                                        <option value="Consolidated"
                                                            @if ($systemadmin?->numbersequence_type == 'Consolidated') selected @endif>Consolidated
                                                        </option>
                                                        <option value="Company Wise"
                                                            @if ($systemadmin?->numbersequence_type == 'Company Wise') selected @endif>Company Wise
                                                        </option>
                                                    </select>
                                                </div>
 
  

                                                <div class="col-md-6">
                                                    <label for="" class=" col-form-label col-form-label-sm"> {{ __('quotation.currency') }} </label>
                                                    <select type="text" name="currency_id" class="form-control select2" required>
                                                        <option value="">{{ __('common.chooseoption') }}</option>
                                                        @foreach ($currency as $currencypr)
                                                            <option value="{{ $currencypr->id }}" @if ($systemadmin?->default_currency_id == $currencypr->id) selected @endif> {{ $currencypr->name }} ({{ $currencypr->code }}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
 

                                              

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title border-bottom pb-2 mb-3">
                                                {{ __('admin.registration-setting') }}</h4>

                                            <div class="row mb-3">
                                                <div class="col-md-6 ">
                                                    <label class="form-check-label"
                                                        for="otpcheck">{{ __('admin.aprroval-required') }}</label>
                                                    <div class=" form-switch">
                                                        <input class="form-check-input" name="registration_setting"
                                                            type="checkbox" id="otpcheck">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="email-setting" class="tab-pane fade mb-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title border-bottom pb-2 mb-3">
                                                {{ __('admin.email-setting') }}</h4>

                                            <div class="row mb-3">

                                                <div class="col-md-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="email_setting"
                                                            type="checkbox" id="emailcheck" checked="">
                                                        <label class="form-check-label" for="">
                                                            {{ __('admin.enable') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.host') }}</label>
                                                    <input type="text" name="host"
                                                        value="{{ $systemadmin?->host }}"
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.port') }}</label>
                                                    <input type="text" name="port"
                                                        value="{{ $systemadmin?->port }}"
                                                        onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.username') }}</label>
                                                    <input type="text" name="username"
                                                        value="{{ $systemadmin?->username }}"
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.password') }}</label>
                                                    <input type="text" name="password"
                                                        value="{{ $systemadmin?->password }}"
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.encryption') }}</label>
                                                    <input type="text" name="encryption"
                                                        @if (!@empty($systemadmin)) value="{{ $systemadmin->encryption }}" @endif
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""
                                                        class=" col-form-label col-form-label-sm">{{ __('admin.from-address') }}</label>
                                                    <input type="text" name="address"
                                                        @if (!@empty($systemadmin)) value="{{ $systemadmin->address }}" @endif
                                                        class="form-control form-control-sm email-enable" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- END ROW -->
    @endsection
    @section('scripts') 
        <script>
            $(document).ready(function() {
                function toggleRequiredAttribute() {
                    if ($('#numbercheck').prop('checked')) {
                        $('#numberAttemptsInput').attr('required', true);
                    } else {
                        $('#numberAttemptsInput').removeAttr('required');
                    }
                }
                toggleRequiredAttribute();
                $('#numbercheck').change(function() {
                    toggleRequiredAttribute();
                });

                // for auto release time
                function toggleRequiredAttribute_auto() {
                    if ($('#auto_release_enable').prop('checked')) {
                        $('#auto_release_time').attr('required', true);
                    } else {
                        $('#auto_release_time').removeAttr('required');
                    }
                }
                toggleRequiredAttribute_auto();
                $('#auto_release_enable').change(function() {
                    toggleRequiredAttribute_auto();
                });
                //End auto release time
                $('#otpcheck').click(function() {
                    $('.otp-time-enable').prop("disabled", !$("#otpcheck").prop("checked"));
                    $('.otp-time-enable').val('');
                })

                $('#emailcheck').click(function() {
                    $('.email-enable').prop("disabled", !$("#emailcheck").prop("checked"));
                    $('.email-enable').val('');
                })
            });
        </script>
    @endsection
