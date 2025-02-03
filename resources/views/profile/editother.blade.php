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
        @php echo App\Helpers\MasterHelper::header_title_one('Vendor Information View','vendor-quotation-list'); @endphp


        <div class="card">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-per mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="col-md-2"> <img src=" {{ URL::asset('/build/images/profile/user.svg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-10 pt-3 ps-2">
                                    <h6 class="mb-0">Contact Person Name</h6>
                                    <p class="pt-0 font-size-12">+286 XXX XXX XXX</p>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/Group.png') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Vendor Id</b> </span>
                                </div>
                                <p class="mb-0 font-size-12"> V-0000000XX</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/mail.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Email Id</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">rakh@gmail.com</p>
                            </div>


                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/company_svgrepo.com.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Company Name</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">Amysoftech</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/document-file-paper-25_svgrepo.com.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Vendor Type</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">Organization</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/globe.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Nationality</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">Zimbabwe</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/billing.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Billing Address</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">asd</p>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/home.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Primary Address</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">asd</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/currency.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Currency </b> </span>
                                </div>
                                <p class="mb-0 font-size-12">UAE Dirham</p>
                            </div>
                        </div>
						
						  <h5 class="text-head">Account Information</h5>
						<div class="table-responsive" data-simplebar style="max-height: 400px;">
                        <div class="contact-per mb-4">


                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/account.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Account Holder Name </b> </span>
                                </div>
                                <p class="mb-0 font-size-12">Alex</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/id-wallet.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Account Number</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">3215376879</p>
                            </div>






                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/code-signing.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Bank Name</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">PNB</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/money-pin.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Bank Branch & Address</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">wefgrg</p>
                            </div>




                        </div>
						<div class="contact-per mb-4">


                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/account.svg') }}"
                                        alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Account Holder Name </b> </span>
                                </div>
                                <p class="mb-0 font-size-12">Alex</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/id-wallet.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Account Number</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">3215376879</p>
                            </div>






                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/code-signing.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Bank Name</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">PNB</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <img src=" {{ URL::asset('/build/images/profile/money-pin.svg') }}" alt="">
                                    <span class="mb-0 ms-2 font-size-12"><b>Bank Branch & Address</b> </span>
                                </div>
                                <p class="mb-0 font-size-12">wefgrg</p>
                            </div>




                        </div>
						</div>
                    </div>
					
					
					
                    <div class="col-md-8">

                        <h5 class="text-head">Company Details</h5>

                        <div class="contact-per mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/calendar.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Company Founding year</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">1997</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/number-row.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>CR Number </b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">25</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-hierarchy.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Type of Business </b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">V-0000000XX</p>
                                    </div>
									<div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-growt.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Business classification </b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">Classification</p>
                                    </div>
									<div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/chain.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Chain</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">Chain</p>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/business-global.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Website</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">work@email.com</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/employee-group.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Number of employee</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">80</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/star-emphasis.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Line of business</b>
                                            </span>
                                        </div>
                                        <p class="mb-0 font-size-12">Yes</p>
                                    </div>
									
									<div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/subttasks.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Sub segment</b>
                                            </span>
                                        </div>
                                        <p class="mb-0 font-size-12">Segment</p>
                                    </div>
									
									

                                </div>
                            </div>
                        </div>
						
						
						 <h5 class="text-head">Tax & Billing Info</h5>

                        <div class="contact-per mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/cash-register.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>TAX Registration Number </b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">rthyrj5675rfcg</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/card.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Method of Payment</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">Card</p>
                                    </div>
                                     



                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/id-card.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Terms of Payment</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">10% ad</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="">
                                            <img src=" {{ URL::asset('/build/images/profile/delivery.svg') }}"
                                                alt="">
                                            <span class="mb-0 ms-2 font-size-12"><b>Delivery Terms</b> </span>
                                        </div>
                                        <p class="mb-0 font-size-12">1 Day</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                         


  <h5 class="text-head">Documents</h5>

                        <div class="contact-per mb-4 p-0">

                            <div class="table-responsive" data-simplebar style="max-height: 220px;">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="bg-tab">
                                        <tr>

                                            <th class="radius">SN</th>
                                            <th>Document Name</th>
                                            <th>Format </th>
                                            <th>Size</th>
                                            <th class="radius2"> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td> 1</td>

                                            <td>
                                                Company Certificate
                                            </td>
                                            <td>
                                                Pdf
                                            </td>
                                            <td>
                                                578kb
                                            </td>
                                            <td>
                                                <i class="mdi mdi-cloud-upload font-size-22"></i>
                                            </td>


                                        </tr>

                                        <tr>

                                            <td> 2</td>

                                            <td>
                                                Company Certificate
                                            </td>
                                            <td>
                                                Pdf
                                            </td>
                                            <td>
                                                578kb
                                            </td>
                                            <td>
                                                <i class="mdi mdi-cloud-upload font-size-22"></i>
                                            </td>


                                        </tr>

                                        <tr>

                                            <td> 3</td>

                                            <td>
                                                Company Certificate
                                            </td>
                                            <td>
                                                Pdf
                                            </td>
                                            <td>
                                                578kb
                                            </td>
                                            <td>
                                                <i class="mdi mdi-cloud-upload font-size-22"></i>
                                            </td>


                                        </tr>

                                        <tr>

                                            <td> 4</td>

                                            <td>
                                                Company Certificate
                                            </td>
                                            <td>
                                                Pdf
                                            </td>
                                            <td>
                                                578kb
                                            </td>
                                            <td>
                                                <i class="mdi mdi-cloud-upload font-size-22"></i>
                                            </td>


                                        </tr>




                                    </tbody>
                                </table>
                            </div>

                        </div>
						
						
						<h5 class="text-head">Conflict of Interest</h5>

                        <div class="contact-per mb-4 p-0">

                            <div class="table-responsive" data-simplebar style="max-height: 220px;">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="bg-tab">
                                        <tr>

                                            <th class="radius">SN</th>
                                            <th>Contact Name</th>
                                            <th>Relation </th>
                                            <th>Designation</th>
                                            <th class="radius2"> Contact Number </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td> 1</td>

                                            <td>
                                               Name 1
                                            </td>
                                            <td>
                                                Owner
                                            </td>
                                            <td>
                                               CEO
                                            </td>
                                            <td>
                                                99999999999
                                            </td>


                                        </tr>
										<tr>

                                            <td> 2</td>

                                            <td>
                                               Name 2
                                            </td>
                                            <td>
                                                Admin
                                            </td>
                                            <td>
                                               Manager
                                            </td>
                                            <td>
                                                99999999999
                                            </td>


                                        </tr>
										<tr>

                                            <td> 3</td>

                                            <td>
                                               Name 3
                                            </td>
                                            <td>
                                                Employee
                                            </td>
                                            <td>
                                               Software Developer
                                            </td>
                                            <td>
                                                99999999999
                                            </td>


                                        </tr>

                                         

                                        




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
