@extends('layouts.master')
@section('title')
    {{ __('company.company-list') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection
@section('css')
    <style>
        .contact-per {
            border: 1px solid #00000026;
            border-radius: 10px;
            padding: 14px;
        }

        .text-head {
            color: #00A9E2;
        }

        .log {
            color: #FC8404;
        }

        .bg-tab {
            background: #F3F5F8;
        }

        .radius {
            border-radius: 10px 0 0 0;
        }

        .radius2 {
            border-radius: 0 10px 0 0;
        }
    </style>
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @include('common-components.pages-heads')
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('Profile','vendor-quotation-list'); @endphp


        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="contact-per">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="col-md-2"> <img src=" {{ URL::asset('/build/images/profile/user.svg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-10 pt-3 ps-2">
                                    <h6 class="mb-0"> {{$data?->name}}</h6>
                                    <p class="pt-0 font-size-12">
                                        <?php 
                                        $length = strlen($data?->phone_no);
                                        $phoneshow = str_repeat('X', $length - 4) . substr($data?->phone_no, -4);
                                        ?>
                                        + {{$phoneshow}}</p>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.png') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.vendor-id')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12"> {{$data?->vendor_request_id}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/mail.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.email-id')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->email}}</p>
                            </div>


                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/company_svgrepo.com.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.com-name')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->organization_name}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/document-file-paper-25_svgrepo.com.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.vendor-type') }}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->vendor_type}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/globe.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.nationality') }}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->country?->name}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/billing.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.alter-address') }}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->billing_address}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/home.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.primary-address') }}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->primary_address}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/currency.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.currency')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->currency?->name}} ({{$data?->currency?->code}})</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">

                        <h5 class="text-head">{{__('vendor.company-details')}}</h5>

                        <div class="contact-per mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/calendar.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.com-found-year') }}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->founding_year}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/number-row.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.cr-number') }}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->cr_number}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-hierarchy.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('common.LineOfBusiness') }} </b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->lineofbusiness?->name}}</p>
                                    </div>
                                      {{-- // new Create lalsingh --}}
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-hierarchy.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('common.SubSegment') }}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->subsegment?->name}}</p>  
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-global.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.website') }}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->website}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/employee-group.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.no-of-emps') }}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->number_of_employee}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/star-emphasis.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.type-of-product') }}</b>
                                            </span>
                                        </div>
                                        <p class="mb-0 font-size-12">@foreach($vendor_category as $cat_data)  @if($loop?->iteration > 1) , @endif  {{$cat_data?->category?->name}} @endforeach</p>
                                    </div>

                                    {{-- // new Create lalsingh --}}

                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/star-emphasis.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{ __('vendor.type-of-business') }}</b>
                                            </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$data?->type_of_business?->name }}</p>
                                        <span>
                                            @if($data?->vendor_step_1_id)
                                            <a class="alink" href="{{route('download-vendor-upload-typeBusiness',['vendor_id'=>base64_encode(convert_uuencode($vendorAttachement?->vendor_step_1_id))])}}">
                                                 <i class="fa fa-download" aria-hidden="true" style="float: right;padding-right: 20px; font-size: x-large;"></i></a>
                                            @endif
                                            </span>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <h5 class="text-head">{{__('vendor.tax-information')}}</h5>

                        <div class="contact-per mb-4">


                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/cash-register.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.VAT-registration-no')}} </b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->vat_no}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/card.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.modes-of-payment')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->modeofpayment?->name}}</p>
                            </div>






                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/id-card.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.pyment-terms')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->termsofpayment?->name}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/delivery.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.deliveryterms')}}</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">{{$data?->termsofdelivery?->name}}</p>
                            </div>




                        </div>





                    </div>


                    <div class="col-md-4 mb-3">
                        <div class="contact-per">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-head">Login History</h5>
                                <button type="button" class="btn btn-primary btn-sm waves-effect"><i
                                        class="mdi mdi-arrow-left-bold-circle-outline"></i> Logout All </button>

                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="d-flex">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.svg') }}" alt="">
                                    <div>
                                        <span class="mb-0 ms-2 font-size-16"> Web </span>
                                        <p class="mb-0 ms-2 font-size-10"> Jul 06, 2024 at 05: 08 AM </p>
                                    </div>
                                </div>
                                <p class="mb-0 font-size-14 log">Logout</p>
                            </div>





                        </div>
                    </div>
                    <div class="col-md-8 mb-3">

                        <h5 class="text-head">{{__('vendor.account-information')}}</h5>
                        @foreach($vendor_bank_details as $financial_data)
                        <div class="contact-per mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/id-wallet.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.bank-name')}}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$financial_data?->bank_name}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/code-signing.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.swift-code')}}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$financial_data?->swift_code}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/money-pin.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.bank-branch-address')}}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$financial_data?->bank_address}}</p>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/account.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.account-holder-name')}}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$financial_data?->account_holder_name}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/bank-bill.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>{{__('vendor.iban')}}</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">{{$financial_data?->iban}}</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        @endforeach


                        <h5 class="text-head">{{__('common.documents')}}</h5>

                        <div class="contact-per mb-4 p-0">

                            <div class="table-responsive" data-simplebar style="max-height: 220px;">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="bg-tab">
                                        <tr>

                                            <th>{{__('vendor.sr-no')}}</th>                
                                            <th> {{__('common.type')}}</th> 
                                            <th> {{__('common.action')}}</th> 


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($type_of_business_docs as $docs)
                                        <tr> 
                                        
                                        
                                                <td>{{$loop?->iteration}}</td>
                                                <td>{{$docs?->attechmentType}}</td>
                                                <td>
                                        
                                                    @php
                                                        $originalName = $docs?->name;
                                                        $extension = '';
                                                  
                                                        if (strpos($originalName, 'data:') === 0) { 
                                                            preg_match('/data:([^;]*);/', $originalName, $match);
                                                            $mimeType = $match[1] ?? '';
                                                  
                                                            $extensionMap = [
                                                                'application/pdf' => 'pdf',
                                                                'image/jpeg' => 'jpeg',
                                                                'image/png' => 'png',
                                                            ];
                                                 
                                                            $extension = $extensionMap[$mimeType] ?? ''; // Get the extension based on MIME type
                                                        } else {
                                                            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                                                        }
                                                 
                                                        $downloadName = $docs?->attechmentType.$docs?->id.".". $extension;
                                                        @endphp
                                                 
                                                        @if (strpos($originalName, 'data:application/') === 0)
                                                        <a href="{{ $originalName }}" download="{{ $downloadName }}">Download PDF</a>
                                                        @elseif(strpos($originalName, 'data:image/') === 0)
                                                        <a href="{{ $originalName }}" download="{{ $downloadName }}">Download Image</a>
                                                        @else 
                                                        <a href="{{ URL::asset($docs?->url.'/'.$docs?->name) }}" download>Download File</a>
                                                    @endif
                                                    
                                                </td>
                                                </tr>
                                                
                                                @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>




                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        @include('supplier.quotation.jquery');
    @endsection
