<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use ZipArchive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Vt_Docouments;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModelHelper
{
    // public static function encrypt($plaintext, $password) {
    //     $method = "AES-256-CBC";
    //     $key = hash('sha256', $password, true);
    //     $iv = openssl_random_pseudo_bytes(16);    
    //     $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    //     $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);    
    //     return $iv . $hash . $ciphertext;
    // }    
 
    // public static function decrypt($ivHashCiphertext, $password) {
    //     $method = "AES-256-CBC";
    //     $iv = substr($ivHashCiphertext, 0, 16);
    //     $hash = substr($ivHashCiphertext, 16, 32);
    //     $ciphertext = substr($ivHashCiphertext, 48);
    //     $key = hash('sha256', $password, true);    
    //     if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;    
    //     return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    // }
  
    public static function getactive($mod, $type)
    {
        $with = null;   
        if ($mod == 'EmailTemplate')
            $with = ['email_master'];
       

        if ($mod == "Customer") {
            $cmp_id = Auth::user()->company_id;
            if ($type == 'Active') {
                if ($with)
                    return Controller::model($mod)::ActiveOnly($cmp_id)->with($with)->where('status', 'Active')->get();
                else
                    return Controller::model($mod)::ActiveOnly($cmp_id)->where('status', 'Active')->get();
            } else {
                if ($with)
                    return Controller::model($mod)::ActiveOnly($cmp_id)->with($with)->get();
                else
                    return Controller::model($mod)::ActiveOnly($cmp_id)->get();
            }
        } else {
            if ($type == 'Active') {
                if ($with)
                    return Controller::model($mod)::with($with)->where('status', 'Active')->get();
                else
                    return Controller::model($mod)::where('status', 'Active')->get();
            } else {
                if ($with)
                    return Controller::model($mod)::with($with)->get();
                else
                    return Controller::model($mod)::get();
            }
        }

    }

    public static function find($mod, $id)
    {
        $with = null;       
        // if ($mod == 'QuotationHeader')
        //     $with = ['vendor', 'quotation', 'quotationcase'];        
        if ($with)
            return Controller::model($mod)::with($with)->find($id);
        else
            return Controller::model($mod)::find($id);
    }
 

    public static function children_by_parent($child, $parent_column, $id)
    {
        $cmp_id = Auth::user()?->company_id;
        $with =null;
        // if($child=='Taskline')
        //     $with = ['task','checklist'];
                  
        if($with)
            return Controller::model($child)::with($with)->where($parent_column,$id)->where('status','Active')->get();
        else
            return Controller::model($child)::where($parent_column, $id)->where('status', 'Active')->get();
    }

    public static function get_id_array($model, $column_name, $id, $find_column, $type)
    {
        $data = [];
        $all = Controller::model($model)::where($column_name, $id)->get();
        if (count($all) > 0) {
            foreach ($all as $individual) {
                if ($individual->$find_column)
                    $data[] = $individual->$find_column;
            }
        }
        if ($type == 'unique')
            return array_unique($data);
        else
            return $data;

    }

    public static function array_to_allrecord($model, $ids)
    {
        $data = [];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                $dat = Controller::model($model)::find($id);
                if ($dat) {
                    $data[] = $dat;
                }
            }
        }
        return $data;
    }
  
    public static function changestatus($model, $id, $status)
    {
        $data = Controller::model($model)::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();
            return true;
        }
        return false;
    }
  
   
    public static function getactiveusers()
    {
        $users = Controller::model('User')::where('status', "Active")->get();
        return $users;
    }
 

  
 
    public static function compresstozip($model, $id)//,$files, $file_name)
    {
        $zip = new ZipArchive;
        $zipFile = $model . time() . rand(100, 999) . '.zip';
        if ($zip->open(public_path($zipFile), ZipArchive::CREATE) === TRUE) {
            $data = Controller::model($model)::with('images')->find($id);
            if ($data?->images) {
                foreach ($data?->images as $val) {
                    $value = public_path() . '/' . $val->url . '/' . $val->name;
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
                }
                $zip->close();
                return response()->download($zipFile)->deleteFileAfterSend(true);
            } else
                return false;
        } else
            return false;

    }
   
    public static function filterbystatus($model, $status)
    {
        $user_id = Auth::user()->id;
        $cmp_id = Auth::user()->company_id;
        $query = Controller::model($model)::ActiveOnly($cmp_id);

        if ($status == 'createdbyme') {
            $data = $query->where('created_by', $user_id)->get();
        } else if ($status == 'all') {
            $data= $query->get();
        } 
        else{
            $data = $query->where('status', $status)->get();
        }
        if(role() =='User')
        {
            return $data->where('created_by',$user_id);
        }

        return $data;


    }

  
    public static function yajraList($model, $filter)
    {
        $user_id = Auth::user()->id;
        $cmp_id = Auth::user()->company_id;

        $data = Controller::model($model)::ActiveOnly($cmp_id)
        ->when($filter=="created_by_me", function ($query) use ($user_id) {
            $query->where('created_by', $user_id);
        })
        ->when($filter && $filter!="created_by_me", function ($query) use ($filter) {
            $query->where('status', $filter);
        })
        ->orderby('id','desc');
        if(role()== 'User')
        {
            $data = $data->where('created_by', $user_id);
        }
        return $data;

    }
  
    public static function folder_name($doc_id, $doc_model, $document_type, $uploadedImage, $size, $file_type)
    {
        $extension = $uploadedImage->getClientOriginalExtension();

        if ($file_type == "image" || $file_type == "images")
            $allowedExtensions = ['jpeg', 'png', 'jpg'];
        else if ($file_type == "document")
            $allowedExtensions = ['pdf', 'doc', 'docx', 'xlsx', 'xls'];
        else if ($file_type == "image_document")
            $allowedExtensions = ['jpeg', 'png', 'jpg', 'pdf', 'doc', 'docx', 'xlsx', 'xls'];

        if (in_array($extension, $allowedExtensions) && $uploadedImage->getSize() / 1048576 <= $size) {             
            $doc_data = Controller::model($doc_model)::where('id', $doc_id)->first();
            
            if ($doc_data) {
                $company_id = $doc_data->company_id;
                $doc_code = base64_encode(convert_uuencode($doc_id));
            } else {
                return false;
            }

            $company = Controller::model('Company')::where('id', $company_id)->first();
            $company_name = $company ? $company->name : 'UnknownCompany';
            $company_name = ($company_name);
            $doc_type = ($doc_model);
            $document_type = ($document_type);
            $folder_path = "documents/{$company_name}/{$doc_model}/{$doc_code}/{$document_type}";

            $imageName = time() . rand(100, 999) . '.' . $extension;
            $image_url = "{$folder_path}/{$imageName}";

            Storage::disk('public')->makeDirectory($folder_path);

            Storage::disk('public')->putFileAs($folder_path, $uploadedImage, $imageName);

            return [$imageName, $image_url];
        } else {
            return false;
        }
    }


    public static function user_type()
    {
        $user = Controller::user();
        return [$user?->id,$user?->company_id,$user?->type];
    }

    public static function leftbar_detaild()
    {
        $user = Auth::user();
        if ($user?->status == "Active") {
            if ($user?->type == 'User') {
                $type = "Emp";
            } else if ($user?->type == 'Admin') {
                $type = "Admin";
            }
            if ($user?->profile_img) {
                $img = $user?->profile_img;
            } else {
                $img = $user?->profile_img;
            }
            return [$type, $user?->name, $img,$user?->company?->name];
        }
        return ['', '', '',''];
    }

    public static function filterheader()
    {
        return ' <div class="row">';
    }

    public static function filterfooter()
    {
        return '</div>';
    }
 
  

    public static function default_currency()
    {
        return Controller::model('SystemAdminSetup')::pluck('default_currency_id')->first();
    }
 
   
 
    public static function default_company_id()
    {
        $company_id = Controller::model('Company')::where('default_company', 'Yes')->pluck('id')->first();
        if (!$company_id) {
            return 1;
        } else {
            return $company_id;
        }
    }
 
    public static function companies_by_doc_id($user_type_id, $id)
    {
        $company = Controller::model('UserCompany')::where($user_type_id, $id)->where('status', 'Active')->get()->pluck('company_id')->toArray();
        return array_unique($company);
    }

    public static function companies()
    {
        $data = Controller::loginandcompany();
        $company = Controller::model('UserCompany')::with('company')->where('status', 'Active')->where('user_id', $data[0])->get();
        return [$company, $data[1]];
    }     

    public static function fileStore_new($files, $parentMod, $unique_id, $attchment_type, $file_type, $extra_id = null)
    {
        try {
            foreach ($files as $file) {
                $imgs = new Vt_Docouments();
                $imgs->vendor_profile_id = $unique_id;
                $imgs->documentsable_id = $extra_id ? $extra_id : $unique_id;
                $imgs->documentsable_type = $parentMod;
                $imgs->attechmentType = $attchment_type;
                $imgs->company_id = null;
                $imgs->created_by = Auth::user()->id;
                $imgs->name = $file;
                $imgs->save();
            }
            return true;
        } catch (Exception $e) {
            return $this->errorResponse([__('common.error') => 'Exception: ' . $e->getMessage()], 500);
        }
    }


    public static function current_date_time()
    { // current date and time by Ashish
        return Carbon::parse(now())->format('Y-m-d H:i:s');
    }

    public static function current_date_time_incarbon()
    { // current date and time by Ashish
        return now();
    }

    public static function current_time()
    { // current  time by Ashish
        return now()->format('H:i:s');
    } 

  
    public static function time_zone_of_user()
    {
        $company_id = Controller::user()?->company_id;
        $time_zone_id = Controller::model('Company')::where('id',$company_id)->pluck('time_zone_id')->first();         
        $time_zone = Controller::model('TimeZone')::find($time_zone_id);         
        if(!$time_zone){
            $time_zone = Controller::model('TimeZone')::first();
        }
        return [$time_zone?->name , $time_zone?->description];
    }  

    public static function date_formate_of_user()
    {
        $company_id = Controller::user()?->company_id;
        $date_formate_id = Controller::model('Company')::where('id',$company_id)->pluck('date_formate_id')->first();         
        $date_formate = Controller::model('DateFormate')::find($date_formate_id);         
        if(!$date_formate){
            $date_formate = Controller::model('DateFormate')::first();
        }
        return $date_formate?->name;
    }

    public static function time_formate_of_user()
    {
        $company_id = Controller::user()?->company_id;
        $time_formate = Controller::model('Company')::where('id',$company_id)->pluck('time_formate')->first();         
        if(!$time_formate){
            $time_formate = '12';
        }
        if($time_formate == '12')
        {
            $formate = 'h:i A';
        }
        else{
            $formate = 'H:i';
        }
        return [$time_formate,$formate];
    }
    
    public static function currency_of_user()
    {
        $company_id = Controller::user()?->company_id;
        $currency_id = Controller::model('Company')::where('id',$company_id)->pluck('currency_id')->first();         
        $currency = Controller::model('Currency')::find($currency_id);         
        if(!$currency){
            $currency = Controller::model('DateFormate')::first();
        }
        return [$currency?->symbol,$currency?->code];
    }

    public static function tender_tile()
    { 
        $tile = [];
        $company_id = Controller::user()?->company_id;
        $cmp = Controller::model('Company')::where('id',$company_id)->select('tender_tile_1','tender_tile_2','tender_tile_3','tender_tile_4')->first();         
        if($cmp->tender_tile_1){
            $tile[] = $cmp->tender_tile_1;
        }
        if($cmp->tender_tile_2){
            $tile[] = $cmp->tender_tile_2;
        }
        if($cmp->tender_tile_3){
            $tile[] = $cmp->tender_tile_3;
        }
        if($cmp->tender_tile_4){
            $tile[] = $cmp->tender_tile_4;
        }
        return $tile; 
        
    }


    public static function setDatabaseTimezone($timezone)
    { 
        $connection = config('database.default'); 
        $config = config("database.connections.{$connection}"); 
        if ($connection == 'mysql') { 
            $config['timezone'] = $timezone; 
            Config::set("database.connections.{$connection}", $config); 
            DB::reconnect($connection); 
            DB::statement("SET time_zone = '{$timezone}'");
        }
    }
    
    public static function existance_by_or($model,$columns,$values)
    { 
        $count = count($columns);        
        $company_id = Controller::user()?->company_id;
  
        switch($count){
            case 1: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->pluck('company_id')->toArray();
                break;

            case 2: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->Orwhere($columns[1],$values[1])->pluck('company_id')->toArray();
                break;

            case 3: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->Orwhere($columns[1],$values[1])->Orwhere($columns[2],$values[2])->pluck('company_id')->toArray();
                break;

            case 4: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->Orwhere($columns[1],$values[1])->Orwhere($columns[2],$values[2])->Orwhere($columns[3],$values[3])->pluck('company_id')->toArray();
                break;

            case 5: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->Orwhere($columns[1],$values[1])->Orwhere($columns[2],$values[2])->Orwhere($columns[3],$values[3])->Orwhere($columns[4],$values[4])->pluck('company_id')->toArray();
                break;             
            
            }            
            if($founds && count($founds)>0){
              if(in_array($company_id,$founds)){
                return true;
              }
            }
            return false;
    }


    public static function existance_by_and($model,$columns,$values)
    { 
        $count = count($columns);        
        $company_id = Controller::user()?->company_id;
  
        switch($count){
            case 1: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->where('company_id',$company_id)->first();
                break;

            case 2: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->where($columns[1],$values[1])->where('company_id',$company_id)->first();
                break;

            case 3: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->where($columns[1],$values[1])->where($columns[2],$values[2])->where('company_id',$company_id)->first();
                break;

            case 4: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->where($columns[1],$values[1])->where($columns[2],$values[2])->where($columns[3],$values[3])->where('company_id',$company_id)->first();
                break;

            case 5: 
                $founds = Controller::model($model)::where($columns[0],$values[0])->where($columns[1],$values[1])->where($columns[2],$values[2])->where($columns[3],$values[3])->where($columns[4],$values[4])->where('company_id',$company_id)->first();
                break;             
            
            }            
            if($founds){ 
                return true;          
            }
            return false;
    }
    
    public static function count_cat_subcat_item($parent_column,$id)
    {         
        $cmp_id = Controller::user()?->company_id;
        $count = 0;
            if($parent_column == "all"){
                $items = Controller::model('Item')::where('is_pos','Yes')->get();
            }
            else{
                $items = Controller::model('Item')::where($parent_column,$id)->where('is_pos','Yes')->get();
            }
            if($items && count($items)>0){                
                foreach($items as $itm){                
                    $collect = Controller::model('CompanyItem')::where('item_id',$itm->id)->where('remaining_quantity','>',0)->where('comy_id',$cmp_id)->where('not_for_selling','No')->count();                    
                    $count+=$collect;                             
                }
            }  
        return $count; 
    }
    
    
 
    

}
