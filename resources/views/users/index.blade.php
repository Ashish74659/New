@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('company.users-list') }}
@endsection

@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    {{-- @include('common-components.pages-heads') --}}
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_two('company.users-list','user-add','setup'); @endphp
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-bod">
                    <div class="card-body table-responsive">
                        @include('users.table')
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @include('layouts.datatablejs')
    @endsection
