<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Validator; 

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function otpverification(Request $request): View
    {
        return view('auth.otp', ['request' => $request]);
    }
   

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {  
        $validator = Validator::make($request->all(), [
            'token' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }  
        $email=Crypt::decryptString($request->input('email'));
        $request->merge(['email' => $email]);
               
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        ); 
         
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with(['success'=>$status])
                    : back()->with(['error'=>$status]); 
    }
}
