<script>
    $(document).ready(function() {
        $('.select2').select2(); 
        var currency = "{{$currency}}";
        
        $('.open-customer').on('shown.bs.modal', function() {
            $('.cust_sel').select2({
                minimumResultsForSearch: 1,
                dropdownParent: $('.open-customer'),
                width: '100%'
            });
        }); 

        $('.add-cus-modal').on('shown.bs.modal', function() {
            $('.new_select').select2({
                minimumResultsForSearch: 1,
                dropdownParent: $('.add-cus-modal'),
                width: '100%'
            });
        });  

        $.calculate = function(div_id){
            var row = document.getElementById(div_id);
            var inputFields = row.querySelectorAll('input'); 
            var inputValues = [];

            var ii = 0;
            var common_id = 0;
            var quantity = 0;
            var selling_price = 0;
            var tax_per = 0;
            var discount_per = 0;
            var selling_price_tax_type = '';

            inputFields.forEach(function(inputField) {
                if(ii == 0 && inputField.value > 0){
                    common_id = parseFloat(inputField.value);
                }
                else if(ii==1 && inputField.value > 0){
                    quantity = parseFloat(inputField.value);
                }
                else if(ii==2 && inputField.value > 0){
                    selling_price = parseFloat(inputField.value);
                }
                else if(ii==3 && inputField.value > 0){
                    discount_per = parseFloat(inputField.value);
                }
                else if(ii==4 && inputField.value > 0){
                    tax_per = parseFloat(inputField.value);
                }
                else if(ii==5 && inputField.value != "null"){                    
                    selling_price_tax_type = inputField.value;
                }
                
                ii++;
            });
                           
     
            if(selling_price_tax_type == "Exclusive"){
                var tot_price = (quantity*selling_price);
                var dis = (tot_price*discount_per) / 100;
                var total_after_dis = (tot_price - dis);
                var tot_sales_tax = (total_after_dis * tax_per) / 100;
                var nettotal = total_after_dis + tot_sales_tax;
                var net_amt = tot_price; 
                
            } 
            else if(selling_price_tax_type == "Inclusive"){                 
                var unit_tax = selling_price*(tax_per/100);
                var unit_price_without_tax = selling_price-unit_tax; 
                var unit_dis = unit_price_without_tax*(discount_per/100);
                var unit_price_without_tax_discount = selling_price - unit_tax - unit_dis;

                var tot_price = quantity*selling_price;
                var nettotal = quantity*(unit_price_without_tax_discount + unit_tax);
                var tot_sales_tax = quantity*unit_tax;
                var dis = quantity*unit_dis;
                var net_amt = tot_price;
            }
            else{
                var tot_price = quantity*selling_price;
                var dis = (tot_price*discount_per) / 100;
                var nettotal = tot_price - dis;                
                var tot_sales_tax = 0;
                var net_amt = nettotal;
            }     
         

            var jj = 0;
            inputFields.forEach(function(inputField) {
                
                 if(jj==6){                    
                    inputField.value = tot_sales_tax.toFixed(3); ; 
                }
                else if(jj==7){                    
                    inputField.value = dis.toFixed(3); ; 
                }
                else if(jj==8){                    
                    inputField.value = nettotal.toFixed(3); ; 
                }
                else if(jj==9){                    
                    inputField.value = net_amt.toFixed(3); ; 
                }
                jj++;
            });
 
            var sell_html = '#selling_price_html'+common_id;
            var dis_html = '#discount_per'+common_id;
            var tax_html = '#tax_per_html'+common_id;   

            $(sell_html).html(tot_price.toFixed(3));
            $(dis_html).html(dis.toFixed(3));
            $(tax_html).html(tot_sales_tax.toFixed(3));
            
            var all_grand_total = 0;
            $("input[name='net_val[]']").each(function() {
                all_grand_total += parseFloat(this.value);
            });

            var all_sub_total = 0;
            $("input[name='sub_total_val[]']").each(function() {
                all_sub_total += parseFloat(this.value);
            });

            var all_tax = 0;
            $("input[name='tax_val[]']").each(function() {
                all_tax += parseFloat(this.value);
            });

            var all_discount = 0;
            $("input[name='discount_val[]']").each(function() {
                all_discount += parseFloat(this.value);
            });

            var all_net_total = 0;
            $("input[name='net_val[]']").each(function() {
                all_net_total += parseFloat(this.value);
            });
 
            $('#all_grand_total').html(all_grand_total.toFixed(3));
            $('#all_sub_total').html(all_sub_total.toFixed(3));
            $('#all_tax').html(all_tax.toFixed(3));
            $('#all_discount').html(all_discount.toFixed(3)); 
            $('#rem_balance_val').val(all_net_total.toFixed(3));
            $('#rem_balance_html').html(all_net_total.toFixed(3));            
 

        }

        $.decrease = function(id_s){    
            var qty_id = "#qty_"+id_s;
            var qty_value = $(qty_id).val();   
            var count = parseInt(qty_value) - 1;
            count = count < 1 ? 1 : count; 
            $(qty_id).val(count);            
            $.calculate(id_s);
            var $input = $(v).parent().find('input');
             
        }

        $.increase = function(max,id_s){         
            var qty_id = "#qty_"+id_s;
            var qty_value = $(qty_id).val();             
            if(parseInt(qty_value) + 1 > max){
                toastr.warning("There are only "+max+" item in the stock");   
                $(qty_id).val(max);
            } 
            else{
                $(qty_id).val(parseInt(qty_value) + 1); 
            } 
            $.calculate(id_s);
        }

        $.register_details = function(types){  
            $('#initial_cash').html('-');                                  
            $('#cash_payment').html('-');
            $('#card_payment').html('-');
            $('#loyality_point_payment').html('-');
            $('#upi_payment').html('-');
            $('#sales_tax_return_payment').html('-');
            $('#total_amount').html('-');
            $('#total_sales_return').html('-');

            $.ajax({
                type: "get",
                url: "{{ route('pos-register-details') }}",
                data: {
                    _token: '{{ csrf_token() }}',  
                },
                cache: false, 
                async: false,
                success: function(response) {  
                    if(types == "details"){
                        if(response[1].initial_cash > 0){
                            $('#initial_cash').html(response[0] + ' ' +response[1].initial_cash.toFixed(3));
                        }

                        if(response[1].cash_payment > 0){
                            $('#cash_payment').html(response[0] + ' ' +response[1].cash_payment.toFixed(3));
                        }

                        if(response[1].card_payment > 0){
                            $('#card_payment').html(response[0] + ' ' +response[1].card_payment.toFixed(3));
                        }

                        if(response[1].loyality_point_payment > 0){
                            $('#loyality_point_payment').html(response[0] + ' ' +response[1].loyality_point_payment.toFixed(3));
                        }

                        if(response[1].upi_payment > 0){
                            $('#upi_payment').html(response[0] + ' ' +response[1].upi_payment.toFixed(3));
                        }

                        if(response[1].sales_tax_return_payment > 0){
                            $('#sales_tax_return_payment').html(response[0] + ' ' +response[1].sales_tax_return_payment.toFixed(3));
                        }

                        if(response[1].total_amount > 0){
                            $('#total_amount').html(response[0] + ' ' +response[1].total_amount.toFixed(3));
                        }

                        if(response[1].total_sales_return > 0){
                            $('#total_sales_return').html(response[0] + ' ' +response[1].total_sales_return.toFixed(3));
                        }
                    }
                    else if(types == "close"){
                        if(response[1].initial_cash > 0){
                            $('#closing_cash').html(response[0] + ' ' +response[1].initial_cash.toFixed(3));
                        }
                        if(response[1].total_amount > 0){
                            $('#ordered_cash').html(response[0] + ' ' +response[1].total_amount.toFixed(3));
                        }
                    }
                }
            });            
        } 
                
        $.running_order = function(){  
            $('#running_order_table').html('');

            $.ajax({
                type: "get",
                url: "{{ route('running-order-data') }}",
                data: {
                    _token: '{{ csrf_token() }}',  
                },
                cache: false, 
                async: false,
                success: function(response) {                        
                    $.each(response, function(index, data) {                                                                          
                        var new_id = data['id'];                        
                        var new_url = "{{ route('emp-pos-order',['order_id'=>'new_id']) }}";
                        new_url = new_url.replace('new_id',new_id);                        

                        var paymeny_url = "{{ route('pos-payment-page',['order_id'=>'new_id']) }}";
                        paymeny_url = paymeny_url.replace('new_id',new_id);   
 
                        var cust = "";
                        var status = "";

                        var curr = currency+' '+data['net_total'];

                        var date_time = data['created_at'].substring(0,10);
                        var company = data['company']['name'];
                        
                        if(data['customer_id']){
                            cust = data['customer']['name'];
                        }
                        if(data['created_by']){                            
                            var img = $.document_path(data['creator']['profile_img']);
                            var creator_name = data['creator']['name'];
                        }
                        else{
                            var img = $.document_path('');
                            var creator_name = '';
                        } 
                            status = "<span class='badge bg-success'>"+data['status']+"</span>";
                         

                        $('#running_order_table').append('<tr>'
                            +'<td> <a href="'+new_url+'">'+data['code']+'</a></td>'
                            +'<td><img src="'+img+'" class="avatar-xs rounded-circle me-2"> <a href="'+img+'" class="text-body">'+creator_name+'</a> </td>'
                            +'<td>'+cust+'</td>'
                            +'<td>'+curr+'</td>'
                            +'<td>'+date_time+'</td>'
                            +'<td> '+status+' </td>'
                            +'<td> '
                                // +'<button class="btn btn-sm  btn-outline-primary" title="print"><i class="mdi mdi-printer font-size-15"></i> </button>'
                                +'<a href="'+new_url+'"><button class="btn btn-sm btn-outline-primary" title="Add Item"><i class="mdi mdi-basket-plus-outline font-size-15"></i> </button></a>'
                                +'<a href="'+paymeny_url+'"> <button class="btn btn-sm  btn-outline-primary" title="Payment"><i class="mdi mdi-cash-plus font-size-15"></i> </button></a>'
                            +'</td> </tr>'); 


                            $('#running_order_second_div').append('<div class="col-md-3 mb-3">'
                                +'<div class="list-card">'
                                +'<div class="d-flex"> <img src="'+img+'" class="avatar-xs rounded-circle me-2"> <p class="mb-0">'+creator_name+'</p> </div>'
                                +'<a href="'+new_url+'"> <button class="btn-details tender-fees log-btn rounded-2" type="button"> <span class="font-size-13"> '+data['code']+'</span> </button></a>'
                                +'<div class="row mt-2">'
                                    +'<div class="col-md-12">'
                                        +'<div> <span class="font-size-13"><b>Store :</b> '+company+' </span> </div>'
                                        +'<div> <span class="font-size-13"><b>Customer :</b> '+cust+' </span> </div>'
                                        +'<div> <span class="font-size-13"><b>Amount :</b> '+curr+' </span> </div>'
                                    +'</div>'
                                    +'<div class="col-md-12"> <div> <span class="font-size-13"><b>Date :</b> '+date_time+' </span> </div> </div>'
                                    +'<div class="col-md-12"> <div> <p class="font-size-13"><b>Status :</b>  '+status+'  </p> </div> </div>'
                                    +'<div class="col-md-12"> '
                                        // +'<button class="btn btn-sm btn-primary me-1">Print</button>'
                                        +'<a href="'+new_url+'"><button class="btn btn-sm btn-primary me-1"> Add Item</button></a>'
                                        +'<a href="'+paymeny_url+'"> <button class="btn btn-sm btn-primary me-1"> Payment</button></a>'
                                    +'</div>'
                                +'</div> </div> </div>');
                    });                                   
                }
            });            
        }

        $.order_history = function(){  
            $('#running_order_table').html('');

            $.ajax({
                type: "get",
                url: "{{ route('history-order-data') }}",
                data: {
                    _token: '{{ csrf_token() }}',  
                },
                cache: false, 
                async: false,
                success: function(response) {                        
                    $.each(response, function(index, data) {                                                                          
                        var new_id = data['id'];   
                        
                        if(data['invoice_id']){
                            var new_url = "{{ route('order-invoice-view',['order_id'=>'new_id']) }}";
                            new_url = new_url.replace('new_id',new_id);                        
                        }
                        else{
                            var new_url = "#";
                        }
 
                        var cust = "";
                        var status = "";
                        var curr = currency+' '+data['net_total'];
                        var date_time = data['created_at'].substring(0,10);
                        var company = data['company']['name'];                        
                        if(data['customer_id']){
                            cust = data['customer']['name'];
                        }
                        
                        status = "<span class='badge bg-success'>"+data['status']+"</span>";
                         

                        $('#history_order_table').append('<tr>'
                            +'<td> '+data['code']+'</td>'
                            +'<td>'+cust+'</td>'
                            +'<td>'+curr+'</td>'
                            +'<td>'+date_time+'</td>'
                            +'<td> '+status+' </td>'
                            +'<td> '
                                +'<a href="'+new_url+'"><button class="btn btn-sm  btn-outline-primary" title="print"><i class="mdi mdi-printer font-size-15"></i> </button></a>' 
                            +'</td> </tr>');  
                    });                                   
                }
            });            
        }
         
        $.category_item = function(parent_column,id){
            $.ajax({
                url: "{{ route('get-item-by-cat-subcat') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    parent_column: parent_column,                    
                    parent_id: id,
                },
                cache: false,
                async: false, 
                success: function(response) {                    
                    $('#item_list').html("");                 
                    $.each(response, function(index, data) {                        
                        var path = '';
                        if(data){
                            if(data['item']['image']){
                                path = data['item']['image'];
                            }                            
                            var img = $.document_path(path);                                                         
                            var taxx = "";
                            if(data['tax_per']){
                                taxx = "T-"+data['tax_per'].toFixed(3) +" %";
                            }                            
                            $('#item_list').append('<div class="col-md-3" onclick="$.add_to_cart('+data['item']['id']+','+data['remaining_quantity']+')"> <div class="card card-hov rounded-3 mb-2"> <div class="card-body"> <div class="img-size mb-2"> <img src="'+img+'" class="rounded-3"> </div> <p class="font-size-13 text-left fw-bold mb-1">'+data['item']['name']+'</p>   <div class="d-flex justify-content-between"> <p class="mb-0 text-success"> '+currency+' '+ data['selling_price'].toFixed(3)+' </p> <p class="mb-0 text-success"> '+ taxx+' <i class="mdi mdi-information-outline"></i> </p> </div> </div> </div> </div>');  
                        }
                    });
                }
            });
        }

        var cat_id = "all";
        if(cat_id){
            $.category_item('category_id',cat_id);
        }

        $.maxvalue_value = function(max , id_s){

            var qty_id = "#qty_"+id_s;
            var qty_value = $(qty_id).val();             
            if(parseInt(qty_value) > max){
                toastr.warning("There are only "+max+" item in the stock");   
                $(qty_id).val(max);
            } 
            else if(parseInt(qty_value) <= 0){
                $(qty_id).val(1); 
            } 
            $.calculate(id_s);

 
        }

        $.add_to_cart = function(item_id,max_val){            
            if(item_id){
                $.ajax({
                    url: "{{ route('add-item-to-cart') }}",
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: item_id,
                    },
                    cache: false,
                    async: false,
                    success: function(data) {
                        // var tax_typ = '';
                        // if(data['selling_price_tax_type'] == "Exclusive"){
                        //     tax_typ = "<span class='badge badge-soft-warning'>Exclusive</span>";  
                        // }
                        // else if(data['selling_price_tax_type'] == "Inclusive"){
                        //     tax_typ = "<span class='badge badge-soft-info'>Inclusive</span>";  
                        // } 

                        var item_ids = new Array();
                        $("input[name='ordered_item_id[]']").each(function() {
                            item_ids.push(this.value);
                        });

                        var count = $('table').children('tbody').children('tr');
                        

                        var exists = check_accurance(item_ids, data['id']);
                            if (exists) {                                
                                var row = document.getElementById(data['id']);
                                var inputField = row.querySelector('input');                                
                                var inputValue = inputField.value;                                                              
                                $.increase(max_val,inputValue);
                            } else {
                               
                            $('#cart_products').append('<div id="'+data['id']+'" class="p-2 bg-grey bod mb-2"> <div class="d-flex justify-content-between align-items-center mb-2">'
                                +' <h6>'+data['item']['name'].substring(0,20)+' </h6> <input type="hidden" value="'+data['id']+'" name="ordered_item_id[]"><div class="d-flex justify-content-between align-items-center gap-2"> <div class="quantity">'
                                +' <button class="minus" aria-label="Decrease" onclick="$.decrease('+data['id']+')"> - </button><input name="quantity[]" type="number" id="qty_'+data['id']+'" onblur="$.maxvalue_value('+max_val+','+data['id']+')" onkeypress="return $.numeric_period();" class="input-box" value="1"> <button class="plus" aria-label="Increase" onclick="$.increase('+max_val+','+data['id']+')">+</button> '
                                +' </div> <i class="mdi mdi-trash-can-outline text-danger" onclick="$.delete_one_html_order('+data['id']+')"></i> </div> </div> <div class="d-flex justify-content-between align-items-center"> '
                                +'<p class="mb-0">Amt. <span id="selling_price_html'+data['id']+'"></span> </p> <div class="d-flex justify-content-between align-items-center gap-3"> <p class="mb-0">Tax <span id="tax_per_html'+data['id']+'"> </p> <p class="mb-0">Dis. <span id="discount_per'+data['id']+'"></p> '
 
                                    +'<input type="hidden" value="'+data['selling_price']+'" id="sell_price_id'+data['id']+'" name="selling_price[]">'
                                    +'<input type="hidden" value="'+data['discount_per']+'" name="discount_per[]">'
                                    +'<input type="hidden" value="'+data['tax_per']+'" name="tax_per[]">'
                                    +'<input type="hidden" value="'+data['selling_price_tax_type']+'" name="selling_price_tax_type[]">'

                                    +'<input type="hidden" value="" name="tax_val[]">'
                                    +'<input type="hidden" value="" name="discount_val[]">'
                                    +'<input type="hidden" value="" name="net_val[]">'
                                    +'<input type="hidden" value="" name="sub_total_val[]">'

                                +'</div> </div> </div>');
 
 
                                $.auto_load();
                            }
                    }
                });
            }
        }


        $.delete_one_html_order = function(div_id) {
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
                    const parent = document.getElementById('cart_products');
                    const child = document.getElementById(div_id);
                    if (child) {
                        parent.removeChild(child);
                    } 
                    $.auto_load();
                    
                }
            })
        }

        $.auto_load = function() {

            $('#all_grand_total').html('0.000');
            $('#all_sub_total').html('0.000');
            $('#all_tax').html('0.000');
            $('#all_discount').html('0.000'); 
            $('#rem_balance_val').val('0.000');
            $('#rem_balance_html').html('0.000');



            $("input[name='ordered_item_id[]']").each(function() {
                $.calculate(this.value);
            });
        }
        $.auto_load();

        $.save_order = function(status){
            var order_id =$('#order_id').val();
            var customer_id =$('#customer_id').val();
                         
            var quantity = new Array();         
            $("input[name='quantity[]']").each(function() {
                quantity.push(this.value); 
            });

            var product_id = new Array();
            $("input[name='ordered_item_id[]']").each(function() {
                product_id.push(this.value); 
            });

            if(customer_id){
                if(quantity.length > 0 && product_id.length > 0){                                
                    $.ajax({ 
                    type: "post",
                    url: "{{ route('save-order-by-emp') }}",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        order_id: order_id,
                        quantity: quantity,
                        product_id: product_id,
                        status: status,
                        customer_id: customer_id,
                    },
                    cache: false, 
                    async: false,
                        success: function(response) {
                            if(response[0] == "200"){
                                $('#order_id').val(response[1]);
                                $('#order_no').html(response[4]);
                                
                                toastr.success("Order Saved with order id "+response[2]);                            
                                location.href=response[3];
                            }
                            else{
                                error("error",response[1]);
                            }
                        }
                    });                             
                }
                else{
                    error("error","Please order atleast one item");
                }               
            }
            else{
                error("error","Please select customer first");
            }
        }

        $.item_search = function(v){
            if(v.value.length > 2){
                var input_value = v.value; 
                if(input_value){                
                    $.category_item(input_value,"search");
                }
            }
        }

        $.select_cust = function(){
            var customer_id =$('#customer_code_c').val();
            if(customer_id){
                $.ajax({
                    type: "get",
                    url: "{{ route('find-doc-id') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        model: "Customer",                    
                        id: customer_id,
                    },
                    cache: false, 
                    async: false,
                    success: function(response) {                         
                        $('#customer_id').val(response['id']);
                        $('#customer_code').html(response['name']);
                        $('.open-customer').modal('hide');                             
                    }
                });
            }
        }

        $.find_customer = function(column_name){  
            var column_value = '';
            column_value = $('#c_phone_no').val();
            if(!column_value){
                column_value = $('#c_code').val();
            }
            if(!column_value){
                column_value = $('#c_name').val();
            }
            if(!column_value){
                column_value = $('#c_email').val();
            }
           
            if(column_value){
                $.ajax({
                    type: "get",
                    url: "{{ route('search-customer-by-value') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        column_value: column_value,
                        column_name: column_name,
                    },
                    cache: false, 
                    async: false,
                    success: function(response) { 
                        if(types == "details"){
                            if(response[1].initial_cash > 0){
                                $('#initial_cash').html(response[0] + ' ' +response[1].initial_cash.toFixed(3));
                            }

                            if(response[1].cash_payment > 0){
                                $('#cash_payment').html(response[0] + ' ' +response[1].cash_payment.toFixed(3));
                            }

                            if(response[1].card_payment > 0){
                                $('#card_payment').html(response[0] + ' ' +response[1].card_payment.toFixed(3));
                            }

                            if(response[1].loyality_point_payment > 0){
                                $('#loyality_point_payment').html(response[0] + ' ' +response[1].loyality_point_payment.toFixed(3));
                            }

                            if(response[1].upi_payment > 0){
                                $('#upi_payment').html(response[0] + ' ' +response[1].upi_payment.toFixed(3));
                            }

                            if(response[1].sales_tax_return_payment > 0){
                                $('#sales_tax_return_payment').html(response[0] + ' ' +response[1].sales_tax_return_payment.toFixed(3));
                            }

                            if(response[1].total_amount > 0){
                                $('#total_amount').html(response[0] + ' ' +response[1].total_amount.toFixed(3));
                            }

                            if(response[1].total_sales_return > 0){
                                $('#total_sales_return').html(response[0] + ' ' +response[1].total_sales_return.toFixed(3));
                            }
                        }
                        else if(types == "close"){
                            if(response[1].initial_cash > 0){
                                $('#closing_cash').html(response[0] + ' ' +response[1].initial_cash.toFixed(3));
                            }
                            if(response[1].total_amount > 0){
                                $('#ordered_cash').html(response[0] + ' ' +response[1].total_amount.toFixed(3));
                            }
                        }
                    }
                }); 
            }
        }       

        var count="0";
        $(".cust_sel").on('change',function() {
            if(count=="0")
            {
                count="1";
                var ids = $(this).val();             
                $('#customer_name').val(ids).trigger('change');
                $('#customer_email').val(ids).trigger('change'); 
                $('#customer_code_c').val(ids).trigger('change');
                $('#customer_phone_no').val(ids).trigger('change');

                setTimeout(function() {
                    count = "0";
                }, 500);
            }
        });              

        $('#customer_store').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);        
            
            $.ajax({
                url: "{{ route('customer-store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status == "200"){
                        success('success',"Customer Created with customer code "+response.code);
                        $('#customer_id').val(response.message);
                        $('#customer_code').html(response.name);
                        $('.add-cus-modal').modal('hide');                                                 
                    }
                    else{
                        error('error',response.message);
                    }
                },
                error: function(xhr, status, error) {
                    error('error',"Something went wrong");
                }
            });
        });
       
    });     

    const buttons = document.querySelectorAll('.btn-back ');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
 
    function toggleSelect(card) {
        card.classList.toggle('selected');
    }
   
    function calculate() {
        try {
            document.getElementById('display').value = eval(document.getElementById('display').value);
        } catch (e) {
            document.getElementById('display').value = 'Error';
        }
    }
    
    function scrollNav(direction) {
        const nav = document.querySelector('.nav');
        const scrollAmount = 200; // Adjust this value to control how much the scroll moves
        if (direction === 'left') {
            nav.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        } else if (direction === 'right') {
            nav.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    }
 
</script>
