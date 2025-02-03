@extends('layouts.master')
@section('title')
    {{ __('common.query-list') }}
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')
    <body data-sidebar="colored">

    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('common.query-list') }}</h5>
                    @canany('Add Generate Query')
                    <div class="d-flex gap-2">
                        <a href="{{route('report.generator.add')}}"></span><button type="button" class="btn btn-primary btn-sm waves-effect"><i class="mdi mdi-plus-circle-outline"></i> {{__('common.create')}}</button></a>
                    </div>
                    @endcanany
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body  pt-2">
                            @include('reportgerator.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    <script>
    $(document).ready(function() {
        $('.delete_query').click(function() {

            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure you want to delete it',
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "POST",
                    url: "{{ route('query.delete') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        rec_id: id,
                    },
                    cache: false,
                    async: false,
                    success: function(response) {
                        if(response.status =='200'){
                            
                            toastr.success(response.message);
                            window.location.href = '{{ route("report.generator") }}';
                        }else if(response.status =='403'){
                            
                            toastr.error(response.message);
                        }else{
                           
                            toastr.error('Something went wrong !');
                        }

                    }
                });
                }
            })
        });
    });
</script>

    @endsection
