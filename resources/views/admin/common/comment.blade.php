<div class="modal fade" id="Addnote" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="uploadForm_comment">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('common.add-comment-new')}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">{{__('common.comment')}}</label>
                                <input type="hidden" class="inp-hide col-md-9" id="comment_source_id" value=""
                                    name="source_id" required>
                                <input type="hidden" class="inp-hide col-md-9" id="comment_source" value=""
                                    name="source" required>
                                <textarea class="summernote" name="comment" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">{{__('common.attachments')}}</label>
                                <div class="input-group">
                                    <input type="file" name="attachment_file[]" multiple ="multiple"
                                        class=" form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light"><i
                            class="mdi mdi-plus-circle-outline"></i> {{__('common.submit')}} </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        var source_id = $('#activity_source_id').val();
        var source= $('#activity_source').val();
        if(source_id && source)
        {
            $('#comment_source_id').val(source_id);
            $('#comment_source').val(source);
        }
        list_comment();

        function list_comment() {
            $.ajax({
                url: "{{ route('comments-list') }}",
                type: 'Get',
                dataType: 'json',
                data: {
                    source_id: source_id,
                    source: source
                },
                success: function(response) {
                    if (response.data) {
                        $('.comment_tab').empty();
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
                            let attachmentList = '';
                            if (item.comment_image && item.comment_image.length > 0) {
                                item.comment_image.forEach(function(image) {
                                    let attachmentUrl = `${baseUrl}${image.attachment_name}`;
                                    attachmentList += `
                                        <li class="d-flex align-items-center justify-content-between">
                                            <a href="${attachmentUrl}" title="view" target="_blank">
                                                <span class="me-1">
                                                    <i class="mdi mdi-file-document-edit"></i> ${image.attachment_name.split('/').pop()}
                                                </span>
                                            </a>
                                            <a href="${attachmentUrl}" target="_blank" download>
                                                <i class="ri-download-cloud-2-line"></i>
                                            </a>
                                        </li>
                                    `;
                                });
                            } else {
                                attachmentList = '<li>No attachments available</li>';
                            }
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
                                        <div class="d-flex align-items-baseline gap-2">
                                            <h6 class="mb-0 ms-2"><i class="mdi mdi-account-circle-outline font-size-16 text-info"></i> ${item.user_name}</h6>
                                            <p class="text-muted font-size-12 mb-0">Comments on ${formattedDate}</p>
                                        </div>
                                        <div class="com-p">
                                            ${item.comment}
                                        </div>

                                        <ul class="list-unstyled categories-list">
                                            <li>
                                                <div class="custom-accordion">
                                                    <a class="text-body fw-medium py-1 d-flex align-items-center collapsed"
                                                        data-bs-toggle="collapse" href="#categories-collapse${index}"
                                                        role="button" aria-expanded="false"
                                                        aria-controls="categories-collapse"> <i
                                                            class="mdi mdi-file-document-edit"></i> Attachment </a>
                                                    <div class="collapse" id="categories-collapse${index}" style="">
                                                        <div class="card border-0 shadow-none ps-2 mb-0">
                                                            <ul class="list-unstyled bod mb-0">
                                                                ${attachmentList}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            `;
                            $('.comment_tab').append(listItem);
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

        $('#uploadForm_comment').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('comment-store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.data) {
                            toastr.success(response.message)
                            $('#Addnote').modal('hide');
                            list_comment();
                    } else {
                        toastr.error(response.message)
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        // Validation error
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (const [key, messages] of Object.entries(errors)) {
                            errorMessages += messages.join('<br>');
                        }

                        toastr.error('Validation Error !')
                    } else {
                        toastr.error('Something went wrong: ' + error)
                    }
                }
            });
        });
    })
</script>
