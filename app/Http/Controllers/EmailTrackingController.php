<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use Illuminate\Http\Response;
use App\Mail\ReceptionistEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\OptionalEmailCredential;
use Config;

class EmailTrackingController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $recipientEmail = $request->email;
            Mail::to($recipientEmail)->send(new ReceptionistEmail($recipientEmail));
            return response()->json(['message' => 'Great! Successfully sent to your mail'], 200);
        } catch (\Exception $e) {
            
            $optionalCredential = OptionalEmailCredential::orderBy('id','desc')->first();
            if ($optionalCredential) {
                $data = [
                    'driver' => $optionalCredential->mail_driver,
                    'host' => $optionalCredential->mail_host,
                    'port' => $optionalCredential->mail_port,
                    'username' => $optionalCredential->mail_username,
                    'password' => $optionalCredential->mail_password,
                    'encryption' => $optionalCredential->mail_encryption,
                    'from'              => [
                        'address'=>$optionalCredential->mail_address,
                        'name'   => 'LaravelStarter'
                    ]
                ];

                Config::set('mail',$data);
                Mail::to($recipientEmail)->send(new ReceptionistEmail($recipientEmail));

                return response()->json(['message' => 'Alert email sent using optional credentials'], 200);
            } else {
                return response()->json(['message' => 'Sorry! Please try again later'], 500);
            }
        }
    }
    public function track($id)
    {
        $emailLog = EmailLog::find($id);

        if ($emailLog) {
            $emailLog->update(['status' => 'seen']);
        }

        $image = base64_decode('R0lGODlhAQABAIABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==');
        return (new Response($image, 200))->header('Content-Type', 'image/gif');
    }
}

