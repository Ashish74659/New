
<script>
    var count = 0;
    function appendToDisplay(value) {                 
        if(count == 0){
            var result = parseFloat(document.getElementById('rem_balance_val').value);
            var old_val = parseFloat(document.getElementById('display').value);
            if(!old_val){
                old_val = 0;
            }
            if(old_val == 0){ 
                var new_val = value;
            }
            else{
                var new_val = old_val + value;
            }
            
            if(result){
                document.getElementById('display').value = new_val;                        
                $('#rem_result_balance').val((new_val - result).toFixed(3));      
            }
            else{
                $('#rem_result_balance').val((0).toFixed(3));
            }
        }
    } 

    function appToDisplay(value) {
        count = 1;
        var result = parseFloat(document.getElementById('rem_balance_val').value);
        var old_val = parseFloat(document.getElementById('display').value);
        if(!old_val){
            old_val = 0;
        }
         
        var new_val = parseFloat(old_val) + parseFloat(value);                
        if(result){
            document.getElementById('display').value = new_val;                        
            $('#rem_result_balance').val((new_val - result).toFixed(3));      
        }
        else{
            $('#rem_result_balance').val((0).toFixed(3));
        }
    }
    

    function clearDisplay() {
        count = 0;
        document.getElementById('display').value = '';
        $('#rem_result_balance').val((0).toFixed(3));
    }

    $(document).ready(function() { 
        var initial_price = "{{$order?->grand_total}}";
        var loyalty_value = "{{$order?->company?->loyalty_value}}";
        var max_val = "{{$order?->customer?->loyality_point}}";  

        $.maxvalue_value = function(){
            var input_value = parseFloat($('#redeem_points').val());                    
            if(input_value >= max_val){                        
                $('#redeem_points').val(max_val);
            }
            else if(input_value < 0){
                $('#redeem_points').val(0);
            }
        }

        $.calculate = function(){  
            var loyality_reedem_points = parseFloat($('#use_loyality').val());
            var final = initial_price;
            if(loyality_reedem_points > 0){
                final = final - (loyality_reedem_points * loyalty_value);
            }
            $('#rem_balance_val').val(final);                    
        }
        $.calculate();
        
        $.reedem_now = function(){
            var max_point = "{{$order?->customer?->loyality_point}}";
            var input_value = parseFloat($('#redeem_points').val()); 

            if(max_point >= input_value){                                    
                $('#p_loyalty').html(input_value);
                $('#use_loyality').val(input_value);                                        
                $.calculate();
                $('.redeem').modal('hide');  
            }
            else{
                error("error","Customer has not enough loyality points");
            }
        }

        












    });

     
</script>