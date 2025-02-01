<?php
namespace App\Helpers;
use Carbon\Carbon;
class MasterHelper
{
    public static function header_title_one($litle1,$url){
        $html = '<div class="block-header">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">'.self::label_name($litle1).'</h5>

                            <div>
                              <a '.self::button_route($url).'<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-arrow-left-bold-circle-outline"></i> '.self::back_button_name().' </button></a>

                            </div>

                    </div>
                </div>
            </div>

        </div>';
        return $html;
    }

    public static function header_title_two($litle1,$url1,$url2 = null){
        $html = '<div class="block-header">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="d-flex flex-wrap justify-content-between">
                        <h5 class="mb-0">'.self::label_name($litle1).'</h5>
                        <div class="d-flex " >


                            <a '.self::button_route($url1).'<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="mdi mdi-plus-circle-outline"></i> Add </button></a>



                        </div>
                    </div>
                </div>
            </div>';
        return $html;
    }

//     <div class="position-relative">
//     '.self::button_route($url1).'<span class="btn-pos"><i class="mdi mdi-plus"></i></span><button type="button" class="btn btn-back"></button></a>
// </div>

// <div class="position-relative dp_back">
// '.self::button_route($url2).'<span class="btn-pos"><i class="mdi mdi-arrow-left"></i></span><button type="button" class="btn btn-back">'.self::back_button_name().'</button></a>
// </div>

    public static function header($litle1){
        $html = '<div class="block-header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="d-flex flex-wrap justify-content-between">
                    <h5 class="mb-0">'.self::label_name($litle1).'</h5>
                <div> ';
        return $html;
    }



    public static function footer(){
        $html = ' </div> </div> </div> </div>';
        return $html;
    }

    public static function header_title_only($litle1,$url){
        $html = '<div class="col-lg-6 col-md-6 col-sm-12">
        <h4>'.self::label_name($litle1).'</h4>
        </div>';
    return $html;
    }


    public static function master_header_title($litle1,$url){
        $html = '<div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="d-flex flex-wrap justify-content-between">
                        <h5 class="mb-0">'.self::label_name($litle1).'</h5>
                        <div class="d-flex gap-1">
                       <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#Add-contact-modal"><i class="mdi mdi-plus-circle-outline"></i> '.self::create_button_name().'</button>
                       '.self::home_url($url).' <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> '.self::back_button_name().'</button></a>
                        </div>
                    </div>
                </div>  ';


        return $html;
    }

    public static function button_only($name,$url,$id,$btn_class){
        $html = '<a '.self::button_route_withid($url,$id).' class="btn btn-primary btn-sm waves-effect '.$btn_class.'"  data-bs-target="#'.$btn_class.'" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($name).'</a>';
        return $html;
    }

    public static function action_button_header($route,$id,$language,$icon){
        $html = ' <div class="d-flex gap-2"> <div class="position-relative"> <a '.self::button_route_withid($route,$id).' data-bs-toggle="offcanvas" aria-controls="offcanvasdoc" data-bs-target="#Add-model" > <span class="btn-pos"><i class="mdi mdi-plus"></i>
        </span><button type="button" class="btn btn-back">
        '.self::label_name($language).'</button></a>
        </div>';

        return $html;
    }
    public static function action_button_back($route,$id){
        $html = ' <div class="position-relative">
                <a '.self::button_route_withid($route,$id).'> <span class="btn-pos"><i class="mdi mdi-arrow-left"></i>
                    </span><button type="button" class="btn btn-back">
                        '.self::label_name('common.back').'</button></a>
            </div>
             </div>';
        return $html;
    }


    public static function master_action_button($id){

        $html = ' <div class="dropdown">
        <a class="dropdown show"   data-bs-toggle="dropdown"
            aria-expanded="true">
            <i class="mdi mdi-dots-horizontal align-middle font-size-16"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">

        <li>  <a class="dropdown-item master_view" href="#" data-bs-toggle="offcanvas" data-bs-target="#View-contact-modal" data-id="'.base64_encode(convert_uuencode($id)).'" aria-controls="offcanvasdoc"><i
        class="mdi mdi-eye-outline font-size-16 align-middle me-2 text-muted"></i>'.self::label_name('common.view').'</a> </li>

        <li> <a class="dropdown-item master_delete" href="#" data-id="'.base64_encode(convert_uuencode($id)).'"><i
        class="mdi mdi-trash-can-outline font-size-16 align-middle me-2 text-muted"></i>'.self::label_name('common.delete').'</a></li>
        </ul> </div>';
        return $html;
    }

    public static function action_button_for_all($names,$urls,$id){
        if(count($names) == 1){
            $html = '<div class="btn-group">
            <a class="text-muted dropdown-toggle font-size-20" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true">
                <i class="mdi mdi-dots-horizontal"></i>
            </a>
                        <div class="dropdown-menu">
                        <a '.self::button_route_withid($urls[0],$id).' class="dropdown-item First_model" data-bs-target="#First_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
                    </div>
                </div>';
            return $html;
        }
        else if(count($names) == 2){
            $html = '<div class="btn-group">
            <a class="text-muted dropdown-toggle font-size-20" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i></a>
                    <div class="dropdown-menu">
                        <a '.self::button_route_withid($urls[0],$id).'  class="dropdown-item First_model"  data-bs-target="#First_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
                        <a '.self::button_route_withid($urls[1],$id).' class="dropdown-item Second_model"  data-bs-target="#Second_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[1]).'</a>
                    </div>
                </div>';
            return $html;
        }
        if(count($names) == 3){
            $html = '<div class="btn-group">
            <a class="text-muted dropdown-toggle font-size-20" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true">
                <i class="mdi mdi-dots-horizontal"></i>
            </a>
                        <div class="dropdown-menu">
                        <a '.self::button_route_withid($urls[0],$id).'  class="dropdown-item First_model" data-bs-target="#First_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
                        <a '.self::button_route_withid($urls[1],$id).' class="dropdown-item Second_model" data-bs-target="#Second_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[1]).'</a>
                        <a '.self::button_route_withid($urls[2],$id).'  class="dropdown-item Third_model" data-bs-target="#Third_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[2]).'</a>
                    </div>
                </div>';
            return $html;
        }
        if(count($names) == 4){
            $html = '<div class="btn-group">
            <a class="text-muted dropdown-toggle font-size-20" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true">
                <i class="mdi mdi-dots-horizontal"></i>
            </a>
                        <div class="dropdown-menu">
                        <a '.self::button_route_withid($urls[0],$id).'  class="dropdown-item First_model" data-bs-target="#First_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
                        <a '.self::button_route_withid($urls[1],$id).' class="dropdown-item Second_model" data-bs-target="#Second_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[1]).'</a>
                        <a '.self::button_route_withid($urls[2],$id).'  class="dropdown-item Third_model" data-bs-target="#Third_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[2]).'</a>
                        <a '.self::button_route_withid($urls[3],$id).'  class="dropdown-item Fourth_model" data-bs-target="#Fourth_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[3]).'</a>
                    </div>
                </div>';
            return $html;
        }
    }
    // public static function action_button_for_customerprofilereject($names,$urls,$id){
    //     $html = '<div class="btn-group">
    //     <a class="text-muted dropdown-toggle font-size-20" role="button"
    //     data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i></a>
    //             <div class="dropdown-menu">
    //                 <a '.self::button_route_withid($urls[0],$id).' class="dropdown-item Second_model"  data-bs-target="#Second_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
    //             </div>
    //         </div>';
    //     return $html;
    // }
    // public static function action_button_for_customerprofileapproved($names,$urls,$id){
    //     $html = '<div class="btn-group">
    //     <a class="text-muted dropdown-toggle font-size-20" role="button"
    //     data-bs-toggle="dropdown" aria-haspopup="true"><i class="mdi mdi-dots-horizontal"></i></a>
    //             <div class="dropdown-menu">
    //                 <a '.self::button_route_withid($urls[0],$id).' class="dropdown-item First_model"  data-bs-target="#Second_model" data-id="'.base64_encode(convert_uuencode($id)).'">'.self::label_name($names[0]).'</a>
    //             </div>
    //         </div>';
    //     return $html;
    // }
    public static function button_route($routes)
    {
        return '<a href='.route( $routes).'>';
    }

    public static function button_route_withid($routes,$id)
    {
        if($routes=='' || $routes==null){
            return 'href ="#" data-bs-toggle="offcanvas" ';
        }
        else if($id =='' || $id==null){
            return 'href='.route($routes).'';
        }
        else{
            return 'href='.route($routes,["id"=>base64_encode(convert_uuencode($id))]);
        }
    }

    public static function button_url($routes,$id)
    {
        return '<a href='.url('master/'.$routes).'>';
    }
    public static function home_url($routes)
    {
        return '<a href='.route($routes).'>';
    }

    public static function label_name($lbl)
    {
        return __($lbl);
    }

    public static function create_button_name(){
        return __('common.create');
    }
    public static function back_button_name(){
        return __('common.back');
    }

    public static function status_check($status)
    {
        if ($status == "Active") {
            return '<span class="badge bg-success">' . $status . '</span>';
        }
        elseif ($status == "Done") {
            return '<span class="badge bg-success">' . $status . '</span>';
        }
        elseif ($status == "Accepted") {
            return '<span class="badge bg-success">' . $status . '</span>';
        }
        elseif ($status == "Cancelled") {
            return '<span class="badge bg-danger">' . $status . '</span>';
        }
        elseif ($status == "Confirmed") {
            return '<span class="badge bg-success">' . $status . '</span>';
        }
         elseif ($status == "Inactive") {
            return '<span class="badge bg-danger">' . $status . '</span>';
        }
        elseif ($status == "Approved") {
            return '<span class="badge  bg-success">' . $status . '</span>';
        }
        elseif ($status == "In review") {
            return '<span class="badge badge-soft-warning">' . $status . '</span>';
        }
        elseif ($status == "Awarded") {
            return '<span class="badge  bg-success">' . $status . '</span>';
        }

        elseif ($status == "Draft") {
            return '<span class="badge badge-soft-warning">' . $status . '</span>';
        }

        elseif ($status == "Purchase Order Generated") {
            return '<span class="badge badge-soft-primary">' . $status . '</span>';
        }



        elseif ($status == "In review") {
            return '<span class="badge bg-danger">' . $status . '</span>';
        }
        elseif ($status == "Rejected") {
            return '<span class="badge badge-soft-danger">' . $status . '</span>';
        }

        elseif ($status == "Quotation Generated") {
            return '<span class="badge badge-soft-primary">' . $status . '</span>';
        }

        elseif ($status == "Responded") {
            return '<span class="badge badge-soft-primary">' . $status . '</span>';
        }
        elseif ($status == "Complete") {
            return '<span class="badge  bg-success">' . $status . '</span>';
        }
        elseif ($status == "Pending") {
            return '<span class="badge bg-warning">' . $status . '</span>';
        }

        else {
            return '<span class="badge bg-warning">' . $status . '</span>';
        }

    }

    public static function generate_code($mod)
    {
        $model = 'App\Models\\' . $mod;
        $prefix = substr($mod,0,3).'-';
        $lastSerialNumber = $model::orderBy('id','DESC')->first();
        if ($lastSerialNumber) {
            $lastSerialNumberWithoutPrefix = (int) substr($lastSerialNumber->code, strlen($prefix));
            $nextSerialNumber = $prefix . str_pad($lastSerialNumberWithoutPrefix + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextSerialNumber = $prefix . str_pad(1, 4, '0', STR_PAD_LEFT);
        }
        return $nextSerialNumber;
    }

    public static function date_formate($date)
    {
        if($date)
            return date('j F, Y', strtotime($date));
        else
            return '';
    }

      public static function date_time_formate($date)  // change date and time formate to show on page by Ashish
    {
        if($date)
            return Carbon::parse($date)->format('j F Y , h:i A');
        else
            return '';
    }

    public static function time_ago($date)  // show time ago on page by Lal Singh
    {
        if($date)
            return $date->diffForHumans();
        else
            return '';
    }



    public static function action_header(){
        $html = '<div class="dropdown">
        <a class="text-muted dropdown show" type="button" data-bs-toggle="dropdown"
            aria-expanded="true">
            <i class="mdi mdi-dots-horizontal align-middle font-size-16"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">';
        return $html;
    }

    public static function action_button($route,$id,$language,$icon){
        $html = '<li> <a '.self::button_route_withid($route,$id).'  class="dropdown-item"> '.self::icon_class($icon).''.self::label_name($language).' </a></li>';
        return $html;
    }
    // public static function action_buttoncomunication($route,$id,$rec_id,$type,$language,$icon){
    //     $html = '<li> <a '.self::button_route_withid($route,$id,$rec_id,$type).'  class="dropdown-item"> '.self::icon_class($icon).''.self::label_name($language).' </a></li>';
    //     return $html;
    // }


    public static function action_button_model($id,$language,$icon,$model_id){
        $html = '<li> <a  href="#" data-bs-toggle="offcanvas" data-bs-target="#'.self::nothing($model_id).'" data-id="'.base64_encode(convert_uuencode($id)).'" aria-controls="offcanvasdoc" class="dropdown-item '.self::nothing($model_id).'"> '.self::icon_class($icon).''.self::label_name($language).' </a></li>';
        return $html;
    }





    public static function icon_class($icn){
        $html = '<i class="'.$icn.'"> </i>';
        return $html;
    }

    public static function nothing($lable){
        $html = "$lable";
        return $html;
    }


    public static function action_footer(){
        $html = ' </ul></div>';
        return $html;
    }


  public static function current_date()
    {
        return now();
    }








}