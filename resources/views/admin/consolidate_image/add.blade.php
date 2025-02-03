@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('common.' . $mod . '-images') }}
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('common.' . $mod . '-images','login'); @endphp


        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod pt-3">
                    <form action="{{ route('document-upload-image') }}" class="custom-validation" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="model" value="{{$mod}}"> 
                        <div class="card-body">
                            <table class="table table-hover dt-responsive align-middle mb-0 nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-prime">
                                    <tr>
                                        <th>{{ __('common.code') }}</th>
                                        <th>{{ __('common.name') }}</th>
                                        <th>{{ __('common.image') }}</th> 
                                        <th style="width:300px;">{{ __('common.upload') }}</th>                                    
                                    </tr>
                                </thead> 
                                <tbody id="myTable">
                                    @foreach ($data as $dat)
                                        <tr>
                                            <td>{{ $dat->code }}</td>
                                            <td>{{ $dat->name }}</td>
                                            <td><a href="{{document_path($dat->$col)}}" target="_blank"><img src="{{document_path($dat->$col)}}" class="avatar-xs rounded-circle me-2"></a> </td>	                
                                            <td style="width:300px;"><input type="hidden" name="id[]" value="{{$dat?->id}}"> 

                                                <input type="file" class="form-control" aria-label="file example" name="image[]" onChange="validateFile(this,'image',1);" accept="image/*"> 

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <div class="col-lg-12 text-end mb-3">                            
                            <button type="submit" value="create" name="save" class="btn btn-sm btn-primary">{{ __('common.upload') }}</button>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @include('keystroke')
    @endsection
