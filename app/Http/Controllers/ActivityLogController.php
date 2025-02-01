<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ActivityLog;

class ActivityLogController extends Controller
{
    use ActivityLog;
}
