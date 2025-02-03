@extends('layouts.master')
@section('title')
    {{ __('email.email-template-add') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection



@section('body')

    <body data-sidebar="colored">
    @endsection
    {{-- @include('common-components.pages-heads') --}}
    @section('content')
        @php echo App\Helpers\MasterHelper::header_title_one('email.email-template-add','email-template-list'); @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod">
                    <div class="card-body">
                        <form action="{{ route('email-template-store') }}" method="post">
                            @csrf
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">{{ __('common.EmailMaster') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="hidden"
                                                @if ($email_template) value="{{ base64_encode(convert_uuencode($email_template?->id)) }}" @endif
                                                name="email_template_id">
                                            <select name="email_master_id" id="email_master_id" class="form-control"
                                                required onchange="get_variables(0)">
                                                <option value="">{{ __('common.chooseoption') }}</option>
                                                @foreach ($emailmaster as $emails)
                                                    <option value="{{ $emails?->id }}"
                                                        @if ($email_template?->email_master_id == $emails?->id) selected @endif>
                                                        {{ $emails?->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="">{{ __('email.available-variables') }}</label>
                                            <input class="form-control" name="veriable" id="veriable" type="text"
                                                required readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="">{{ __('common.names') }}<span
                                                    class="text-danger">*</span></label>
                                            <input name="name" type="text" value="{{ $email_template?->name }}"
                                                class="form-control" id="name" alt="blank" maxlength="100" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="">{{ __('email.subject') }}<span
                                                    class="text-danger">*</span></label>
                                            <input name="subject" type="text" value="{{ $email_template?->subject }}"
                                                class="form-control" id="subject" alt="blank" maxlength="255" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">{{ __('email.content') }}<span
                                                    class="text-danger">*</span></label>
                                            <textarea id="elm1" name="content">{{ $email_template?->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm waves-effect">
                                    {{ __('common.submit') }} </button>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="{{ URL::asset('build/libs/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
        <script>
            function get_variables(id) {
                var email_master_id = '';
                if (id == 0) {
                    email_master_id = document.getElementById('email_master_id').value;
                } else {
                    email_master_id = id;
                }
                $('#veriable').val('');

                if (email_master_id) {
                    $.ajax({
                        url: "{{ route('get-email-master') }}",
                        method: 'POST',
                        data: {
                            email_master_id: email_master_id,
                            _token: '{{ csrf_token() }}'
                        },
                        cache: false,
                        async: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            $('#veriable').val(dataResult.variables);
                            if (dataResult.statusCode != 200) {
                                error("error", "Something went wrong");
                                $('#veriable').val('');
                            }
                        }
                    });
                } else {
                    $('#veriable').val('');
                }
            }

            var old_email_master_id = "<?php echo $email_template?->email_master_id; ?>";
            if (old_email_master_id > 0) {
                get_variables(old_email_master_id);
            }
        </script>
    @endsection
