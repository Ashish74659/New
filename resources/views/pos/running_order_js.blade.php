<script>
    $(document).ready(function() {        
        var currency = "{{$currency}}";
         

        $.get_order_details = function(order_id){              
            $('#order_line_tabel').html('');

            $.ajax({                
                type: "get",
                url: "{{ route('order-detail') }}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    order_id:order_id, 
                },
                cache: false, 
                async: false,
                success: function(response) {                        
                    $.each(response, function(index, data) {                          
                        $('#order_line_tabel').append('<tr>'
                            +'<td> '+data['item']['name']+'</td>'
                            +'<td>'+ data['quantity']+'</td>'
                            +'<td>'+currency +' '+data['company_item']['selling_price']+'</td>'
                            +'<td>'+currency +' '+data['discount']+'</td>'
                            +'<td>'+currency +' '+data['tax']+'</td>'
                            +'<td>'+currency +' '+data['sub_total']+'</td>'
                            +'</tr>');  
                    });                                   
                }
            });            
        }
         
        
    });       
</script>
