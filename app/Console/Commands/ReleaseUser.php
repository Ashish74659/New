<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SystemAdminSetup;
use App\Models\User;
use Carbon\Carbon;

class ReleaseUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:release-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Release User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data=SystemAdminSetup::first();
        if($data && $data->auto_release_time && $data->auto_release_enable==1)
        {
            $users = User::where('status','Blocked')->whereNotNull('blocked_at')->get();

            foreach ($users as $user) {
                $blocked_at = Carbon::parse($user->blocked_at);
                $current_time = Carbon::now();
                $time_diff_in_hours = $blocked_at->diffInHours($current_time);
                if ($time_diff_in_hours >= $data->auto_release_time) {
                    $user->status = 'Active';
                    $user->blocked_reason='';
                    $user->blocked_type='';
                    $user->blocked_at='';
                    $user->save();

                    $message = ' has released user '.$user->name .' ('.$user->email.')';
                    $log = addToLog('released_user',$user->id,$message,'system');
                }
            }

        }
        return true;

    }
}
