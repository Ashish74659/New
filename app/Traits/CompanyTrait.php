<?php

namespace App\Traits;

use App\Models\CustomNotifications;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;

trait CompanyTrait
{
    public function index() 
    {
        $campany = self::model('Company')::get();
        return view('admin.company.company.index', compact('campany'));
    }
    public function add(Request $request)
    {
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        }
        $data = self::model('Company')::find($id);
        $country = self::helper('ModelHelper')::getactive('Countries','Active');
        $company = self::helper('ModelHelper')::getactive('Company','Active');
        $pos_type = self::helper('ModelHelper')::getactive('PosType','Active');
        $country = self::helper('ModelHelper')::getactive('Countries','Active'); 
        $date_formate = self::helper('ModelHelper')::getactive('DateFormate','Active'); 
        $time_zone = self::helper('ModelHelper')::getactive('TimeZone','Active'); 
        $currency = self::helper('ModelHelper')::getactive('Currency','Active'); 
        return view('admin.company.company.add', compact('data', 'country','company','pos_type','country','date_formate','time_zone','currency'));
    }
    
    
     
    public function get_prefix_info(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [ 
            'company_id' => 'required',
            'col_name' => 'required'
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));         
        $data = self::helper('ModelHelper')::find('Company',$id);
        $col = $request->col_name;
        $datas = self::model('CompanyPrefixLog')::where('company_id',$id)->where('type',$col)->get();        
        return ['status'=>200,'message'=>[$data?->$col,$datas]];        
        } catch (\Exception $e) { 
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function get_tile_info(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [ 
            'company_id' => 'required',
            'col_name' => 'required'
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));         
        $data = self::helper('ModelHelper')::find('Company',$id);
        $tender_tile = 'tender_'.$request->col_name;
        $tile = $request->col_name;
        $datas = self::model('CompanyTileLog')::where('company_id',$id)->where('type',$tile)->get();        
        return ['status'=>200,'message'=>[$data?->$tender_tile,$datas]];        
        } catch (\Exception $e) { 
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function prefix_store(Request $request)
    {     
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'col_name' => 'required',
            'prefix' => 'required',
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction(); 
        $col = $request->col_name;
        $data = self::helper('ModelHelper')::find('Company',$id);        
        if($data?->$col){
            $model = self::model('CompanyPrefixLog');
            $data_new = new $model();
            $data_new->company_id = $id;
            $data_new->created_by = $data->created_by;
            $data_new->updated_by = $user_id;
            $data_new->type = $col;
            $data_new->old_prefix = $data->$col;
            $data_new->save();
        }

        $data->updated_by = $user_id;
        $data->$col = $request->prefix;
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function tile_store(Request $request)
    {      
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'col_name' => 'required',
            'tile' => 'required',
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction(); 
        $col = $request->col_name;
        $data = self::helper('ModelHelper')::find('Company',$id);        
        $tile = $col;
        $tender_tile = 'tender_'.$col;        
        
        if($data?->$tender_tile){
            $model = self::model('CompanyTileLog');
            $data_new = new $model();
            $data_new->company_id = $id;
            $data_new->created_by = $data->created_by;
            $data_new->updated_by = $user_id;
            $data_new->type = $tile;
            $data_new->old_tile = $data->$tender_tile;
            $data_new->save();
        }
        
        $data->updated_by = $user_id;
        $data->$tender_tile = $request->tile;        
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }
    

    public function all_prefix_store(Request $request)
    {     
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'order_prefix' => 'required',
            'sales_return_prefix' => 'required',
            'receipt_prefix' => 'required',
            'customer_prefix' => 'required',
            'invoice_prefix' => 'required',
        ]);
 
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction();         
        $data = self::helper('ModelHelper')::find('Company',$id);
        $model = self::model('CompanyPrefixLog');

        if($data?->order_prefix != $request->order_prefix){   
            if($data?->order_prefix){
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "order_prefix";
                $data_new->old_prefix = $data->order_prefix;
                $data_new->save();
            }

            $data->order_prefix = $request->order_prefix;
        }

        if($data?->sales_return_prefix != $request->sales_return_prefix){     
            if($data?->sales_return_prefix){       
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "sales_return_prefix";
                $data_new->old_prefix = $data->sales_return_prefix;
                $data_new->save();
            }

            $data->sales_return_prefix = $request->sales_return_prefix;
        }

        if($data?->receipt_prefix != $request->receipt_prefix){       
            if($data?->receipt_prefix){         
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "receipt_prefix";
                $data_new->old_prefix = $data->receipt_prefix;
                $data_new->save();
            }

            $data->receipt_prefix = $request->receipt_prefix;
        }

        if($data?->customer_prefix != $request->customer_prefix){    
            if($data?->customer_prefix){                 
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "customer_prefix";
                $data_new->old_prefix = $data->customer_prefix;
                $data_new->save();
            }

            $data->customer_prefix = $request->customer_prefix;
        }

        if($data?->invoice_prefix != $request->invoice_prefix){  
            if($data?->invoice_prefix){                           
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "invoice_prefix";
                $data_new->old_prefix = $data->invoice_prefix;
                $data_new->save();
            }

            $data->invoice_prefix = $request->invoice_prefix;
        }
        

        $data->updated_by = $user_id; 
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function all_tile_store(Request $request)
    {     
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'tile_1' => 'required',
            'tile_2' => 'required',
            'tile_3' => 'required',
            'tile_4' => 'required', 
        ]);
 
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction();         
        $data = self::helper('ModelHelper')::find('Company',$id);
        $model = self::model('CompanyTileLog');

        if($data?->tender_tile_1 != $request->order_prefix){   
            if($data?->tender_tile_1){
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "tile_1";
                $data_new->old_tile = $data->tender_tile_1;
                $data_new->save();
            }

            $data->tender_tile_1 = $request->tile_1;
        }

        if($data?->tender_tile_2 != $request->order_prefix){   
            if($data?->tender_tile_2){
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "tile_2";
                $data_new->old_tile = $data->tender_tile_2;
                $data_new->save();
            }

            $data->tender_tile_2 = $request->tile_2;
        }

        if($data?->tender_tile_3 != $request->order_prefix){   
            if($data?->tender_tile_3){
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "tile_3";
                $data_new->old_tile = $data->tender_tile_3;
                $data_new->save();
            }

            $data->tender_tile_3 = $request->tile_3;
        }

        if($data?->tender_tile_4 != $request->order_prefix){   
            if($data?->tender_tile_4){
                $data_new = new $model();
                $data_new->company_id = $id;
                $data_new->created_by = $data->created_by;
                $data_new->updated_by = $user_id;
                $data_new->type = "tile_4";
                $data_new->old_tile = $data->tender_tile_4;
                $data_new->save();
            }

            $data->tender_tile_4 = $request->tile_4;
        }
        

        $data->updated_by = $user_id; 
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }
    
    

    public function setting_store(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'enable_parent' => 'required',
            'name' => 'required',
            'pos_type_id'=> 'required', 
        ]);
        if($validator->fails()){
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try {
        if($request->enable_parent == "Yes" && !$request->parent_id){
            return ['status'=>201,'message'=>'Please fill Parent for company']; 
        }
        $pos = self::helper('ModelHelper')::find('PosType',$request->pos_type_id);
        $enable_table_booking = "No";
        $enable_receipt_printing = "No";
        if($pos?->enable_seating_arrangement == "Yes"){
            $enable_table_booking = $request->enable_table_booking;
            $enable_receipt_printing = $request->enable_receipt_printing;
        }        

        self::db()::beginTransaction();
        $model = self::model('Company');
        if($request->company_id){
            $id = convert_uudecode(base64_decode($request->company_id));
            $data = self::helper('ModelHelper')::find('Company',$id);
            $data->updated_by = $user_id;
        }
        else{
            $data = new $model();
            $data->code = $request->code;
            $data->name = $request->name;
            $data->created_by = $user_id;
            $data->status = "Inactive";
        }
        $data->enable_parent = $request->enable_parent;
        $data->pos_type_id = $request->pos_type_id;
        $data->parent_id = $request->parent_id;
        $data->enable_table_booking = $enable_table_booking;
        $data->enable_receipt_printing = $enable_receipt_printing;
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!','url'=>'company-edit?id='.base64_encode(convert_uuencode($data->id))];         
        }
        else{
            return ['status'=>200,'message'=>'Record is created successfully!','url'=>'company-edit?id='.base64_encode(convert_uuencode($data->id))];         
        }
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function contact_info_store(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'country_id' => 'required',
            'email' => 'required|email',
            'phone_no'=> 'required',
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction();
        $data = self::helper('ModelHelper')::find('Company',$id);
        $data->updated_by = $user_id;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->country_id = $request->country_id;
        $data->region = $request->region;
        $data->phone_no = $request->phone_no;
        $data->post_box = $request->post_box;
        $data->email = $request->email;        
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }


    public function business_localization(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [ 
            'company_id' => 'required',
            'date_formate_id' => 'required',
            'time_formate' => 'required',
            'time_zone_id'=> 'required',
            'currency_id' => 'required',
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction();
        $data = self::helper('ModelHelper')::find('Company',$id);
        $data->updated_by = $user_id;
        $data->date_formate_id = $request->date_formate_id;
        $data->time_formate = $request->time_formate;
        $data->time_zone_id = $request->time_zone_id;
        $data->currency_id = $request->currency_id;
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }

    public function logo_information(Request $request)
    {            
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [ 
            'company_id' => 'required', 
            'bill_header' => 'required',
            'bill_footer' => 'required',
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));
        self::db()::beginTransaction();
        $data = self::helper('ModelHelper')::find('Company',$id);
        $data->updated_by = $user_id;
 
        if($request->company_logo){
            $imagedd = self::helper('ModelHelper')::folder_name($id,"Company","Logo",$request->company_logo,1,'image');
            $data->company_logo = $imagedd[1];
        }
        if($request->bill_logo){
            $imagedd = self::helper('ModelHelper')::folder_name($id,"Company","Logo",$request->bill_logo,1,'image');
            $data->bill_logo = $imagedd[1];
        }
        if($request->report_logo){
            $imagedd = self::helper('ModelHelper')::folder_name($id,"Company","Logo",$request->report_logo,1,'image');
            $data->report_logo = $imagedd[1];
        }
         
        $data->bill_header = $request->bill_header;
        $data->bill_footer = $request->bill_footer;
        $data->status = "Active";
        $data->save();
        self::db()::commit();

        if($request->company_id){
            return ['status'=>200,'message'=>'Record is updated successfully!'];         
        }        
        } catch (\Exception $e) {
            self::db()::rollback();
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }


    public function get_logo(Request $request)
    {    
        $user_id = self::user_id();
        $validator = Validator::make($request->all(), [ 
            'company_id' => 'required', 
        ]);
        if($validator->fails()){            
            return ['status'=>201,'message'=>$validator->messages()->toJson()];
        }
        try { 
        $id = convert_uudecode(base64_decode($request->company_id));         
        $data = self::model('Company')::select('company_logo','bill_logo','report_logo')->find($id);                 
        $url = url('');        
        return ['status'=>200,'url'=>$url.'/','message'=>$data];
        } catch (\Exception $e) { 
            return ['status'=>201,'message'=>$e->getMessage()];
        }
    }
     
    public function delete(Request $request)
    {
        try{
            $id = convert_uudecode(base64_decode($request->id));
            if($id){
                $user = self::model('User')::where('company_id',$id)->first();
                
                if(!$user){
                    $data = self::model('Company')::find($id);
                    $data->delete();
                    return 200;
                }
                else{
                    return 201;
                }
            }
            else{
                return 202;
            }

        } catch (\Exception $e) {
            return 202;
        }
    }
    public function markRead()
    {
        $user = Auth::user()->id;
        $myNotifications = CustomNotifications::where('user_id', $user)->latest()->get();
        foreach ($myNotifications as $myNotification) {
            $myNotification->delete();
        }
        return redirect()->back()->with(['success' => __('All are read !')]);;
    }

    public function viewNotifications(){
        return view('allnotification');
    }

    protected function backtoindex()
    {
        return route('company-list');
    }


}
