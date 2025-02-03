@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('item.item-list') }}
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="d-flex flex-wrap justify-content-between">
                    <h5 class="mb-0">{{ __('item.item-list') }}</h5>
                    <div class="d-flex justify-content-between gap-1">
                        <button type="button" data-bs-toggle="modal" data-bs-target=".upload-header" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-cloud-upload-outline"></i> {{ __('item.upload-item-header') }} </button>
                        <button type="button" data-bs-toggle="modal" data-bs-target=".upload-item" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-cloud-upload-outline"></i> {{ __('item.upload-warehouse-item') }} </button>
                        <a href="{{route('item-add')}}"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-plus-circle-outline"></i> {{ __('common.add') }} </button></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- @php echo App\Helpers\MasterHelper::header_title_two('item.item-list','item-add','setup'); @endphp --}}
        {{-- <input type="hidden" class="form-control" name="file_type" value="company_item" required>             --}}
        {{-- <form action="{{ route('upload-item-master') }}" class="custom-validation" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" aria-label="file example" name="uploaded_file"
                onChange="validateFile(this,'excel',1);" accept=".csv,.xlsx,.xls" required>
            <button type="submit" class="btn btn-sm btn-primary">{{ __('common.submit') }}</button>
        </form> --}}

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod pt-3">
                    <div class="card-body ">
                        @include('admin.item.table')
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade upload-header" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ __('item.upload-item-header') }}  </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload-item-master') }}" class="custom-validation" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="file_type" value="item_header" required>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <a class="exportLink"
                                        href="{{ route('download-template', ['type' => base64_encode(convert_uuencode('item_header'))]) }}">
                                        <i class="mdi mdi-cloud-download-outline"></i> {{ __('item.item-header-sample') }}</a> 
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for=""> {{ __('item.upload-item-header') }} </label>
                                    <div class="d-flex">
                                        <input type="file" class="form-control" aria-label="file example" name="uploaded_file" onChange="validateFile(this,'excel',1);" accept=".csv,.xlsx,.xls" required>
                                    </div>
                                </div>
                                <div class="col-md-12  text-end">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('common.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade upload-item" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ __('item.upload-warehouse-item') }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload-item-master') }}" class="custom-validation" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="file_type" value="company_item" required>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <a class="exportLink"
                                        href="{{ route('download-template', ['type' => base64_encode(convert_uuencode('company_item'))]) }}">
                                        <i class="mdi mdi-cloud-download-outline"></i> {{ __('item.company-item-sample') }}</a> 
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for=""> {{ __('item.upload-warehouse-item') }} </label>
                                    <div class="d-flex">
                                        <input type="file" class="form-control" aria-label="file example" name="uploaded_file" onChange="validateFile(this,'excel',1);" accept=".csv,.xlsx,.xls" required>
                                    </div>
                                </div>
                                <div class="col-md-12  text-end">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('common.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @include('layouts.datatablejs')
        @include('layouts.export_importjs')
    @endsection
