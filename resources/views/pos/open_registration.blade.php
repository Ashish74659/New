@extends('layouts.master-without-nav')
@section('title')
    {{__('pos.open-register')}}
@endsection
@section('content')
    <div class="auth-error d-flex align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div>
                        <div class="text-center mb-4">
                            <div class="mt-5">
                                <div class="card rounded-4 p-5 open-reg cursor">
                                    <div class="card-body">
                                        <div data-bs-toggle="modal" data-bs-target=".open-modal">
                                            <img src="{{ URL::asset('build/images/pos-img/shop-basket.png') }}" alt="" width="100px">
                                            <h6 class="mt-3 font-size-16">{{__('pos.open-register')}}</h6>
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


    <div class="modal fade open-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('pos.opening-control')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pos-emp-start') }}" class="custom-validation" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">{{__('pos.opening-cash')}}</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" required onKeyPress="return $.numeric_period();" name="initial_cash">
                                    <button class="btn btn-light ms-1"><i class="mdi mdi-cash font-size-24"></i></button>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">{{__('pos.opening-note')}}</label>
                                <textarea class="form-control" rows="3" onKeyPress="return $.alpha_num_space_period();" name="initial_note"></textarea>
                            </div>

                            <div class="col-md-12 mb-3 text-end">                                
                                <button type="submit" class="btn btn-sm btn-primary"><i class="mdi mdi-content-save-alert-outline"></i> {{__('pos.open-register')}}</button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
@endsection
@section('scripts')
@include('keystroke') 
@include('layouts.formvalidationjs') 
@endsection
