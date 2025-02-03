<script>
        let check_duplicate_in_array = (input_array) => {
            let duplicate_elements = [];
            for (element of input_array) {
                if (input_array.indexOf(element)
                    !== input_array.lastIndexOf(element)) {
                    duplicate_elements.push(element);
                }
            }
            return [...new Set(duplicate_elements)];
        };

        $(document).ready(function () { 
            var i =0;
            var items = {!! json_encode($items) !!};
             $.addRowButton = function(){
                $('#products_list').append('<tr><td> <select class="form-control select2" id="item_'+i+'" onchange="$.get_item('+i+')" name="item_id[]">'+items+'</select></td>'
                    +'<td><input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" id="item_name'+i+'" name="item_name[]" required></td>'
                    +'<td><input type="text" class="form-control" onKeyPress="return $.alpha_num_space_period();" name="modifier_name[]" required></td>'
                    +'<td><input type="text" class="form-control" onKeyPress="return $.numeric_period();" name="price[]" required></td>'
                    +'<td><i class="mdi mdi-trash-can-outline me-2 font-size-18 text-danger" onclick="$.delete_one_html(this)"></i></td></tr>');
                    i++;
             }

             $.validate_form = function(){ 
                var item_name = new Array();
                $("input[name='item_name[]']").each(function() {
                    if(this.value){
                        item_name.push(this.value);
                    }
                    else{
                        toastr.error('Product Name is required');
                        return false;
                    }
                });              
                if(check_duplicate_in_array(item_name).length > 0){ 
                    toastr.error('Duplicate Product Found');
                    return false;
                } 
                return true;
             }


            $.get_item = function(id){                                
                var item = '#item_'+id;
                var item_name = '#item_name'+id;            
                var doc_id = $(item).val();
                var model = 'Item';
                var full_url = model+"-edit/";
                var url = "{{ url('master',['urls'],'') }}";
                url = url.replace('urls',full_url);                    
                if(doc_id){ 
                    $.ajax({
                        url: url,
                        method: 'get',
                        data: {
                            _token: '{{ csrf_token() }}',
                            doc_id:doc_id
                        },
                        success: function(data) {
                            $(item_name).prop("readonly", true);
                            $(item_name).val(data.name);
                        }
                    }); 
                }
                else{ 
                    $(item_name).prop("readonly", false);
                    $(item_name).val(''); 
                }
            } 

        });

</script>