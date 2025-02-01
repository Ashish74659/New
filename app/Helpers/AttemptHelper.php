<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class AttemptHelper
{
    /**
     * Get the session key based on the user's email or identifier.
     *
     * @param string $email
     * @return string
     */
    public static function getSessionKey($email)
    {
        return 'failed_attempts_' . md5($email);
    }

    /**
     * Check if the user has exceeded the max failed login attempts.
     *
     * @param string $email
     * @return bool
     */
    public static function checkLoginAttemptsAndLock($email)
    {
        $attempt = Controller::model('SystemAdminSetup')::first();
        $failedAttempts = Session::get(self::getSessionKey($email), 0);
        if (($attempt->numbertime) && ($attempt->number_enable ==1) && ($failedAttempts >= $attempt->numbertime) ) {
            return false;
        }
        return true;
    }

    /**
     * Increment failed login attempts for a specific user in the session.
     *
     * @param string $email
     * @return void
     */
    public static function incrementLoginAttempts($email)
    {
        $failedAttempts = Session::get(self::getSessionKey($email), 0);
        $attempt = Controller::model('SystemAdminSetup')::first();
        if (($attempt->numbertime) && ($attempt->number_enable ==1) ) {
            Session::put(self::getSessionKey($email), $failedAttempts + 1);
        }
    }

    /**
     * Reset failed login attempts for a specific user in the session.
     *
     * @param string $email
     * @return void
     */
    public static function resetLoginAttempts($email)
    {
        Session::forget(self::getSessionKey($email));
    }

    public static function releaseUser($email,$name,$user_id)
    {
        // Update user status
        Controller::model('User')::where('email', $email)->update([
            'status' => 'Active',
            'blocked_reason' => '',
            'blocked_type' => '',
            'blocked_at'=>''
        ]);

        $message = ' has released user '.$name .' ('.$email.')';
        addToLog('released_user',$user_id,$message);
        return true;
    }

}
