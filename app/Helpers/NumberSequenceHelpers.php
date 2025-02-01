<?php
namespace App\Helpers;
use App\Http\Controllers\Controller;
use log;
use App\Helpers\ModelHelper;


use Carbon\Carbon;
class NumberSequenceHelpers
{ 
    // public static function apply_no_sequence($type,$company_id)
    // {
    //     $cmp_id = Controller::helper('ModelHelper')::sequence_type();
    //     if($cmp_id){
    //         $company_id = $cmp_id;
    //     }
    //     else{
    //         $company_id = 1;
    //     }
        
    //     $map_id = Controller::model('Number_Sequence_Map')::where('name',$type)->pluck('id')->first();
    //     if($map_id){
    //         $sequence = Controller::model('Numbersequence')::where('numbersequence_map_id',$map_id)->where('company_id',$company_id)->first();
    //         if($sequence){
    //             return $sequence?->constant_no . str_pad($sequence?->next, $sequence?->range_no, '0', STR_PAD_LEFT);
    //         }
    //         return 0;
    //     }
    //     return 0;
    // }

    // public static function update_no_sequence($type,$company_id)
    // {
    //     $cmp_id = Controller::helper('ModelHelper')::sequence_type();
    //     if($cmp_id){
    //         $company_id = $cmp_id;
    //     }

    //     if($type == "Supplier Request" || $type == "Vendor Registration" || $type == "Vendor Approval"){
    //         $company_id = Controller::model('Company')::where('default_company', 'Yes')->pluck('id')->first();
    //         if (!$company_id) {
    //             $company_id = 1;
    //         }
    //     }

    //     $map_id = Controller::model('Number_Sequence_Map')::where('name',$type)->pluck('id')->first();
    //     if($map_id){
    //         $sequence = Controller::model('Numbersequence')::where('numbersequence_map_id',$map_id)->where('company_id',$company_id)->first();
    //         if($sequence){
    //             $sequence->next = intVal($sequence->next)+1;
    //             $sequence->save();
    //             return true; 
    //         }
    //         return false;
    //     }
    //     return false;
    // }

    public static function number_sequence_generate($type,$model) //order_prefix sales_return_prefix // receipt_prefix // customer_prefix // invoice_prefix
    {         
        $nextSerialNumber = null;
        $company_id = Controller::user()?->company_id;
        $mod = 'App\Models\\' . $model;        
        $column = $type.'_prefix';
        $prefixss = Controller::model('Company')::find($company_id)?->$column;                
        if(!$prefixss){
            return $nextSerialNumber;
        } 
        $pre = explode("-",$prefixss);
        if(count($pre)>=2){
            $prefix = $pre[0].'-';
            $lengthSequence = strlen($pre[1]); 
            $lastSerialNumber = $mod::where('company_id',$company_id)->where('code','LIKE',"{$prefix}%")->latest()->pluck('code')->first();                    
            if ($lastSerialNumber) {
                $lastSerialNumberWithoutPrefix = (int) substr($lastSerialNumber, strlen($prefix));            
                $nextSerialNumber = $prefix . str_pad($lastSerialNumberWithoutPrefix + 1, $lengthSequence, '0', STR_PAD_LEFT);
            } else {
                $nextSerialNumber = $prefix . str_pad(1, $lengthSequence, '0', STR_PAD_LEFT);            
            } 
        }
        return $nextSerialNumber;        
    }

    public static function generateNumberSequence($model, $column, $prefix, $lengthSequence)
    {
        $mod = 'App\Models\\' . $model;
        $lastSerialNumber = $mod::latest()->first();
        if ($lastSerialNumber) {
            $lastSerialNumberWithoutPrefix = (int) substr($lastSerialNumber->$column, strlen($prefix));
            $nextSerialNumber = $prefix . str_pad($lastSerialNumberWithoutPrefix + 1, $lengthSequence, '0', STR_PAD_LEFT);
        } else {
            $nextSerialNumber = $prefix . str_pad(1, $lengthSequence, '0', STR_PAD_LEFT);
        }
        return $nextSerialNumber;
    }

   




}
