<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service_next\CommonService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Carbon\Carbon;
use App\Helpers\AttemptHelper;
use DataTables;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        //$company = self::model('Company')::get();
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();
        if($user)
        { 
            $last_login_model=self::model('LastLogin');
            $last_l = new $last_login_model();
            $last_l->user_id = $user->id;
            $last_l->login_time = Carbon::now();
            $last_l->save();
        }
        $userid = Auth::user()?->id;
        $usertype = Auth::user()?->type;
        $empid = Auth::user()?->emp_id;
        // if ($user->is2FAEnabled()) {
        //     return redirect()->route('2fa.verify');
        // }        
        if (Auth::user()->type == "User" && Auth::user()->status == "Active") {
            return redirect()->intended(RouteServiceProvider::EMPLOYEE);
        }
        return redirect()->intended(RouteServiceProvider::EMPLOYEE);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
