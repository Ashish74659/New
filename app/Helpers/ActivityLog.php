<?php
use App\Models\ActivityLog;
use App\Models\CustomNotifications;
use Illuminate\Support\Facades\Auth;

if (!function_exists('addToLog')) {
    function addToLog($source,$source_id,$message,$type=null)
    {
       $log = new ActivityLog();
       $log->source = $source;
       $log->source_id = $source_id;

       if($type==null)
       {
        $log->message = Auth::user()->name.' '.$message;
        $log->created_by = Auth::user()->id;
       }
       else{
        $log->message = 'System'.$message;
        $log->created_by = null;
       }
       $log->save();
       return true;
    }

    function role()
    {
        $role = Auth::user()->getRoleNames();
        if($role)
        {
            return $role[0];
        }
    }

    function addNotification($user_id,$message,$url=null)
    {
        $data = CustomNotifications::create([
            'user_id'=>$user_id,
            'message'=>$message,
            'url' => $url,
        ]);
        return true;
    }
}
