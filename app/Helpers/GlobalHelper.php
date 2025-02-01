<?php 
use App\Http\Controllers\Controller;
    function document_path($path)
    {
        if(!$path){
            $path = "default_image/def.jpg";
        } 
        return route('secure-documents', ['path' => $path]);
    }

    function payment_allow($order_id)
    {
        if(strlen($order_id) > 10){
            $order_id = convert_uudecode(base64_decode($order_id));    
        }
        $data = Controller::model('OrderHeader')::find($order_id);
        if($data?->status == "Ongoing" || $data?->status == "Hold"){
             return true;
        }
        return false;
    }

    function no_format($no){
        if($no){
            return number_format((float)$no, 3, '.', '');
        }
        return '';
    }


    
