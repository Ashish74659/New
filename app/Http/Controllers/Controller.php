<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    public static function loginandcompany()
     {
         $company = Auth::check() ? Auth::user()?->company_id : true;
         $userId = Auth::user()?->id;
         $authdetails = [$userId, $company];
         return $authdetails;
    }
 
    public static function vendor()
    {        
        return [null,null,null,0];
    }


    public static function vendor_id()
    { 
            return null;
    }
    public static function db(){
        return 'Illuminate\Support\Facades\DB';
    }

    public static function helper($help){
        return 'App\Helpers\\' . $help;
    }

    public static function model($mod){
        return 'App\Models\\' . $mod;
    }

    public static function user()
    {
        return Auth::user();
    }
    public static function user_id()
    {
        return Auth::user()?->id;
    }

    // public static function alertSuccess()
    // {
    //     return Alert::success('Success', 'Record is created successfully!')->autoClose(5000);
    // }
    // public static function alertalready()
    // {
    //     return Alert::error('Error', 'This Record is already exist.')->autoClose(5000);
    // }

    // public static function alerterror()
    // {
    //     return Alert::error('Something went wrong!')->autoClose(5000);
    // }
    // public static function errordelete() // added by kajal for record is use error on 29-04-2024
    // {
    //     return Alert::error('Error',"Can't delete! This record is in use.")->autoClose(5000);
    // }

    // public static function warningdelete()
    // {
    //     return Alert::warning('Warning', 'Number Sequence is mapped!')->autoClose(5000);
    // }


    // public static function alertupdate()
    // {
    //     return Alert::success('Success', 'Record is updated successfully!')->autoClose(5000);
    // }
    // public static function alertdelete()
    // {
    //     return Alert::success('Success', 'Record is deleted successfully!')->autoClose(5000);
    // }
    // public static function alertdeleteerror()
    // {
    //     return Alert::error('error', 'Failed ! Record is in use!')->autoClose(5000);
    // }

    //  public static function alertnumbersequence_0()
    // {
    //     return Alert::warning('error', 'Number Sequence not mapped!')->autoClose(5000);
    // }
    // public static function phonenumberalready()
    // {
    //     return Alert::warning('error', __('common.phone-number-already-exists'))->autoClose(5000);
    // }
    // public static function crnumberalready()
    // {
    //     return Alert::warning('error', __('common.cr-number-already-exists'))->autoClose(5000);
    // }
    // public static function somethingwentwrong()
    // {
    //     return Alert::warning('error', 'Something went wrong')->autoClose(5000);
    // }
    // public static function alertnumbersequence_1()
    // {
    //     return Alert::warning('error', 'Numbersequence Exceded!')->autoClose(5000);
    // }
    // public static function alertnumbersequence_01()
    // {
    //     return Alert::warning('error', 'Something went wrong. Contact to System Administrator!')->autoClose(5000);
    // }
    // public static function required()
    // {
    //     return Alert::warning('Please fill all required fields!')->autoClose(5000);
    // }
   

    // public static function successfully_approved()
    // {
    //     return Alert::success('success', 'Document Approved!')->autoClose(5000);
    // }
    // public static function successfully_rejected()
    // {
    //     return Alert::success('success', 'Document Rejected!')->autoClose(5000);
    // }
    // public static function successfully_changedReq()
    // {
    //     return Alert::success('success', 'Document Request Changed!')->autoClose(5000);
    // }
    // public static function delegatedtoOther()
    // {
    //     return Alert::success('success', 'Work flow deligated!')->autoClose(5000);
    // }
    // public static function not_allowed()
    // {
    //     return Alert::error('error', 'Access is not allowed')->autoClose(5000);
    // }

    // public static function sweetalert($type,$text)
    // {
    //     return Alert::$type($type, $text)->autoClose(5000);
    // }

    // public static function successfully_updated()
    // {
    //     return Alert::success('success', 'Data Updated!')->autoClose(5000);
    // }

    public static function unique_one($mod, $col1, $value1)
    {
        $cmp_id = Auth::user()->company_id; 
        $model = self::model($mod);
        $data = $model::ActiveOnly($cmp_id)->where($col1, $value1)->first();
        if($data)
            return true;
        else
            return false;
    }

    public static function unique_two($mod, $col1, $value1, $col2, $value2)
    {
        $cmp_id = Auth::user()->company_id;        
        Controller::model($mod)::where('status', 'Active')->get();                
        $data1 = self::model($mod)::ActiveOnly($cmp_id)->where($col1, $value1)->first(); 
        $data2 = self::model($mod)::ActiveOnly($cmp_id)->where($col2, $value2)->first();        
        if($data1 || $data2)
            return true;
        else
            return false;
    }

    public static function file_extension($uploadedImage,$type,$folder,$size)
    {
        $extension = $uploadedImage->getClientOriginalExtension();
        $imageName = time().rand(100,999). '.' . $extension;
        if($type=="image")
          $allowedExtensions = ['jpeg','png','jpg'];
        else if($type=="document")
          $allowedExtensions = ['pdf','doc','docx','xlsx','xls'];
        else if($type=="image_document")
          $allowedExtensions = ['jpeg','png','jpg','pdf','doc','docx','xlsx','xls'];

        if(in_array($extension, $allowedExtensions) && $uploadedImage->getSize()/1048576<= $size)
        {
            Storage::disk('public')->makeDirectory($folder);
            Storage::disk('public')->putFileAs($folder, $uploadedImage, $imageName);
            return  $imageName;
        }
        else
            return false;
    }

    public static function new_file_extension($uploadedImage,$type,$folder,$size)
    {
        $extension = $uploadedImage->getClientOriginalExtension();
        $imageName = time().rand(100,999). '.' . $extension;
        if($type=="image")
          $allowedExtensions = ['jpeg','png','jpg'];
        else if($type=="document")
          $allowedExtensions = ['pdf','doc','docx','xlsx','xls'];
        else if($type=="image_document")
          $allowedExtensions = ['jpeg','png','jpg','pdf','doc','docx','xlsx','xls'];

        if(in_array($extension, $allowedExtensions) && $uploadedImage->getSize()/1048576<= $size)
        {
            $destinationPath = public_path($folder.'/');
            $uploadedImage->move($destinationPath, $imageName);
            $image_url = ($folder.'/'.$imageName);
            return  $image_url;
        }
        else
            return false;

    }
 
}
