<script>
    $(document).ready(function() {
        $(".enable_edit").click(function() {
            $('.form-enable').removeAttr("disabled");
            $('.form-show').css("display", "block");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.master_view', function() {
            var doc_id = $(this).attr('data-id');
            var model = $('#mod').val();
            var prnt = $('#parent').val();
            var prnt_id = prnt.toLowerCase() + '_id';
            if(model == "Warehouse"){
                prnt_id = 'cmp_id';
            }
            var full_url = prnt + '-' + model + "-edits";
            var url = "{{ url('master', ['urls'], '') }}";
            url = url.replace('urls', full_url);
            $('#master_id_edit').val(''); 
            $('#master_name_edit').val('');
            $('#parent_id_edit').val('');
            $('#master_description_edit').val('');
            $('#master_code_edit').val('');
            $.ajax({
                url: url,
                method: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    doc_id: doc_id
                },
                success: function(data) {                    
                    console.log(data);
                    $('#master_id_edit').val(data['id']);
                    $('#master_name_edit').val(data['name']);
                    $('#master_code_edit').val(data['code']);
                    $('#parent_id_edit').val(data[prnt_id]); 
                    $('#master_description_edit').val(data['description']);
                }

            });


         
            

        });

        $(document).on('click', '.master_update', function() {
            var model = $('#mod').val();
            var prnt = $('#parent').val();
            var full_url = prnt + '-' + model + "-updates";
            var master_id = $(master_id_edit).val();
            var parent_id = $(parent_id_edit).val();
            var master_description = $(master_description_edit).val();

            if (master_id && master_description && parent_id) {
                var url = "{{ url('master', ['urls'], '') }}";
                url = url.replace('urls', full_url);

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        master_id: master_id,
                        parent_id: parent_id,
                        master_description: master_description
                    },
                    cache: false,
                    async: false,
                    success: function(data) {
                        if (data) {                            
                            toastr.success("Record updated successfully.");
                            location.reload();
                        } else                            
                            toastr.error("Something went wrong");
                    }
                });
            } else {                
                toastr.warning("Please fill all fields");
            }
        });


        $(document).on('click', '.master_add', function() {
            var model = $('#mod').val();
            var prnt = $('#parent').val();
            var full_url = prnt + '-' + model + "-adds";
            var masters_name = $('#master_name').val();
            var parent_id = $('#parent_id').val();
            var masters_code = $('#master_code').val();
            var masters_description = $('#master_description').val();            
            
            if (masters_name && masters_description && (parent_id || model == "Position" || model == "Department")) {
                var count = 0;
                if (model == 'Warehouse') {
                    if(!masters_code){                        
                        count++;
                    }                     
                } 
                if (count == 0) {

                    var url = "{{ url('master', ['urls'], '') }}";
                    url = url.replace('urls', full_url);

 
                    $.ajax({
                        url: url,
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            masters_name: masters_name,
                            parent_id: parent_id,
                            masters_code: masters_code,
                            masters_description: masters_description
                        },
                        cache: false,
                        async: false,
                        success: function(data) {
                            if (data) { 
                                toastr.success("Record created successfully.");
                                location.reload();
                            } else 
                                toastr.error("Something went wrong"); 
                        }
                    });
                } else { 
                    toastr.warning(model + " Code is mandatory");
                }
            } else { 
                toastr.warning("Please fill all fields");
            }
        });


        $(document).on('click', '.master_delete', function() {
            var doc_id = $(this).attr('data-id');

            if (doc_id) {
                var model = $('#mod').val();
                var prnt = $('#parent').val();
                var full_url = prnt + '-' + model + "-deletes";
                var url = "{{ url('master', ['urls'], '') }}";
                url = url.replace('urls', full_url);

                delete_by_url('kpi-delete', doc_id);
            } else { 
                toastr.warning("Please select valid record");
            }


        });

    });
</script>
