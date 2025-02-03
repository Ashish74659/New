<script>
    var cmp_l = 0;
    var bil_l = 0;
    var rpt_l = 0;

    var lg1 = "{{$data?->company_logo}}";
    if(lg1){
        cmp_l =1;
    }
    var lg2 = "{{$data?->bill_logo}}";
    if(lg2){
        bil_l =1;
    }
    var lg3 = "{{$data?->report_logo}}";
    if(lg3){
        rpt_l =1;
    }

    $(document).ready(function () {            
         $.enable_parent = function(){                        
            if($('#enable_parent').is(':checked')) {
                $("#parent_company").css("display", "block");
            }
            else{
                $("#parent_company").css("display", "none");
            }
         }
         $.enable_parent();

         $.pos_type = function(){           
            $("#enable_restorent").css("display", "none"); 
            var model = "POSType";
            var id =$('#pos_type_id').val();
            if(model && id){                
                $.ajax({
                type: "get",
                url: "{{ route('find-doc-id') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    model: model,
                    id: id
                },
                cache: false,
                async: false,
                success: function(response) {
                    if(response.enable_seating_arrangement == "Yes"){
                        $("#enable_restorent").css("display", "block"); 
                    }
                }
                });
            }            
         }
         $.pos_type();


         $.get_prefix = function(col_name){
            $('#col_name').val('');
            $('#old_prefix').val('');
            $('#prefix').val('');
            $('#prefix_table_html').html('');
            
            var company_id =$('#company_id').val();          
            if(company_id && col_name){                              
                $.ajax({
                type: "get",
                url: "{{ route('company-get-prefix-info') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    col_name: col_name
                },
                cache: false, 
                async: false,
                    success: function(response) {
                         if(response.status == "200"){ 
                            $('#col_name').val(col_name);
                            $('#old_prefix').val(response.message[0]);                            
                            $('#bs-example-modal-center').modal('show');  
                            $.each(response.message[1],function(index,data){                                 
                                $('#prefix_table_html').append('<tr> <td>'+data['old_prefix']+'</td> <td>'+data['created_at'].substring(0,10)+'</td> </tr>');                              
                            });                            
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }
            else{
                toastr.error("Please fill Column prefix name");
            } 

         }

         $.get_tile = function(col_name){
            $('#col_name_tile').val('');
            $('#old_tile').val('');
            $('#tile').val('');
            $('#tile_table_html').html('');
            
            var company_id =$('#company_id').val();          
            if(company_id && col_name){                              
                $.ajax({
                type: "get",
                url: "{{ route('company-get-tile-info') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    col_name: col_name
                },
                cache: false, 
                async: false,
                    success: function(response) {
                         if(response.status == "200"){
                            $('#col_name_tile').val(col_name);
                            $('#old_tile').val(response.message[0]);                            
                            $('#bs-example-modal-tile').modal('show');  
                            $.each(response.message[1],function(index,data){                                 
                                $('#tile_table_html').append('<tr> <td>'+data['old_tile']+'</td> <td>'+data['created_at'].substring(0,10)+'</td> </tr>');                              
                            });                            
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }
            else{
                toastr.error("Please fill Column Tile");
            } 

         }

         $.get_logos = function(col_name){             
            $('#company_logo_html').html(''); 
            var company_id =$('#company_id').val();          
            if(company_id){
                $.ajax({
                type: "get",
                url: "{{ route('company-get-logo') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id
                },
                cache: false, 
                async: false,
                    success: function(response) {                                                
                        if(response.status == "200"){ 
                            // company_logo','bill_logo','report_logo
                            if(response.message['company_logo'])
                            { 
                                var cmp_logo = $.document_path(response.message['company_logo']);
                                $('#company_logo_html').html('<div class="new-logo ms-auto"> <a href="'+cmp_logo+'"> <img src="'+cmp_logo+'" height="50" width="50"> </a> </div>');
                            }  
                            if(response.message['bill_logo'])
                            {
                                var bil_logo = $.document_path(response.message['bill_logo']);
                                $('#bill_logo_html').html('<div class="new-logo ms-auto"> <a href="'+bil_logo+'"> <img src="'+bil_logo+'" height="50" width="50"> </a> </div>');
                            } 
                            if(response.message['report_logo'])
                            {
                                var rpt_logo = $.document_path(response.message['report_logo']);
                                $('#report_logo_html').html('<div class="new-logo ms-auto"> <a href="'+rpt_logo+'"> <img src="'+rpt_logo+'" height="50" width="50"> </a> </div>');
                            }                                                 
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }           
         }
         $.get_logos();
         
         $.store_prefix = function(){
            var company_id =$('#company_id').val();
            var col_name =$('#col_name').val();
            var prefix =$('#prefix').val();
            var old_prefix =$('#old_prefix').val();
            var col_html = "#"+col_name;

            if(company_id && col_name && prefix){                                                
                if(old_prefix != prefix){
                    $.ajax({
                    type: "post",
                    url: "{{ route('company-prefix-store') }}",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        company_id: company_id,
                        col_name: col_name,
                        prefix: prefix
                    },
                    cache: false, 
                    async: false,
                        success: function(response) {
                            if(response.status == "200"){
                                $(col_html).val(prefix);
                                toastr.success(response.message); 
                                $('#bs-example-modal-center').modal('hide'); 
                            }
                            else{
                                toastr.error(response.message);
                            }
                        }
                    });
                }
                else{
                    toastr.error("Current Prefix and New Prefix can not be same");
                }
            }
            else{
                toastr.error("Please fill New Prefix.");
            } 
         }

         $.store_tile = function(){
            var company_id =$('#company_id').val();
            var col_name =$('#col_name_tile').val();
            var tile =$('#tile').val();
            var old_tile =$('#old_tile').val();
            var col_html = "#"+col_name;
 
            if(company_id && col_name && prefix){                                                
                if(old_prefix != prefix){
                    $.ajax({
                    type: "post",
                    url: "{{ route('company-tile-store') }}",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        company_id: company_id,
                        col_name: col_name,
                        tile: tile
                    },
                    cache: false, 
                    async: false,
                        success: function(response) {
                            if(response.status == "200"){
                                $(col_html).val(tile);
                                toastr.success(response.message); 
                                $('#bs-example-modal-tile').modal('hide'); 
                            }
                            else{
                                toastr.error(response.message);
                            }
                        }
                    });
                }
                else{
                    toastr.error("Current Tile and New Tile can not be same");
                }
            }
            else{
                toastr.error("Please fill New Tile.");
            } 
         }
         
         $.all_prefix_store = function(){
            var company_id =$('#company_id').val();
            var order_prefix =$('#order_prefix').val();
            var sales_return_prefix =$('#sales_return_prefix').val();                                                     
            var receipt_prefix =$('#receipt_prefix').val();
            var customer_prefix =$('#customer_prefix').val();
            var invoice_prefix =$('#invoice_prefix').val();
            if(company_id && order_prefix && sales_return_prefix && receipt_prefix && customer_prefix && invoice_prefix){
                $.ajax({
                type: "post",
                url: "{{ route('company-all-prefix-store') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    order_prefix: order_prefix,
                    sales_return_prefix: sales_return_prefix,
                    receipt_prefix: receipt_prefix,
                    customer_prefix: customer_prefix,
                    invoice_prefix: invoice_prefix, 
                },
                cache: false, 
                async: false,
                    success: function(response) {
                        if(response.status == "200"){                            
                            toastr.success(response.message);                             
                        }
                        else{
                            toastr.error(response.message);
                        }
                    }
                });
            }
            else{
                toastr.error("Please fill all prefixes");
            }
             
         }
         
         $.all_tile_store = function(){
            var company_id =$('#company_id').val();
            var tile_1 =$('#tile_1').val(); 
            var tile_2 =$('#tile_2').val(); 
            var tile_3 =$('#tile_3').val(); 
            var tile_4 =$('#tile_4').val(); 
            if(company_id && tile_1 && tile_2 && tile_3 && tile_4){
                $.ajax({
                type: "post",
                url: "{{ route('company-all-tile-store') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    tile_1: tile_1,
                    tile_2: tile_2,
                    tile_3: tile_3,
                    tile_4: tile_4,
                },
                cache: false, 
                async: false,
                    success: function(response) {
                        if(response.status == "200"){                            
                            toastr.success(response.message);                             
                        }
                        else{
                            toastr.error(response.message);
                        }
                    }
                });
            }
            else{
                toastr.error("Please fill all prefixes");
            }
             
         }
 
         $.company_setting = function(){   
            var code =$('#code').val();
            var name =$('#name').val();
            var company_id =$('#company_id').val();
            var pos_type_id =$('#pos_type_id').val();
            var parent_id =$('#parent_id').val();                        
            var enable_table_booking = "No";
            var enable_receipt_printing = "No";
            if($('#enable_parent').is(':checked')) {
                var enable_parent = "Yes";    
                if(!parent_id){
                    toastr.error("Please fill Parent for company");                   
                    return false;
                }
            }
            else{
                var enable_parent = "No";
                parent_id = null;
            }
            if($('#enable_table_booking').is(':checked')) {
                enable_table_booking = "Yes";
            }
            if($('#enable_receipt_printing').is(':checked')) {
                enable_receipt_printing = "Yes";
            }

            if(code && name && pos_type_id){
                $.ajax({
                type: "post",
                url: "{{ route('company-setting-store') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    enable_parent: enable_parent,
                    code: code,
                    name: name,
                    pos_type_id: pos_type_id,
                    parent_id: parent_id,
                    enable_table_booking: enable_table_booking,
                    enable_receipt_printing: enable_receipt_printing
                },
                cache: false, 
                async: false,
                    success: function(response) {
                         if(response.status == "200"){
                            toastr.success(response.message);
                            location.href=response.url;
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }
            else{
                toastr.error("Please fill Code , Name and Type properly");
            } 

         }

         $.contact_information = function(){
            var company_id =$('#company_id').val();
            var address =$('#address').val();
            var city =$('#city').val();
            var country_id =$('#country_id').val();
            var region =$('#region').val();

            var phone_no =$('#phone_no').val();
            var post_box =$('#post_box').val();
            var email =$('#email').val();
                                 
            if(company_id && country_id && email && phone_no){
                $.ajax({
                type: "post",
                url: "{{ route('company-contact-info-store') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    address: address,
                    city: city,
                    country_id: country_id,
                    region: region,
                    phone_no: phone_no,
                    post_box: post_box,
                    email: email
                },
                cache: false, 
                async: false,
                    success: function(response) {
                         if(response.status == "200"){
                            toastr.success(response.message);                            
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }
            else{
                toastr.error("Please fill Email , Country or Phone No.");
            }
 

         }

         $.business_localization = function(){
            var company_id =$('#company_id').val();
            var date_formate_id =$('#date_formate_id').val();
            var time_formate =$('#time_formate').val();
            var time_zone_id =$('#time_zone_id').val();
            var currency_id =$('#currency_id').val();                     
            if(company_id && date_formate_id && time_formate && time_zone_id && currency_id){
                $.ajax({
                type: "post",
                url: "{{ route('company-business-localization') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    company_id: company_id,
                    date_formate_id: date_formate_id,
                    time_formate: time_formate,
                    time_zone_id: time_zone_id,
                    currency_id: currency_id
                },
                cache: false, 
                async: false,
                    success: function(response) {
                         if(response.status == "200"){
                            toastr.success(response.message);                            
                         }
                         else{
                            toastr.error(response.message);
                         }
                    }
                });
            }
            else{
                toastr.error("Please fill date , formate , time formate , time zone and currency");
            }
         }

         $.logo_information = function(){
            var company_id =$('#company_id').val();
            var bill_header =$('#bill_header').val();
            var bill_footer =$('#bill_footer').val();
            var company_logo = $('#company_logo')[0].files;
            var report_logo = $('#report_logo')[0].files;
            var bill_logo = $('#bill_logo')[0].files;
 
            if((company_logo.length>0 || cmp_l) && (bill_logo.length>0 || bil_l) && (report_logo.length>0 || rpt_l)){
                if(company_id && bill_header && bill_footer){
                    var fd = new FormData();
                    if(company_logo.length>0){
                        fd.append('company_logo', company_logo[0]);
                    }
                    if(bill_logo.length>0){
                        fd.append('bill_logo', bill_logo[0]);
                    }
                    if(report_logo.length>0){
                        fd.append('report_logo', report_logo[0]);
                    }
                    fd.append('company_id', company_id);
                    fd.append('bill_header', bill_header);
                    fd.append('bill_footer', bill_footer);            
                    
                    fd.append('_token', '{{ csrf_token() }}');
                    $.ajax({
                        url: "{{ route('company-logo-information') }}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        cache: false,
                        async: false,
                        success: function(response) {
                            if(response.status == "200"){
                                $.get_logos();
                                toastr.success(response.message);                            
                            }
                            else{
                                toastr.error(response.message);
                            }
                        }
                    });
                }
                else{
                    toastr.error("Bill Header Information and Bill Footer Information");
                }
            }           
            else{
                toastr.error("Please fill All logos");
            }                            
         }         

    }); 

</script>