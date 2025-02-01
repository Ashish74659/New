<?php

namespace App\Traits;

use App\Models\CustomNotifications;
use Illuminate\Http\Request;
use Validator;
use Auth;

trait CustomerTrait
{
    public function index()
    {
        $data = self::model('Customer')::get(); 
        return view('admin.customer.index', compact('data'));
    }
    public function add(Request $request)
    {
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        } 
        $data = self::helper('ModelHelper')::find('Customer',$id);
        $country = self::helper('ModelHelper')::getactive('Countries','Active'); 
        return view('admin.customer.add', compact('data','country'));
    }
    public function store(Request $request)
    {    $ajax = false;
        if($request->submit_type == "ajax"){
            $ajax = true;
        }
        $save = $request->save;        
         
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'customer_type' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'region' => 'required',
            'post_box' => 'required',
            'country_id' => 'required',
            'customer_type' => 'required',
            'address' => 'required',
            'status' => 'required',             
        ]);
        if($validator->fails()){
            if($ajax){
                return ['status'=>201,'message'=>$validator->messages()->toJson()];
            }
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }
        try {
            self::db()::beginTransaction();
            $cmp_and_user = self::loginandcompany();   
            $model = self::model('Customer');
            if($request->customer_id){
                $id = convert_uudecode(base64_decode($request->customer_id));
                $data = self::model('Customer')::find($id);
                $data->updated_by = $cmp_and_user[0];            
            }
            else{
                $code = self::helper('NumberSequenceHelpers')::number_sequence_generate('customer','Customer');
                if(!$code){
                    self::db()::rollback(); 
                    if($ajax){
                        return ['status'=>201,'message'=> __('Number sequence not defined')];
                    }
                    return redirect()->back()->with(['error' => __('Number sequence not defined')]);                    
                }
                $data = new $model();            
                $data->created_by = $cmp_and_user[0];
                $data->email = $request->email;
                $data->code = $code;
                $data->name = $request->name; 
                $data->last_name = $request->last_name; 
            }
            
            $data->city = $request->city; 
            $data->country_id = $request->country_id;
            $data->region = $request->region;
            $data->post_box = $request->post_box;
            $data->address = $request->address;
            $data->customer_type  = $request->customer_type;
            $data->status = $request->status;
            $data->dob = $request->dob;         
            $data->company_id = $cmp_and_user[1];
            $data->phone_no  = $request->phone_no;
            $data->save();
                
            self::model('CustomerContact')::where('customer_id',$data->id)->delete();
    
            self::db()::commit();
            if($request->customer_id){
                $mess = "updated";
            }
            else{
                $mess = "created";                
            }

            if($ajax){
                return ['status'=>200,'message'=> $data->id ,'name'=> $data->name];
            }
            if($save == "create_another"){
                return redirect($this->backtoadd())->with(['success' => "Record is ".$mess." successfully!"]);
            }
            else{
                return redirect($this->backtoindex())->with(['success' => "Record is ".$mess." successfully!"]);
            }

        } catch (\Exception $e) {
            self::db()::rollback();
            if($ajax){
                return ['status'=>201,'message'=> $e->getMessage()];
            }
            return redirect($this->backtoindex())->with(['error' => $e->getMessage()]);
        }
    }
 

    public function search_customer_by_value(Request $request)
    {
        // "phone_no" => "1234"
        // "code" => null
        // "name" => null
        // "email" => null 

        dd($request->all()); 
    } 
    protected function backtoindex()
    {
        return route('customer-list');
    }
    protected function backtoadd()
    {
        return route('customer-add');
    }
}
