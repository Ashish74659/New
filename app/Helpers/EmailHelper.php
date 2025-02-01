<?php
namespace App\Helpers;
use App\Http\Controllers\Controller;
use log;
use App\Mail\AllMail;
use Mail;
class EmailHelper
{
    public static function email_template_id($name)
    {
        $email_mstr = Controller::model('EmailMaster')::where('name',$name)->first();
        return $email_mstr?->id;
    }
    public static function company_name($cpm_array)
    {
        $all_cmp = '';
        if($cpm_array && count($cpm_array)>0){
            foreach($cpm_array as $cmp){
                $cmpny = Controller::model('Company')::select('name')->find($cmp);
                if($all_cmp){
                    $all_cmp = $all_cmp .' , '. $cmpny?->name;
                }
                else{
                    $all_cmp = $cmpny?->name;
                }
            } 
        }
        return $all_cmp;
    }

    public static function mail_send($email,$subject,$containts,$cc_bcc=null,$email_id=null,$bcc_emails=null)
    {
        if($bcc_emails && count($bcc_emails)>0 && $cc_bcc){
            if($email_id){
                Mail::to($email_id)->bcc($bcc_emails)->send(new AllMail($subject, $containts));
            }
            else{
                Mail::bcc($bcc_emails)->send(new AllMail($subject, $containts));
            }
        }
        else if($cc_bcc && $email_id){
            Mail::to($email)->$cc_bcc($email_id)->send(new AllMail($subject, $containts));
        }
        else{
            Mail::to($email)->send(new AllMail($subject, $containts));
        }

    }
    
    public static function email_variables_user_by_employee($template_id,$var_array)
    {
        $email_temp = Controller::model('EmailTemplate')::where('email_master_id',$template_id)->first();
        $variables = explode(",",$email_temp->veriable);
     
        $org_var = [];
        $replaced_var = [];
        $postfix_subject = $email_temp?->subject;
        foreach($variables as $var){
            switch($var){

                case "[USER_TYPE]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[0];
                    break;

                case "[EMAIL]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[1];
                    break;

                case "[PASSWORD]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[2];
                    break;


                case "[USER_NAME]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[3];
                    break;

            }
        }
        $contents = str_replace($org_var, $replaced_var, $email_temp->content);
        return [$postfix_subject,$contents];
    }
 
    public static function email_variables_forget_password($template_id,$var_array)
    {
        $email_temp = Controller::model('EmailTemplate')::where('email_master_id',$template_id)->first();
        $variables = explode(",",$email_temp->veriable);
        $org_var = [];
        $replaced_var = [];
        $subject = $email_temp->subject;
        foreach($variables as $var){
            switch($var){


                case "[URL]":
                    $org_var[] = $var;
                    $replaced_var[] = '<a class="" href="'.$var_array[0].'">Click Here </a>';
                    break;

                case "[NAME]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[1];
                    break;

                case "[REQUESTER_NAME]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[1];
                    break;

            }
        }
        $contents = str_replace($org_var, $replaced_var, $email_temp->content);
        return [$subject,$contents];
    }

    public static function email_variables_2fa_verify($template_id,$var_array)
    {
        $email_temp = Controller::model('EmailTemplate')::where('email_master_id',$template_id)->first();
     
        $variables = explode(",",$email_temp->veriable);
        $org_var = [];
        $replaced_var = [];
        $subject = $email_temp->subject;
        foreach($variables as $var){
            switch($var){



                case "[OTP]":
                    $org_var[] = $var;
                    $replaced_var[] = '<img src="' .$var_array[0] . '" alt="QR Code" style="width: 200px; height: 200px;">';

                    break;

                case "[NAME]":
                    $org_var[] = $var;
                    $replaced_var[] = $var_array[1];
                    break;

            }
        }
        $contents = str_replace($org_var, $replaced_var, $email_temp->content);
        return [$subject,$contents];
    }
  
}
