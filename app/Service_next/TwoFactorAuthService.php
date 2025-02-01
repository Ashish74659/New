<?php
namespace App\Service_next;

use Illuminate\Http\Request;
use Exception;
use PragmaRX\Google2FALaravel\Google2FA;
use App\Notifications\TwoFactorToken;
use App\Http\Controllers\Controller;
use Auth;

class TwoFactorAuthService
{
    protected $google2fa;

    public function __construct(?Google2FA $google2fa = null)
    {
        $this->google2fa = $google2fa;
    }

    public function setup2fa()
    { 
        $user = Auth::user();
        if (!$user->is2FAEnabled()) {
            $secret = $user->generate2FASecret();
            $token = $this->google2fa->getCurrentOtp($secret);
            $user->notify(new TwoFactorToken($token));
        }
        $user->two_factor_enabled = true;

        return true;
    }

}