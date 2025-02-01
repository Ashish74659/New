<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits_next\TwoFactorAuth;
use Auth;

class TwoFactorAuthController extends Controller
{
    use TwoFactorAuth;
    
    public function showSetupForm()
    {
        return view('auth.setup-2fa');
    }

}
