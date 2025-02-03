@extends('layouts.master')
@section('css')
@include('layouts.sweetalertcss') 
@include('layouts.datatablecss') 
@endsection
@section('title')
    {{ __('common.permission-list') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection 
    @section('content')
        @php echo App\Helpers\MasterHelper::header('common.permission-list','common.user-mgt'); @endphp
        <div class="d-flex gap-2">
            <div class="position-relative">
                <a href="{{ route('permission.create') }}"><span class="btn-pos"><i class="mdi mdi-plus"></i></span><button
                        type="button" class="btn btn-back">{{ __('common.create') }}</button></a>
            </div>

            <div class="position-relative">
                <span class="btn-pos"><i class="mdi mdi-arrow-left"></i> <a
                        href="{{ url('master-setting/setup') }}"></span><button type="button" class="btn btn-back">
                    {{ __('common.back') }}</button>
                </a>
            </div>
        </div>
        @php echo App\Helpers\MasterHelper::footer(); @endphp

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('common.sr.no') }}</th>
                                    <th>{{ __('admin.permission-name') }}</th>
                                    <th>{{ __('common.reference') }}</th>
                                    <th>{{ __('admin.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_permission as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission?->Menu_details?->menuname }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-muted dropdown-toggle font-size-20" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('permission.edit', $permission->id) }}">{{ __('common.edit') }}</a>
                                                    <form action="{{ route('permission.destroy', $permission->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            class="dropdown-item delete">{{ __('common.delete') }}</button>
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
    @include('layouts.sweetalertjs') 
    @include('layouts.datatablejs') 
        <script>
             $(document).ready(function() {             
                $('.delete').click(function(e) {
                    var form = $(this).closest("form");
                    e.preventDefault()
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to delete it!",
                        timer: 10000,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                        return false;
                    })
                });
        });
        </script>
    @endsection
