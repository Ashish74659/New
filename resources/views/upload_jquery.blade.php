<script>
    $(document).ready(function () {  
        var model = '';
        var doc_id = '';
        var doc_type = '';
        var bidder_id = ''; 
        
        $(document).on('click','.upload_docs',function(){          
            model = $(this).attr('data-model');
            doc_id = $(this).attr('data-docid');
            doc_type = $(this).attr('data-type');
            bidder_id = $(this).attr('data-bidderid'); 
            $.get_documents(model,doc_id,doc_type,bidder_id);
        });

        $.upload_doc = function(){              
            var uploaded_doc = $('#documenttfiles')[0].files; 
            var description = $('#description').val(); 
            document.getElementById("submit_document").disabled = true;
            $('#submit_document').html('Processing.......');

            if(model && doc_id && doc_type){ 
                if (uploaded_doc.length > 0 ){   
                    var token = '{{ csrf_token() }}'; 
                    var formData = new FormData();
                    for (var i = 0; i < uploaded_doc.length; i++) {
                        formData.append('files[]', uploaded_doc[i]);
                    }                     

                    formData.append('model', model);
                    formData.append('doc_id', doc_id);
                    formData.append('doc_type', doc_type);
                    formData.append('bidder_id', bidder_id); 

                    formData.append('description', description);                                
                    formData.append('_token', '{{ csrf_token() }}');
                    $('#total_cat_error').html("");
                    $('#error_value').val(200);
                    
                    $.ajax({
                        url: "{{ route('vendor-tender-document-upload') }}",
                        method: 'post',
                        data: formData,
                        processData: false,
                        contentType: false, 
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200){
                                $.get_documents(model,doc_id,doc_type,bidder_id);
                                success("success","Document Uploaded successfully!");
                            }
                            else{
                                error("error","Something went wrong");
                            }
                            $('#documenttfiles').val('');
                            $('#description').val('');                            
                        }
                    });
                }
                else{ 
                    error("error","Please Upload at least one document");
                }
            }
            else{
                error("error","Please fill all details properly");
            }
            $.get_documents(model,doc_id,doc_type,bidder_id);
            document.getElementById("submit_document").disabled = false;
            $('#submit_document').html('Upload');            
        }

        $.get_documents = function(model,doc_id,doc_type,bidder_id){  
            $('#documents_datas').html('');
            if(model && doc_id && doc_type){
                $.ajax({
                type: "get",
                url: "{{ route('vendor-tender-document-load') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    model: model,
                    doc_id: doc_id,
                    doc_type: doc_type,
                    bidder_id: bidder_id 
                },
                cache: false,
                async: false,
                success: function(response) {
                    var i = 1;
                    $.each(response, function(index, data) {                         
                        var descriptions = '';
                        if(data['description'])
                        descriptions = data['description'];
                        var documentt ='/'+data['url']+'/' + data['name'];
                        $('#documents_datas').append('<tr><td class="text-center">'+ i +'</td><td class="">' +
                            data['name'] + '</td><td> ' +descriptions+ '</td><td>' +data['created_at'].substr(0,10)+ '</td>'+
                            '<td><div class="btn-group"><a class="text-muted dropdown-toggle font-size-20" role="button"data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-vertical"></i></a><div class="dropdown-menu">'+
                            '<a href="'+documentt+'" target="_blank" class="dropdown-item"><i class="mdi mdi-eye-outline font-size-16 align-middle me-2 text-muted"></i> View</a>'+
                            '<a onclick="$.delete_document('+data['id']+');" class="dropdown-item"><i class="mdi mdi-trash-can-outline font-size-16 align-middle me-2 text-muted"></i> Delete</a>'+
                            '</div> </div></td> </tr>');          
                            i++;                
                        });       
                    }
                });
            }


        } 


        $.delete_document = function(vt_id){
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0c768a",
            cancelButtonColor: "#ff3d60",
            timer: 4000,
            confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
            if (result.value) {
                $.ajax({
                type: "post",
                url: "{{ route('vendor-tender-document-delete') }}",
                data: {
                    _token: '{{ csrf_token() }}',                                                                                 
                    vt_id: vt_id
                },
                cache: false,
                async: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200){
                        success("success","Document deleted");
                    }
                    else if(dataResult.statusCode == 202){
                        error("error","failed ! Document is in use");
                    }
                    else{
                        error("error","Something went wrong");
                    }
                    $.get_documents(model,doc_id,doc_type,bidder_id);                     
                }
            });
            }
            });

            
        }
        $(document).on('click','.get_docs',function(){   
            model = $(this).attr('data-model');
            doc_id = $(this).attr('data-docid');
            doc_type = $(this).attr('data-type');
            $('#admin_displayDocs').html('');
            if(model && doc_id && doc_type){
                $.ajax({
                type: "get",
                url: "{{ route('get-vendor-bidDocument') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    model: model,
                    doc_id: doc_id,
                    doc_type: doc_type,
                },
                cache: false,
                async: false,
                success: function(response) {                    
                    var i = 1;
                    var j = 0;
                    $.each(response[1], function(index, data) { 
                        var descriptions = '';
                        if(data['description'])
                        descriptions = data['description'];
                        var document_name ='/'+data['url']+'/' + data['name'];
                        $('#admin_displayDocs').append('<tr><td>'+ i +'</td><td class="">' + response[0][j]['name'] + '</td><td>' +data['name']+ '</td><td> ' +descriptions+ '</td>'+
                            '<td><div class="btn-group"><a class="text-muted dropdown-toggle font-size-20" role="button"data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-vertical"></i></a><div class="dropdown-menu">'+
                            '<a href="'+document_name+'" target="_blank" class="dropdown-item"><i class="mdi mdi-eye-outline font-size-16 align-middle me-2 text-muted"></i> View</a>'+
                            '</div> </div></td> </tr>');          
                            i++; 
                            j++;               
                        });       
                    }
                });
            }

        });
        

 

    });



</script>