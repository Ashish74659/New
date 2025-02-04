@extends('layouts.master')
@section('title')
    {{ __('company.company-list') }}
@endsection
@section('page-title')
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection 
    @section('content')
        @php echo App\Helpers\MasterHelper::header('common.master-setup'); @endphp

        <div class="d-flex gap-2">
            <div class="position-relative">
                <span class="btn-pos"><i class="mdi mdi-arrow-left"></i> <a href="{{ route('dashboard') }}"></span><button
                    type="button" class="btn btn-back"> {{ __('common.back') }}</button></a>

            </div>
        </div>

        @php echo App\Helpers\MasterHelper::footer(); @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mb-2">
                        <div id="accordion" class="custom-accordion"> 

                            <div class="card mb-0 shadow-none">
                                <a href="#collapsefive" class="text-dark collapsed" data-bs-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="m-0">
                                            {{ __('common.company-setup') }}
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>

                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">

                                            
                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ route('customer-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('customer.customer-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/Currency-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.Currency-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/Company-Warehouse-lists') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.Warehouse-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/Tax-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.Tax-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/Discount-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.Discount-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/UOM-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.UOM-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/PosType-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.PosType-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        {{-- <a href="{{ url('master/PosType-Category-lists') }}" class="setup-detail"> --}}
                                                            <a href="{{ route('category-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.Category-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        {{-- <a href="{{ url('master/Category-SubCategory-lists') }}" class="setup-detail"> --}}
                                                            <a href="{{ route('sub-category-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.SubCategory-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ route('company-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.company') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                             

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- -------collapse five------------- --}}
                            <div class="card mb-0 shadow-none">
                                <a href="#collapseseven" class="text-dark collapsed" data-bs-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseseven">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="m-0">
                                            {{ __('common.user-setup') }}
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>

                                <div id="collapseseven" class="collapse" aria-labelledby="headingfour"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ route('user-list') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.users-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('user/roles') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.role-list') }} </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('user/permission') }}" class="setup-detail">
                                                            <p class="card-text">{{ __('common.permission-list') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </div>

                                    </div>
                                </div>
                            </div>
                          
 

                            {{-- -------collapse 8------------- --}}
                            <div class="card mb-0 shadow-none">
                                <a href="#collapse-system" class="text-dark collapsed" data-bs-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapse-system">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="m-0">
                                            {{ __('common.system-setup') }}
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>

                                <div id="collapse-system" class="collapse" aria-labelledby="headingfour"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ route('systemadmin') }}" class="setup-detail">
                                                            <p class="card-text">
                                                                {{ __('common.systemadministration') }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
 

                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ url('master/EmailMaster-list') }}"
                                                            class="setup-detail">
                                                            <p class="card-text">{{ __('common.EmailMaster') }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="card bg-master text-white">
                                                    <div class="card-body">
                                                        <a href="{{ route('email-template-list') }}"
                                                            class="setup-detail">
                                                            <p class="card-text">{{ __('common.EmailTemplate') }} </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- -------collapse 9------------- --}}                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->
    @endsection
    @section('scripts') 
        <script>
            $(document).ready(function() {
                $('#otpcheck').click(function() {
                    $('.otp-time-enable').prop("disabled", !$("#otpcheck").prop("checked"));
                    $('.otp-time-enable').val('');
                })

                $('#numbercheck').click(function() {
                    $('.number-enable').prop("disabled", !$("#numbercheck").prop("checked"));
                    $('.number-enable').val('');
                })
                $('#emailcheck').click(function() {
                    $('.email-enable').prop("disabled", !$("#emailcheck").prop("checked"));
                    $('.email-enable').val('');
                })
            });
        </script>
    @endsection
