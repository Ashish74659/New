<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Amyservices\ActivityLogService;
use Illuminate\Support\Facades\Auth;
use App\Traits_next\ApiResponse;
use Exception;
use DataTables;
trait ActivityLog
{
    use ApiResponse;
    protected $ActivityLogService;

    public function __construct(ActivityLogService $ActivityLogService)
    {
        $this->ActivityLogService = $ActivityLogService;
    }

    public function List(Request $request)
    {
        try {
            $list = $this->ActivityLogService->list($request);
            if($list && !empty($list['data']))
            {
                return response()->json(['data' => $list['data'], 'message' => __($list['message'])]);
            }
            else{
                return response()->json(['data' => null, 'message' => __($list['message'])]);
            }
        } catch (Exception $e) {
            return response()->json(['data' => null, 'message' => $e->getMessage()], 500);
        }
    }

     
}
