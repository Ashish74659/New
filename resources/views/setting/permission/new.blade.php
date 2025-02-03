@extends('layouts.master')
@section('title')
    {{ __('admin.create-permission') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('css')
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection 
    @section('content')
        @php echo App\Helpers\MasterHelper::header('admin.create-permission', 'common.home'); @endphp
        <div class="position-relative">
            <span class="btn-pos"><i class="mdi mdi-arrow-left"></i> <a href="{{ url('user/permission') }}"></span><button
                type="button" class="btn btn-back"> {{ __('common.back') }}</button>
            </a>
        </div>


        @php echo App\Helpers\MasterHelper::footer(); @endphp


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body ">

                        <form action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data"
                            class="custom-validation" novalidate>
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-md-12" id="is_cust_yes">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">{{ __('admin.menu-setting') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select2" name="menu_setting">
                                                <option value="">{{ __('common.chooseoption') }}</option>
                                                @foreach ($menuset as $menuName)
                                                    <option value="{{ $menuName?->id }}"
                                                        @if ($permission?->menu_id == $menuName?->id) selected @endif>
                                                        {{ $menuName?->menuname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">{{ __('admin.permission-name') }} <span
                                                    class="text-danger">*</span></label>
                                            @if ($permission?->name)
                                                <input type="text" name="permission_name" class="form-control"
                                                    value="{{ $permission?->name }}" readonly>
                                            @else
                                                <input type="text" name="permission_name" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 text-end">
                                <button type="reset"
                                    class="btn btn-sm btn-secondary waves-effect waves-light">{{ __('common.reset') }}</button>
                                @if ($permission)
                                    <input type="hidden" name="permission_id"
                                        value="{{ base64_encode(convert_uuencode($permission?->id)) }}">
                                    <button type="submit"class="btn btn-sm btn-primary waves-light"><span class="me-1"><i
                                                class="mdi mdi-plus-circle-outline"></i></span>{{ __('common.update') }}
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-primary waves-light"><span
                                            class="me-1"><i
                                                class="mdi mdi-plus-circle-outline"></i></span>{{ __('common.create') }}
                                    </button>
                                @endif

                            </div>
                    </div>


                </div>
                </form>
            </div>
        </div>
    @endsection
    @section('internalpagejs')
    @endsection
