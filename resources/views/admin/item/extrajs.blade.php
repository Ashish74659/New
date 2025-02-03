<script>
    $(document).ready(function() {
        var subcategory = "<?php echo $data?->subcategory_id; ?>";
        $.getsubcategory(subcategory);
    
        var tax = {!! json_encode($tax) !!};
        var discount = {!! json_encode($discount) !!};
        var warehouse = {!! json_encode($warehouse) !!};

        var i =-200;
        
        $.addRowButton = function(){
            $('#company_product').append('<tr>' +
                '<td><select class="form-control" name="warehouse_id[]" id="warehouse_'+i+'" onchange="$.get_company('+i+')" required>'+warehouse+'</select></td>' +
                '<td><select class="form-control" name="comy_id[]" id="company_'+i+'" ></select></td>' +
                '<td><input type="text" class="form-control" name="selling_price[]" onKeyPress="return $.numeric_period();" required></td>' +
                '<td><select class="form-control" name="discount_per[]">'+discount+'</select></td>' +
                '<td><input type="text" class="form-control" name="product_quantity[]" onKeyPress="return $.numeric_period();" required></td>' +
                '<td><input type="text" class="form-control" name="alert_quantity[]" onKeyPress="return $.numeric_period();"></td>' +
                '<td><select class="form-control" name="tax_per[]">'+tax+'</select></td>' +
                '<td><select class="form-control" name="selling_price_tax_type[]"> <option value=""></option><option value="Exclusive">Exclusive</option> <option value="Inclusive">Inclusive</option> </select></td>'+
                '<td><input type="hidden" name="check_box_val[]" value="'+i+'"><div class=" form-switch"> <input class="form-check-input" name="not_for_selling[]" value="'+i+'" type="checkbox"> </div> </td>'+
                '<td> <i class="mdi mdi-trash-can-outline text-danger font-size-18" onclick="$.delete_one_html(this)"></i></td>' +
            '</tr>');
                i++;        
        }
 
        $.get_company = function(id){
            var warehouse = '#warehouse_'+id;
            var company_id = '#company_'+id;
            warehouse_id = $(warehouse).val();
            $(company_id).html(''); 
            if(warehouse_id){
                $.ajax({
                    url: "{{ route('item-warehouse-to-company') }}",
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}',
                        warehouse_id: warehouse_id,
                    },
                    cache: false,
                    async: false,
                    success: function(response) {
                        $(company_id).html(response); 
                    }
                });
            }
 
        }


        $.delete_company_item = function(v, id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.isConfirmed) {
                    if(id){
                        $.ajax({
                        type: "post",
                        url: "{{ route('company-item-delete') }}",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: id
                        },
                        cache: false, 
                        async: false,
                            success: function(response) {
                                if(response.status == "200"){ 
                                    toastr.success(response.message); 
                                    $(v).parents('tr').remove();
                                }
                                else{
                                    toastr.error(response.message);
                                }
                            }
                        });
                    }
                    
                    
                }
            })
        }


    });
</script>
