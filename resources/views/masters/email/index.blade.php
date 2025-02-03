@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('email.email-template-list') }}
@endsection
@section('page-title')
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    {{-- @include('common-components.pages-heads') --}}
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_two('email.email-template-list','email-template-add','setup'); @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod">

                    <div class="card-body pt-2">
                        @include('masters.email.table')
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @include('layouts.datatablejs')
    @endsection
