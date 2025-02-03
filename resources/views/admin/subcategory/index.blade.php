@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    Create Subcategory
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_two('Subcategory List','sub-category-add','setup'); @endphp

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod pt-3">

                    <div class="card-body ">
                        @include('admin.subcategory.table')
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @include('layouts.datatablejs')
    @endsection
