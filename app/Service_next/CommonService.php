<?php

namespace App\Service_next;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Traits_next\ApiResponse;
use App\Http\Controllers\Controller;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Auth;

use Exception;

class CommonService
{
    use ApiResponse;
    protected $modelClass;

    public function __construct($modelClass = null)
    {
        $this->modelClass = $modelClass;
    }

    public function index(Request $request)
    {
        try{
            $data = $this->modelClass::orderby('id','desc')->paginate(20);
            return $data;
        }
        catch (Exception $e) {
            return $this->errorResponse(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }
 

}
