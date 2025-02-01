<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\APISetup;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class APIController extends Controller 
{
    public function editAPI_Details()
    {
        $api_details = APISetup::where('type','login')->first();
        $api_line = APISetup::where('type', '!=' , 'login')->get();
        return view('admin.API.api-parameter-form',compact('api_details','api_line'));
    }
    public function updateAPI_Header(Request $request)
    {
        $validator = $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
            'tenant_id' => 'required',
            'resource' => 'required',
            'grant_type' => 'required',
            'url' =>'required',
        ]);

        $data = APISetup::find($request->api_id);        
        if($data){
            $data->auth_api_url = $request->url;
            $data->grant_type = $request->grant_type;
            $data->client_id =$request->client_id;
            $data->client_secret =$request->client_secret;
            $data->tenant_id =$request->tenant_id;
            $data->resource =$request->resource;
            $data->save();
        }
        else{
            $data = new APISetup();
            $data->auth_api_url = $request->url;
            $data->grant_type = $request->grant_type;
            $data->client_id =$request->client_id;
            $data->client_secret =$request->client_secret;
            $data->tenant_id =$request->tenant_id;
            $data->resource =$request->resource;
            $data->type = 'login';
            $data->save();
        }
        Alert::success('Success','Record is updated successfully !')->autoClose(5000);
        return redirect()->route('edit-api-details');         
    }
    public function addAPI_Line(Request $request)
    {
         $validator = $request->validate([
            'url' => 'required|array',
            'url.*' => 'required',
            'url_type' => 'required|array',
            'url_type.*' => 'required'
         ]);
         try
         {
             foreach($request->url_type as $url)
             {
                   $i=0;
                    APISetup::create([
                        'auth_api_url' => $request->url[$i],
                        'type' =>$request->url_type[$i],
                    ]);
                    $i++;
                }
                Alert::success('Success','Record is added successfully !')->autoClose(5000);
                return redirect()->route('edit-api-details');
        }catch(QueryException $e)
        {
             Alert::error('Error','Duplicate Entry!')->autoClose(5000);
            return redirect()->route('edit-api-details');
        }
    }
    public function editAPI_Line(Request $request)
    {
        $data = APISetup::find($request->id);
        return response()->json($data);
    }
    public function updateAPI_Line(Request $request)
    {
        try{
            $data = APISetup::find($request->api_id);
            $data->auth_api_url =$request->url;
            $data->save();
            Alert::success('Success','Record is updated successfully !')->autoClose(5000);
            return redirect()->route('edit-api-details');
        } catch(QueryException $e)
        {
            Alert::error('Error','Something went wrong !')->autoClose(5000);
            return redirect()->route('edit-api-details');
        }
    }
}
