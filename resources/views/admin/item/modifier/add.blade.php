@extends('layouts.master')
@section('title')
{{ __('item.create-add-on') }}
@endsection
@section('page-title') 
@endsection
@section('css')
@include('layouts.select2css')  
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('item.create-add-on', 'modifier-list'); @endphp
        <div class="settings-pg-header"></div>
        <form action="{{ route('modifier-store') }}" method="post" class="custom-validation" enctype="multipart/form-data" onsubmit="return $.validate_form()">
            @csrf 
            <div class="card card-bod">
                <div class="card-body">
                    <div>
                        <div class="setting-title">
                            <h4>{{ __('item.add-on-details') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="hidden" name="modifier_header_id" @if($data) value="{{base64_encode(convert_uuencode($data?->id))}}" @endif>
                                    <label class="form-label">{{ __('common.code') }}</label>
                                    <input type="text" class="form-control" placeholder="Code will be generated automatically" value="{{$data?->code}}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('common.names') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{$data?->name}}" name="name" @if($data) readonly @endif required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('common.description') }}</label>
                                    <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="description" value="{{$data?->description}}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 text-end mb-3">
                        <a href="{{ route('item-list') }}"><button type="button" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button></a>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button>
                    </div> 
                </div>

            </div>

            <div class="card card-bod">
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom mb-3 pb-3">
                        <div class="setting-title">
                            <h4 class="mb-0 border-0 pb-0">{{ __('item.add add-ons-on-product') }}</h4>
                        </div>
                        <div class="setting-title">
                            <button type="button" class="btn btn-sm btn-primary" onclick="$.addRowButton()"><i class="mdi mdi-plus-circle"></i> {{ __('common.add') }}</button>
                            {{-- <button type="button" class="btn btn-sm btn-primary" id="saveButton"><i class="mdi mdi-content-save-alert-outline"></i> {{ __('common.save') }}</button> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover dt-responsive align-middle mb-0 nowrap">

                                <thead class="bg-prime">
                                    <tr>
                                        <th>{{ __('item.product-code') }}</th>
                                        <th>{{ __('item.product-name') }}</th>
                                        <th>{{ __('item.modifier-name') }}</th>
                                        <th>{{ __('common.price') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="products_list">
                                    @foreach ($lines as $ln)
                                    <tr>
                                        <td> <select class="form-control select2" name="item_id[]"><option value="{{$ln?->item?->id}}">{{$ln?->item?->code}} @if($ln?->item?->code)/@endif {{$ln?->item?->name}}</option>  </select> </td>
                                        <td><input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{$ln?->item_name}}" name="item_name[]" required @if($ln?->item_id) readonly @endif></td>
                                        <td><input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" value="{{$ln?->modifier_name}}" name="modifier_name[]" required></td>
                                        <td> <input type="text" value="{{$ln?->price}}" class="form-control" onKeyPress="return $.numeric_period();" name="price[]" required></td>
                                        <td><i class="mdi mdi-trash-can-outline me-2 font-size-18 text-danger" onclick="$.delete_one_html(this)"></i></td>
                                    </tr>
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    @endsection
    @section('scripts')
    @include('keystroke')
    
    @include('layouts.select2js')  
    @include('layouts.formvalidationjs')
    @include('admin.item.modifier.extrajs')              
    @endsection
