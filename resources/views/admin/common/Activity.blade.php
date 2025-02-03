<div id="accordion" class="custom-accordion">
    <div class="card mb-0 mt-0 shadow-none">
        <a href="#collapseTwo" class="text-dark px-0 py-3 border-bottom" data-bs-toggle="collapse" aria-expanded="true"
            aria-controls="collapseTwo">
            <div class="" id="headingTwo">
                <h6 class=" m-0"><b>{{__('common.activity')}}</b> <i
                        class="mdi mdi-minus float-end accor-plus-icon"></i>
                </h6>
            </div>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion" style="">
            <div class="border rounded-3 p-3 mt-3">
                <div class="col-lg-12 col-xl-12 col-md-12 border-bottom">
                    <ul class="nav nav-tabs view-tab nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Notes" role="tab"
                                aria-selected="false" tabindex="-1"><span class="d-block d-sm-none"><i
                                        class="far fa-user"></i></span><span class="d-none d-sm-block">
                                    {{__('common.activity')}} </span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#Audit_trail" role="tab"
                                aria-selected="false" tabindex="-1"><span class="d-block d-sm-none"><i
                                        class="far fa-user"></i></span><span
                                    class="d-none d-sm-block">{{__('common.comments')}}</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#workflow" role="tab" aria-selected="false"
                                tabindex="-1"><span class="d-block d-sm-none"><i class="far fa-user"></i></span><span
                                    class="d-none d-sm-block">{{__('common.Workflow')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="Notes" role="tabpanel" data-simplebar style="max-height: 350px;">
                    <div class="border rounded-3 p-3">

                        <div class="card-body table-responsive">
                            <div>
                                <ul class="activity-feed activity_tab mb-0 ps-2">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="Audit_trail" role="tabpanel" data-simplebar style="max-height: 350px;">
                    <div class="border rounded-3 p-3">
                        <div class="text-end">
                            <a href="#" data-bs-toggle="modal" class="text-info"
                                data-bs-target="#Addnote"><i
                                    class="mdi mdi-comment-edit-outline"></i>
                            {{__('common.add-comment')}}</a>
                        </div>
                        <div class="card-body table-responsive">
                            <div>
                                <ul class="activity-feed comment_tab mb-0 ps-2">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="workflow" role="tabpanel" data-simplebar style="max-height: 350px;">
                    <div class="border rounded-3 p-3">


                        <div class="card-body table-responsive workflow_tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="reassign-workflow" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg">
        <h5 class="mb-0">{{ __('company.reassignment') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <form action="{{ route('workflow.assign') }}" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="line_id" id="line_id" value="">
        <div class="offcanvas-body">

            <div class="mb-3">
                <label for=""> Reassign To <span class="text-danger">*</span></label>
                <select name='reassign' id="reassign" class="form-control" required>
                </select>
            </div>





            <div class="offcanvas-footer pb-4 ps-3 pe-3 modal-footer">
                <div class="text-end">

                    <button type="reset" class="btn btn-secondary btn-sm waves-effect"
                        data-bs-dismiss="offcanvas">
                        {{ __('common.close') }} </button>
                    <button type="submit"
                        class="btn btn-primary btn-sm waves-effect waves-light me-1 master_add">
                        {{ __('company.assign') }}
                    </button>

                </div>

            </div>

        </div>

    </form>
</div>


<script>
$(document).ready(function() {
    var source_id = $('#activity_source_id').val();
    var source = $('#activity_source').val();
    list_log();
    list_workflow_log();
    doc_workflow_list();

    function list_log() {
        $.ajax({
            url: "{{ route('activity-log-list') }}",
            type: 'Get',
            dataType: 'json',
            data: {
                source_id: source_id,
                source: source
            },
            success: function(response) {
                if (response.data) {
                    $('.activity_tab').empty();
                    response.data.forEach(function(item, index) {
                        let fullName = item.user_name || '';
                        let nameParts = fullName.split(' ');
                        let firstNameInitial = nameParts[0] ? nameParts[0].charAt(0)
                            .toUpperCase() : '';
                        let lastNameInitial = nameParts[1] ? nameParts[1].charAt(0)
                            .toUpperCase() : '';
                        let initials = `${firstNameInitial}${lastNameInitial}`;
                        let baseUrl = "{{ asset('') }}";
                        let file = item.profile_img ? item.profile_img : '';
                        let fileUrl = `${baseUrl}${item.profile_img}`;
                        let createdAt = new Date(item.created_at);
                        let options = {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        };
                        let formattedDate = createdAt.toLocaleString('en-GB', options);
                        let listItem = `
                                <li class="feed-item">
                                    <div class="feed-item-list bod">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-baseline gap-2">
                                                <h6 class="mb-0 ms-2"><i class="mdi mdi-account-circle-outline font-size-16 text-info"></i> ${item.user_name}</h6>
                                                <p class="text-muted font-size-12 mb-0">${formattedDate}</p>
                                            </div>
                                            <p class="font-size-15 mb-0">
                                                <span class="badge rounded badge-soft-warning font-size-11">
                                                    ${item.message}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            `;
                        $('.activity_tab').append(listItem);
                    });


                } else {
                    toastr.error(response.message)
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An unexpected error occurred. Please try again later.')
            }
        });
    }

    function list_workflow_log() {
        $.ajax({
            url: "{{ route('workflow-log-list') }}",
            type: 'Get',
            dataType: 'json',
            data: {
                source_id: source_id,
                source: source
            },
            success: function(response) {
                if (response.data) {
                    response.data.forEach(function(item, index) {
                        let fullName = item.user_name || '';
                        let nameParts = fullName.split(' ');
                        let firstNameInitial = nameParts[0] ? nameParts[0].charAt(0).toUpperCase() : '';
                        let lastNameInitial = nameParts[1] ? nameParts[1].charAt(0).toUpperCase() : '';
                        let initials = `${firstNameInitial}${lastNameInitial}`;
                        let baseUrl = "{{ asset('') }}";
                        let file = item.profile_img ? item.profile_img : '';
                        let fileUrl = `${baseUrl}${item.profile_img}`;
                        let createdAt = new Date(item.created_at);
                        let options = {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        };
                        let formattedDate = createdAt.toLocaleString('en-GB', options);
                        let listItem = `
                                <li class="feed-item">
                                    ${file ?
                                        `<img class="rounded-circle header-profile-user avatar-sm time-img" src="${fileUrl}" alt="Header Avatar">` :
                                        `<div class="rounded-circle header-profile-user avatar-sm time-img bg-secondary text-white d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                                            <span>${initials}</span>
                                        </div>`
                                    }
                                    <div class="feed-item-list bod">
                                        <h6 class="mb-0 ms-2">
                                            ${item.user_name}
                                        </h6>
                                        <p class="text-muted font-size-12 mb-2 ms-2">
                                            ${formattedDate}
                                        </p>
                                        <span class="d-flex mb-0">
                                            <i class="mdi mdi-18px mdi-playlist-edit"></i>
                                            <p class="font-size-15">
                                                <span class="badge rounded badge-soft-warning font-size-11">
                                                    ${item.statement}
                                                </span>
                                            </p>
                                        </span>
                                    </div>
                                </li>
                            `;
                        $('.activity_tab').append(listItem);
                    });


                } else {
                    toastr.error(response.message)
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An unexpected error occurred. Please try again later.')
            }
        });
    }

    function doc_workflow_list() {

        if(source=='PurchaseOrder')
        {
            source = 'Purchase Order';
        }
        else if(source=='PurchaseRequest')
        {
            source = 'Purchase Request';
        }else if(source=='EOI'){
            source = 'EOI Development';
        }

        $.ajax({
            url: "{{ route('all-workflow-on-doc') }}",
            type: 'Get',
            dataType: 'json',
            data: {
                doc_id: source_id,
                doc_type: source
            },
            success: function(response) {
                if (response) {
                    $('.workflow_tab').html('<table class="table table-hover dt-responsive align-middle mb-0 nowrap">'+
                                '<thead class="bg-light">'+
                                    '<tr>'+
                                        '<th>Ref Code </th>'+
                                        '<th>Ref Id </th>'+
                                        '<th>Requested To</th>'+
                                        '<th>Assign Date</th>'+
                                        '<th>Approval Date</th>'+
                                        '<th>Status </th>'+
                                        '<th>Action </th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="myTable"> </tbody>'+
                            '</table>');



                    response.forEach(function(indi_data, index) {
                        var button = '';
                        var emp = '';
                        var approval_date = '';
                         if(indi_data['emp_name']){
                            emp = indi_data['emp_name']['name'];
                         }
                         if(indi_data['date']){
                            approval_date = indi_data['date'];
                         }

                         if(indi_data['status'] == "Pending" && !approval_date){
                            button = '<a href="#" data-bs-toggle="offcanvas" data-bs-target="#reassign-workflow"'+
                                'data-id="'+indi_data['id']+'"'+
                                'aria-controls="offcanvasdoc" id="assign_to" class="dropdown-item reassign-workflow"><i '+
                                    'class="mdi mdi-pencil-outline font-size-16 align-middle me-2 text-muted"></i>'+
                                'Re-assign</a>';
                         }

                            let listItem = '<tr>'+
                                '<td>'+indi_data['ref_code']+'</td>'+
                                '<td>'+indi_data['document_code']+'</td>'+
                                '<td>'+emp+'</td>'+
                                '<td>'+indi_data['assign_date']+'</td>'+
                                '<td>'+approval_date+'</td>'+
                                '<td>'+indi_data['status']+'</td>'+
                                '<td>'+button+'</td>'+
                            '</tr>';

                            $('#myTable').append(listItem);
                    });


                } else {
                    toastr.error(response.message)
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An unexpected error occurred. Please try again later.')
            }
        });
    }



    $(document).on('click', '#assign_to', function() {
        var w_id = $(this).attr('data-id');

        $('#line_id').val(w_id);
        if (w_id) {
            var url = "{{ route('workflow-reassign.details', [':w_id']) }}";
            url = url.replace(':w_id', w_id);
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#reassign').html(' <option value="">Select Employee</option>');
                    data.forEach(function(employee) {
                        $('#reassign').append('<option value="' + employee['id'] + '">' + employee['name']);
                    });
                }
            });
        }
    });



})
</script>
