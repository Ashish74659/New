@extends('layouts.master')
@section('css')
    @include('layouts.select2css')
@endsection
@section('title')
    Add Role
@endsection
@section('css')
@endsection
@section('page-title')
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        @php echo App\Helpers\MasterHelper::header('Add Role', 'common.home'); @endphp

        <div class="d-flex">
            <a href="{{ url('user/roles') }}">
                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"> <i
                        class="mdi mdi-arrow-left-bold-circle-outline"></i> {{ __('common.back') }} </button>
            </a>
        </div>


        @php echo App\Helpers\MasterHelper::footer(); @endphp
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-3">
                <div class="card card-bod">
                    <form action="{{ route('roles.store') }}" method="post" class="custom-validation">
                        @csrf
                        <div class="card-body">
                            <div class="row">


                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label for="" class="mb-0">{{ __('common.role-name') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control alphabets-space" name="name" required>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <label for="" class="mb-0">{{ __('common.description') }} </label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <label for="" class="mb-0">{{ __('common.reference') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Choose reference..." id="multiple-menus" required>
                                        <option value="All">{{ __('common.alll') }}</option>
                                        @foreach ($all_menus as $menu)
                                            <option value="{{ $menu?->id }}">{{ $menu?->menuname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-md-12">
                                    <div class="mb-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="">
                                                    <tr>
                                                        <th><input type="checkbox" class="form-control-sm" id="selectAll"
                                                                style="min-height: 10px;"></th>
                                                        <th>{{ __('common.permission') }}</th>
                                                        <th>{{ __('common.reference') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="permessions_list">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-primary btn-sm waves-effect waves-light">{{ __('common.save') }}</button>
                                    <button type="reset"
                                        class="btn btn-sm btn-secondary waves-effect waves-light">{{ __('common.back') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @include('layouts.select2js')
        @include('keystroke')
        <script>
            $(document).ready(function() {
                $("#multiple-menus").change(function() {
                    var ids = $(this).val();
                    $.ajax({
                        url: "{{ route('role-menusetting') }}",
                        type: "get",
                        data: {
                            _token: '{{ csrf_token() }}',
                            ids: ids,
                        },
                        cache: false,
                        async: false,
                        success: function(response) {
                            $('#permessions_list').html('');
                            $.each(response, function(index, data) {
                                $('#permessions_list').append(
                                    '<tr><td><input type="checkbox" class="checkone" value=' +
                                    data['id'] + ' name="permission[]"></td>' +
                                    '<td>' + data['name'] + '</td><td>' + data[
                                        'menu_details']['menuname'] + '</td></tr>');
                            });
                        }
                    });
                });
                $("#selectAll").click(function() {

                    $(".checkone").prop('checked', $(this).prop('checked'));
                });


                $(".checkone").click(function() {

                    if ($(".checkone:checked").length === $(".checkone").length) {
                        $("#selectAll").prop('checked', true);
                    } else {
                        $("#selectAll").prop('checked', false);
                    }
                });


                $("#selectAll").change(function() {
                    if (!$(this).prop('checked')) {
                        $(".checkone").prop('checked', false);
                    }
                });
            });
        </script>
    @endsection
