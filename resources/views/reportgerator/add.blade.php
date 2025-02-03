@extends('layouts.master')
@section('title')
{{ __('common.report-generator') }}
@endsection
@section('page-title')
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')
    <div class="container">
        <h4>{{ __('common.report-generator') }}</h4>
        <form>
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="name">{{__('common.report-name')}}<span class="text-danger">*</span></label>
                        <input type="text" id="rename" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="query">{{__('common.description')}}<span class="text-danger">*</span></label>
                        <textarea id="requery" name="description" class="form-control" rows="5" required></textarea>
                    </div>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="button" class="btn btn-primary btn-sm theadersave">{{ __('common.save-report') }}</button>
            </div>
        </form>
    </div>
    <div class="text-end mt-4">
        <button type="button" id="subcolumn" class="btn btn-primary w-10 btn-sm subtablecolum">{{ __('common.submit') }}</button>
        <button type="button" id="add-row" class="btn btn-primary btn-sm">{{__('common.add-row')}}</button>
    </div>
    <div class="container" id ="column_maping">
        {!! Form::open(['method' => 'POST']) !!}
        <div class="" id="dynamic_row">
            <div class="row mb-4">
                <input type="hidden" id="header_id"  name="header_id">
                <div class="form-group col-md-3 ">
                    <label for="table_header" class="form-label">{{ __('common.Table-Header-Name') }}</label>

                    {!! Form::text('table_header[]', old('table_header[]'), [
                    'class' => 'form-control',
                    'id' => 'table_header',
                    'readonly' => false,
                    ]) !!}
                </div>
                <div class="form-group col-md-3  ">
                    <label for="dbcolumn" class="form-label">{{ __('common.column-name') }}</label>

                    {!! Form::text('dbcolumn[]', old('dbcolumn[]'),[
                    'class' => 'form-control',
                    'id' => 'dbcolumn',
                    'readonly' => false,
                    ]) !!}
                </div>
                <div class="form-group col-md-3  ">
                <label for="relation" class="form-label">{{ __('common.relation-name') }}</label>
                    {!! Form::text('relation[]', old('relation[]'),[
                    'class' => 'form-control',
                    'id' => 'relation',
                    'readonly' => false,
                    ]) !!}
                </div>
            </div>
            <div class="row mb-4">
                <div class="form-group col-md-3 ">
                    {!! Form::text('table_header[]', old('table_header[]'), [
                    'class' => 'form-control',
                    'id' => 'table_header',
                    'readonly' => false,
                    ]) !!}
                </div>
                <div class="form-group col-md-3  ">
                    {!! Form::text('dbcolumn[]', old('dbcolumn[]'),[
                    'class' => 'form-control',
                    'id' => 'dbcolumn',
                    'readonly' => false,
                    ]) !!}
                </div>


                <div class="form-group col-md-3  ">
                    {!! Form::text('relation[]', old('relation[]'),[
                    'class' => 'form-control',
                    'id' => 'relation',
                    'readonly' => false,
                    ]) !!}
                </div>
            </div>
            <div class="row mb-4">
                <div class="form-group col-md-3 ">
                    {!! Form::text('table_header[]', old('table_header[]'), [
                    'class' => 'form-control',
                    'id' => 'table_header',
                    'readonly' => false,
                    ]) !!}
                </div>
                <div class="form-group col-md-3  ">
                    {!! Form::text('dbcolumn[]', old('dbcolumn[]'),[
                    'class' => 'form-control',
                    'id' => 'dbcolumn',
                    'readonly' => false,
                    ]) !!}
                </div>

                <div class="form-group col-md-3  ">

                    {!! Form::text('relation[]', old('relation[]'),[
                    'class' => 'form-control',
                    'id' => 'relation',
                    'readonly' => false,
                    ]) !!}
                </div>
            </div>
            <div class="row mb-4">
                <div class="form-group col-md-3 ">
                    {!! Form::text('table_header[]', old('table_header[]'), [
                    'class' => 'form-control',
                    'id' => 'table_header',
                    'readonly' => false,
                    ]) !!}
                </div>
                <div class="form-group col-md-3  ">
                    {!! Form::text('dbcolumn[]', old('dbcolumn[]'),[
                    'class' => 'form-control',
                    'id' => 'dbcolumn',
                    'readonly' => false,
                    ]) !!}
                </div>


                <div class="form-group col-md-3  ">

                    {!! Form::text('relation[]', old('relation[]'),[
                    'class' => 'form-control',
                    'id' => 'relation',
                    'readonly' => false,
                    ]) !!}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    @endsection
    @section('scripts')
    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            // Create a new row
            const newRow = document.createElement('div');
            newRow.className = 'row mb-4';

            newRow.innerHTML = `
                <div class="form-group col-md-3">

                    <input type="text" name="table_header[]" class="form-control" />
                </div>
                <div class="form-group col-md-3">

                    <input type="text" name="dbcolumn[]" class="form-control" />
                </div>
                <div class="form-group col-md-3">

                    <input type="text" name="relation[]" class="form-control" />
                </div>
                <div class="col-md-1 align-self-center">
                    <button type="button" class="btn btn-danger remove-row" ><span><i class="mdi mdi-trash"></i></span>&times;</button>
                </div>
            `;
 
            document.getElementById('dynamic_row').appendChild(newRow);
             newRow.querySelector('.remove-row').addEventListener('click', function() {
            newRow.remove();
    });
        });
    </script>




    <script>
        $(document).ready(function () {
            $('#column_maping').hide();
            $('#add-row').attr('disabled','true');
            $('#subcolumn').attr('disabled','true');
            $('.theadersave').click(function () {
                const name = $('#rename').val();
                const desc = $('#requery').val();
                const headerid = $('#header_id').val();

                if(name != '' && desc !=""){
                    $.ajax({
                        url: "{{ route('save.header.report') }}",
                        method: 'post',
                        data: {
                            name: name,
                            headerid:headerid,
                            desc: desc,
                            _token: '{{ csrf_token() }}'
                        },
                        cache: false,
                        async: false,
                        success: function (response) {
                            if(response.status=='200'){
                                $('#rename').val(response?.data.name);
                                $('#requery').val(response?.data.description);
                                $('#header_id').val(response?.data.id);
                             
                                toastr.success("Record Added successfully !");

                                $('#column_maping').show();
                                $('#add-row').removeAttr('disabled');
                                $('#subcolumn').removeAttr('disabled');
                            }else if(response.status =='422'){
                                $('#column_maping').hide();
                                $('#add-row').attr('disabled','true');
                                $('#subcolumn').attr('disabled','true');
                                
                                toastr.error("Unprocessable content");
                            }else if(response.status =='409'){
                                $('#column_maping').hide();
                                $('#add-row').attr('disabled','true');
                                $('#subcolumn').attr('disabled','true');
                                
                                toastr.warning(response.message);
                            }else{
                                $('#column_maping').hide();
                                $('#add-row').attr('disabled','true');
                                $('#subcolumn').attr('disabled','true');
                             
                                toastr.error("Something went wrong !");
                            }

                        }
                    });
                }else{
                     
                    toastr.warning("All fields are mandatory");
                }
            });
        });

    </script>



<script>
        $(document).ready(function () {
            $('.subtablecolum').click(function (e) {
                var formData = {
                    table_header: $('input[name="table_header[]"]').map(function() { return $(this).val(); }).get(),
                    dbcolumn: $('input[name="dbcolumn[]"]').map(function() { return $(this).val(); }).get(),
                    relation: $('input[name="relation[]"]').map(function() { return $(this).val(); }).get(),
                    header_id: $('#header_id').val(),
                    _token: $('input[name="_token"]').val() // CSRF token
                };
                $.ajax({
                    url: "{{ route('store.report') }}",
                    method: 'post',
                    data: {
                        data:formData,
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,
                    async: false,
                    success: function (response) {
                        if(response.status=='200'){
                            
                            toastr.success("Record Added successfully !");
                                window.location.href = '{{ route("report.generator") }}';
                        }else{
                           
                            toastr.error("Something went wrong");
                        }

                    }
                });
            });
        });

    </script>

    @endsection
