<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Amyservices\Interfaces\CaseInterfaces;
use Illuminate\Support\Facades\Auth;
use App\Traits\DashboardTraits;

class DashboardController extends Controller
{
    use DashboardTraits;

    public function clearRoute()
    {
         \Artisan::call('cache:clear');
         \Artisan::call('route:clear');
        return "Cache cleared successfully";
    }

}