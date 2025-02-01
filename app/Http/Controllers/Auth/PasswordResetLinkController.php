<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;
use Validator; 
use Illuminate\Support\Facades\Crypt;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    { 
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {                    
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'], 
        ]);
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }  
        $user = User::where('email', $request->email)->first();       
        if ($user) {
            $token = Password::createToken($user);
 
            $encryptedEmail = Crypt::encryptString($user->email);
            
            $resetUrl = url(config('/').route('password.reset', [
                'token' => $token,
                'e' => $encryptedEmail,
            ], false));
 
            $email_teplate_id = self::helper('EmailHelper')::email_template_id('Forget Password');
            $mail = self::helper('EmailHelper')::email_variables_forget_password($email_teplate_id,[$resetUrl,$user->name]);             
            self::helper('EmailHelper')::mail_send($user->email,$mail[0],$mail[1]);
            return back()->with('status','The password reset link is sent to your E-mail!');
        }
        return redirect()->back()->with(['error' => 'We can\'t find a user with that email address.']); 
    }
}
