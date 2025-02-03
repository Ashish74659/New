<script>
    $(document).ready(function() {
        var data_id = $('#addDoc_button').attr('data-id');
        var model_name = $('#addDoc_button').attr('data-model');
        var status = $('#addDoc_button').attr('data-status');
        $.getdocument = function() {
            var documents = data_id;
            $.ajax({
                url: "{{ route('get-all-document') }}",
                method: 'get',
                data: {
                    documents: documents,
                    model_name:model_name,
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                async: false,
                success: function(response) {
                    $('#documents_data').html('');
                    var i =1;
                    $.each(response, function(index, data) {
                        var documentt ='/'+data['url']+'/' + data['name'];
                        const date = new Date(data['created_at']);
                        const formatter = new Intl.DateTimeFormat('en-US', { dateStyle: 'short' });
                        const formattedDate = `${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`;
                        if (status == 'Draft') {
                            $('#documents_data').append('<tr><td class="text-center">'+ i +'</td><td class="">' +
                                data['name'] + '</td><td> ' +data['description']+ '</td><td> ' +formattedDate+ '</td>'+
                                '<td><div class="btn-group"><a class="text-muted dropdown-toggle font-size-20" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-vertical"></i></a>'+
                                '<div class="dropdown-menu"><a class="dropdown-item" target ="_blank" href="' + documentt + '"><i class="nav-icon fa fa-eye"></i> {{ __('common.view') }}</a> '+
                                '<a class="dropdown-item" onClick="$.delete_document(' + data['id'] + ');" ><i class="nav-icon fa fa-trash"></i> {{ __('common.delete') }}</a></div></div></td>' +
                                '</tr>'
                                );
                        } else {
                            $('#documents_data').append('<tr><td class="text-center">'+ i +'</td><td class="">' +
                                data['name'] + '</td><td> ' +data['description']+ '</td><td> ' +formattedDate+ '</td>' +
                                '<td><div class="btn-group"><a class="text-muted dropdown-toggle font-size-20" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-vertical"></i></a>'+
                                '<div class="dropdown-menu"><a class="dropdown-item" target ="_blank" href="' + documentt + '"><i class="nav-icon fa fa-eye"></i> {{ __('common.view') }}</a></div></div> '+
                                '</td></tr>'
                                );
                        }
                        i++;
                    })
                }
            });
        }
          $.delete_document = function(id) {
            var id = id;
            if (id) {
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
                        $.ajax({
                            url: "{{ route('delete-document') }}",
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
                            },
                            cache: false,
                            async: false,
                            success: function(dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    toastr.success('Record Deleted Successfully !')
                                } else if (dataResult.statusCode == 201) {
                                    toastr.error('Something went Wrong')
                                } else if (dataResult.statusCode == 202) {
                                     
                                    toastr.error('Can not delete This record is in use !')
                                }
                                $.getdocument();
                            }
                        });

                    }
                    return false;
                })
            } else {
                toastr.error('Something went Wrong')
            }

        }


        $('#subform').submit(function(e) {
            e.preventDefault();
            var files = $('#documenttfile').files;
            var filename = $("#documenttfile").val();
            var extention = filename.split('.').pop();
            var description =document.getElementById('descri').value;
            
            if (extention == 'pdf') { 
                var fd = new FormData($(this)[0]);
                fd.append('_token', '{{ csrf_token() }}');
                fd.append('model_name', model_name);
                fd.append('id', data_id);
                fd.append('description',description);
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    async: false,
                    success: function(dataResult) {
                        if (dataResult.statusCode == 200) { 
                            toastr.error('File uploaded successfully !')
                            document.getElementById("documenttfile").value = "";
                            document.getElementById("descri").value = "";
                        } else if (dataResult.statusCode == 201) {
                            toastr.error('Please select pdf file only')
                            document.getElementById("documenttfile").value = "";
                            document.getElementById("descri").value = "";
                        }
                    }
                });
            } else {
                toastr.error('You can upload pdf file only')
                document.getElementById("documenttfile").value = "";
            }
            $.getdocument(); 

        });

        $.getdocument();
        if (status == "Draft") {
            $('.div-hidee').show();
        } else {
            $('.div-hidee').hide();
        }
 
    });
</script>
