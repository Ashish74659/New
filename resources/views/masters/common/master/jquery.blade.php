<script>
    $(document).ready(function(){
        $(".enable_edit").click(function(){
            $('.form-enable').removeAttr("disabled");
            $('.form-show').css("display", "block" );
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','.master_view',function(){
            var doc_id = $(this).attr('data-id');
            var model = $('#mod').val();
            var full_url = model+"-edit/";
            var url = "{{ url('master',['urls'],'') }}";
            url = url.replace('urls',full_url);
            $('#master_id_edit').val('');
            $('#master_code_edit').val('');
            $('#master_name_edit').val('');
            $('#master_description_edit').val('');
            $('#master_symbol_edit').val(''); 
            $.ajax({
                url: url,
                method: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    doc_id:doc_id
                },
                success: function(data) {
                $('#master_id_edit').val(data['id']);
                $('#master_name_edit').val(data['name']);
                $('#master_code_edit').val(data['code']);
                $('#master_description_edit').val(data['description']);
                $('#master_symbol_edit').val(data['symbol']);
 
                }

            });
        });

        $(document).on('click','.master_update',function(){
            var model = $('#mod').val();
            var full_url = model+"-update";
            var master_id = $('#master_id_edit').val();
            var master_description = $('#master_description_edit').val();
            var master_symbol = $('#master_symbol_edit').val();
            if(master_id && master_description){
                var url = "{{ url('master',['urls'],'') }}";
                url = url.replace('urls',full_url);

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        master_id:master_id,
                        master_description:master_description,
                        master_symbol:master_symbol,
                    },
                    cache: false,
                    async: false,
                    success: function(data) {
                    if(data){ 
                        toastr.success("Record updated successfully.");
                        location.reload();
                    }
                    else 
                    toastr.error("Something went wrong");
                    }
                });
            }
            else{ 
                toastr.warning("Please fill all fields");
            }
        });


        $(document).on('click','.master_add',function(){
            var model = $('#mod').val();
            var full_url = model+"-add";
            var masters_name = $('#master_name').val();
            var masters_description = $('#master_description').val();
            var masters_code = $('#master_code').val();
            var master_symbol = $('#master_symbol').val();

            if(masters_name && masters_description){
                var count =0;
                if(model == 'Currency'){
                    if(masters_code);
                    else
                    count++;
                }

                if(count==0){
                    var url = "{{ url('master',['urls'],'') }}";
                    url = url.replace('urls',full_url);

                        $.ajax({
                            url: url,
                            method: 'post',
                            data: {
                                _token: '{{ csrf_token() }}',
                                masters_name:masters_name,
                                masters_code:masters_code,
                                masters_description:masters_description,     
                                master_symbol:master_symbol,                           
                            },
                            cache: false,
                            async: false, 
                            success: function(data) {                            
                            if(data == 200){ 
                                toastr.success("Record created successfully.");
                                location.reload();
                            }
                            else if(data == 203){
                                toastr.warning("Please fill all fields");
                            }
                            else if(data == 202){ 
                                toastr.warning("Record already Exists");                                
                            }
                            else 
                                toastr.error("Something went wrong");
                            }
                        });
                }
                else{
                                      
                    toastr.warning(model+" Code is mandatory");
                    
                }

            }
            else{ 
                toastr.warning("Please fill all fields");
            }
        });


        $(document).on('click','.master_delete',function(){
        var id = $(this).attr('data-id');
        if(id){
            var model = $('#mod').val();
            var full_url = model+"-delete/"+id;
            var url = "{{ url('master',['urls'],'') }}";
            url = url.replace('urls',full_url);

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
                    url: url,
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,
                    async: false,
                    success: function(data) {
                        if (data == 200) { 
                            toastr.success("Your record has been deleted.");
                            location.reload();
                        } else if (data == 201) 
                            toastr.error("Can't delete ,Record is in use");
                        else 
                            toastr.error("Something went wrong");
                    }
                });
            }
        });




        }
        else{ 
            toastr.warning("Please select valid record");
        }

        });



    });
</script>
