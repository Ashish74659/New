<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Amyservices\CommentService;
use Illuminate\Support\Facades\Auth;
use App\Traits_next\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use DataTables;
trait CommentTrait
{
    use ApiResponse;
    protected $CommentService;

    public function __construct(CommentService $CommentService)
    {
        $this->CommentService = $CommentService;
    }

    public function List(Request $request)
    {
        try {
            $list = $this->CommentService->list($request);
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

    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'attachment_file.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx,xlsx,xls',
            'source_id' => 'required',
            'source' => 'required',
            'comment'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); 
        }
        try{
            $store = $this->CommentService->store($request);
            if($store && !empty($store['data']))
            {
                return response()->json(['data' => $store['data'], 'message' => __($store['message'])]);
            }
            else{
                return response()->json(['data' => null, 'message' => __($store['message'])]);
            }

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }

    }
}
