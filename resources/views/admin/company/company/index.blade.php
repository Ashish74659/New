@extends('layouts.master')
@section('css')
@include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('company.company-list') }}
@endsection
@section('page-title')    
@endsection
@section('body')
    <body data-sidebar="colored">
    @endsection 
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_two('company.company-list', 'company-add','setup'); @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod pt-3">
                    <div class="card-body pt-2">
                        @include('admin.company.company.table')
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')          
    @include('layouts.datatablejs')
@endsection
     