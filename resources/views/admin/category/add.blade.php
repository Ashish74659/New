@extends('layouts.master')
@section('title')
{{__('common.add-Category')}}
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
        @php echo App\Helpers\MasterHelper::header_title_one('common.add-Category', 'category-list'); @endphp
        <div class="settings-pg-header"></div>
        <form action="{{ route('category-store') }}" class="custom-validation" method="post" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="category_id" @if($data) value="{{base64_encode(convert_uuencode($data?->id))}}" @endif>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-bod">
                        <div class="card-body">
                            <div>
                                <div class="setting-title">
                                    <h4>{{__('common.Category-details')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.Category-code')}}</label>
                                            <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="code" maxlength="15" value="{{$data?->code}}" required @if($data) readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.Category-name')}}</label>
                                            <input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="name" maxlength="15" value="{{$data?->name}}" required @if($data) readonly @endif>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.PosType')}}</label>
                                            <select class="form-control select2" name="postype_id" required>
                                                <option>{{ __('common.select') }}</option> 
                                                @foreach($pos as $poss)
                                                    <option value="{{$poss?->id}}" @if($poss?->id == $data?->postype_id) selected @endif>{{$poss?->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.image')}}</label>
                                            <input type="file" class="form-control" aria-label="file example" name="image" onChange="validateFile(this,'image',1);" accept="image/*">                                            
                                        </div>
                                    </div>
 
                                    @if ($data?->image)
                                        <div class="new-logo ms-auto"> <a target="_blank" href="{{document_path($data?->image)}}"> <img src="{{document_path($data?->image)}}" height="50" width="50"> </a> </div>
                                    @endif
                                    

                                    <div class="col-md-3">

                                        <div class="mb-3">
                                            <label for="" class="mb-2">{{ __('common.SubCategory-list') }}</label>
                            
                            
                                            <div class="row align-items-center g-0">
                                                <div class="col-md-12">                                                                   
                                                    @foreach($subcategories as $poss)
                                                    <p class="mt-1 mb-0"><i class="mdi mdi-circle-medium text-dark me-2"></i> {{$poss?->name}}</p>                                                        
                                                    @endforeach                                                                                      
                                                </div>                     
                                            </div>
                                        </div>

              
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('common.description')}}</label>
                                            <textarea name="description" rows="3" class="form-control" onKeyPress="return $.alpha_num_space_period();">{{$data?->description}}</textarea>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="col-lg-12 text-end mb-3">
                                <a href="{{ route('category-list') }}"><button type="button" class="btn btn-sm btn-outline-dark">{{ __('common.cancel') }} </button></a>
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
