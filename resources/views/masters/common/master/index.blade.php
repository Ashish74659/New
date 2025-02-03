@extends('layouts.master')
@section('css')
    @include('layouts.datatablecss')
@endsection
@section('title')
    {{ __('common.' . $mod . '-list') }}
@endsection
@section('page-title')
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
                        @include('masters.common.master.table')
                        @include('masters.common.master.model')
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->
    @endsection
    @section('scripts')
        @include('keystroke')
        @include('layouts.datatablejs')
        @include('masters.common.master.jquery')
    @endsection
