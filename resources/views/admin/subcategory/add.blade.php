@extends('layouts.master')
@section('title')
{{__('common.add-SubCategory')}}
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
        @php echo App\Helpers\MasterHelper::header_title_one('common.add-SubCategory', 'sub-category-list'); @endphp
        <div class="settings-pg-header"></div>
        <form action="{{ route('sub-category-store') }}" class="custom-validation" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="subcategory_id" @if($data) value="{{base64_encode(convert_uuencode($data?->id))}}" @endif>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-bod">
                        <div class="card-body">
                            <div>
                                <div class="setting-title">
                                    <h4>{{__('common.SubCategory-details')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.SubCategory-code')}}</label>
                                            <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="code" maxlength="15" value="{{$data?->code}}" required @if($data) readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.SubCategory-name')}}</label>
                                            <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="name" maxlength="15" value="{{$data?->name}}" required @if($data) readonly @endif>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.Category-name')}}</label>
                                            <select class="form-control select2" name="category_id">
                                                <option>{{ __('common.select') }}</option> 
                                                @foreach($cat as $poss)
                                                    <option value="{{$poss?->id}}" @if($poss?->id == $data?->category_id) selected @endif>{{$poss?->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.description')}}</label>
                                            <textarea name="description" rows="3" class="form-control" onKeyPress="return $.alpha_num_space_period();">{{$data?->description}}</textarea>
                                        </div>
                                    </div>



                                </div>
                            </div>



                            <div class="col-lg-12 text-end mb-3">
                                <a href="{{ route('sub-category-list') }}"><button type="button" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button></a>
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('common.submit') }}</button>
                            </div>





                        </div>

                    </div>

                </div>



            </div>
        </form>
    @endsection
    @section('scripts')
    @include('layouts.select2js') 
    @include('layouts.formvalidationjs')  
    @endsection
