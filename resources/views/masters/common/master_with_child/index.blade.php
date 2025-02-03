@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('company.company-list') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::master_header_title('common.'.$mod.'-list','setup'); @endphp


        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod">

                    <div class="card-body pt-2">
                        <input type="hidden" id="mod" value="{{ $mod }}">
                        <input type="hidden" id="parent" value="{{ $parent }}">

                        @include('masters.common.master_with_child.table')
                        @include('masters.common.master_with_child.model')
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->
    @endsection
    @section('scripts')
        @include('keystroke')
        @include('layouts.datatablejs')
        @include('masters.common.master_with_child.jquery')
    @endsection
