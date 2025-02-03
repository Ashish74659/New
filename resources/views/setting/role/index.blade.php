@extends('layouts.master')
@section('css')
    @include('layouts.sweetalertcss')
    @include('layouts.datatablecss')
@endsection
@section('title')
    Role List
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header('common.role-list','common.user-mgt'); @endphp
        <div class="d-flex gap-2">

            <div class="d-flex gap-1">
                <a href="{{ route('create-role') }}"> <button type="button"
                        class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-plus-circle-outline"></i>
                        {{ __('common.create') }} </button></a>

                <a href="{{ url('master-setting/setup') }}"> <button type="button"
                        class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-plus-circle-outline"></i>
                        {{ __('common.back') }} </button></a>
            </div>

        </div>
        @php echo App\Helpers\MasterHelper::footer(); @endphp

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-3">
                <div class="card card-bod">
                    <div class="card-body">
                        <table id="datatable" class="table table-hover dt-responsive align-middle mb-0 nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-prime">
                                <tr>
                                    <th style="width:10%">{{ __('common.sr.no') }}</th>
                                    <th style="width: 20%">{{ __('admin.role-name') }}</th>

                                    <th style="width: 15%">{{ __('common.total-permission') }}</th>
                                    <th style="width: 5%">{{ __('admin.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td style="width:10%">{{ $loop->iteration }}</td>
                                        <td style="width: 20%">{{ $role->name }}</td>
                                        <td style="width: 15%">
                                            <span class="badge rounded-pill badge-soft-primary ">
                                                {{ $role->permissions->count() }}</span>
                                        </td>
                                        <td style="width: 5%">
                                            <div class="dropdown">
                                                <a class="text-muted dropdown-toggle font-size-20" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ url('user/roles/' . $role->id . '/edit') }}"><i
                                                            class="mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted">
                                                        </i>{{ __('common.edit') }}</a>
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="dropdown-item delete" href="#"><i
                                                                class="mdi mdi-trash-can-outline font-size-16 align-middle me-2 text-muted"></i>
                                                            {{ __('common.delete') }}</a>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @include('layouts.datatablejs')
        @include('layouts.sweetalertjs')
        @include('setting.role.extrajs')
    @endsection
