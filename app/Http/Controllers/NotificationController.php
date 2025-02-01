<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
 
use Illuminate\Support\Benchmark;

class NotificationController extends Controller
{
    public static function index()
    {
        $notifications = Notifications::get()->unique('data');
        $a = [];
        foreach ($notifications as $notification) {
            $fs = explode('\\', $notification->type);
            switch ($fs[2]) {
                 
                case 'SupplierRegistrationNotification':
                    $data = json_decode($notification?->data);

                    array_push($a, '[' . $data?->supplier_registration_code . '] New Customer Request Recieved');
                    break;
                   
                case "AssignedTaskNotification":
                    $data = json_decode($notification?->data);
                    array_push($a, 'Task ID: [' . $data?->request_id . '] assigned to you');
                    break;
                    
                case 'FeePaymentNotification':
                    $data = json_decode($notification?->data);
                    array_push($a, '[' . $data?->payment_code . '] Payment' . $data?->payment_status . ' of' . $data?->payment_currency . ' ' . $data?->payment_amount);
                    break;
                    
               
                
                   
                case 'WorflowSubmissionNotification':
                    $data = json_decode($notification?->data);
                    array_push($a, 'New Task:  <a href="'.$data?->url .'"> [' . $data?->ref_code . '] </a> Assigned to you');
                    break;
            }
        }
        return $a;

    }
 
}
