<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Helpers\helper;

class TwoFactorAuthenticated
{
    public function handle($request, Closure $next)
    {
        return $next($request);

        // $user = Auth::user();
        // $data='';

        // if ($user && $user->is2FAEnabled() && !session('2fa_verified')) {
        //     return redirect()->route('2fa.verify');
        // }

        // return $next($request);
    }
}

