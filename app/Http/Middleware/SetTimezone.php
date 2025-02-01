<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
class SetTimezone
{
    public function handle($request, Closure $next)
    {         
        $timezone = Controller::helper('ModelHelper')::time_zone_of_user();         
        Controller::helper('ModelHelper')::setDatabaseTimezone($timezone[0]);
        Config::set('app.timezone', $timezone[1]);
        date_default_timezone_set($timezone[1]);

        return $next($request);
    }
}
