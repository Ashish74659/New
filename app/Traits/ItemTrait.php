<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator; 
trait ItemTrait
{
    public function index(Request $request)
    {
        $data = self::helper('ModelHelper')::getactive('Item','all');        
        return view('admin.item.index',compact('data'));
    } 
    
    public function add(Request $request)
    { 
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        } 
        $data = self::model('Item')::find($id); 
        $data_line = self::model('CompanyItem')::where('item_id',$id)->get();         
        $category = self::helper('ModelHelper')::getactive('Category','Active');
        $uom = self::helper('ModelHelper')::getactive('UOM','Active');  
        $modifier = self::helper('ModelHelper')::getactive('ModifierHeader','Active');
        $select = ["<option value=''></option>"];
        $all_tax = self::helper('ModelHelper')::getactive('Tax','Active');
        $taxes = $select;
        foreach($all_tax as $itm){                  
            $taxes[] = "<option value=" . $itm->name . ">$itm->name %</option>";            
        }
        $tax = implode(",", $taxes);
        $all_discount = self::helper('ModelHelper')::getactive('Discount','Active');
        $discounts = $select;
        foreach($all_discount as $itm){                  
            $discounts[] = "<option value=" . $itm->name . ">$itm->name %</option>";            
        }
        $discount = implode(",", $discounts);
        $all_warehouse = self::helper('ModelHelper')::getactive('Warehouse','Active');
        $warehouses = $select;
        foreach($all_warehouse as $itm){                  
            $warehouses[] = "<option value=" . $itm->id . ">$itm->name</option>";
        }
        $warehouse = implode(",", $warehouses);                 
        return view('admin.item.add',compact('data','uom','category','modifier','tax','discount','warehouse','data_line')); 
    } 
 
    public function warehouse_to_company(Request $request)
    {
        $option = "<option value=''></option>";
        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required',            
        ]);
        if($validator->fails()){ 
            return $option;
        } 
        try{   
            $data = self::model('Warehouse')::with('cmp')->find($request->warehouse_id); 
            $name = $data?->cmp?->name;                           
            $option = "<option value='$data?->company_id'>$name</option>";
            return $option;
        }
        catch(\Exception $e){  
            return $option;
        }

    }

    public function store(Request $request)
    {     
        $save = $request->save; 
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'uom_id'=> 'required',
            'sku'=> 'required',
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'barcode'=> 'required', 
            'status'=> 'required', 
        ]);


        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
        try{ 
            if($request->item_id){
                $id = convert_uudecode(base64_decode($request->item_id));
                $data = self::model('Item')::find($id);
            }
            else{  

                $found_data = self::helper('ModelHelper')::existance_by_or('Item',['code','name','sku','barcode'],[$request->code,$request->name,$request->sku,$request->barcode]);
 
                if($found_data){ 
                    return redirect($this->backtoitemnew())->with(['error' => __('This Record is already exist !')]);
                }                
                 
                $model = self::model('Item');
                $data = new $model();
                $data->code = $request->code;
                $data->name = $request->name;
                $data->created_by = $cmp_and_user[0];                
            } 
 
            $data->uom_id = $request->uom_id;
            $data->sku = $request->sku; 
            $data->category_id  = $request->category_id;
            $data->subcategory_id  = $request->subcategory_id; 
            $data->barcode = $request->barcode;
            $data->modifier_header_id = $request->modifier_header_id;

            if($request->weight_with_scale == "Yes"){
                $data->weight_with_scale = "Yes";
            }
            else{
                $data->weight_with_scale = "No";
            }

            if($request->is_pos == "Yes"){
                $data->is_pos = "Yes";
            }
            else{
                $data->is_pos = "No";
            }
           
            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = $request->status;
            $data->save();
            if($request->image){
                $imagedd = self::helper('ModelHelper')::folder_name($data->id,"Item","Item",$request->image,1,'image');
                $data->image = $imagedd[1];
            }
            $data->save();
            
            if($request->warehouse_id && count($request->warehouse_id) > 0){
                $i = 0;
                foreach($request->warehouse_id as $wear_id){                     

                    $item_warehouse = self::model('CompanyItem')::where('item_id',$data->id)->where('warehouse_id',$wear_id)->first();                    
                    if(!$item_warehouse){                         
                        $model = self::model('CompanyItem');
                        $item_warehouse = new $model();
                        $item_warehouse->item_id = $data->id;
                        $item_warehouse->warehouse_id = $wear_id;
                        $item_warehouse->comy_id = $request->comy_id[$i];
                    }

                    $item_warehouse->selling_price = $request->selling_price[$i];
                    $item_warehouse->product_quantity = $request->product_quantity[$i];
                    $item_warehouse->remaining_quantity = $request->product_quantity[$i];
                    $item_warehouse->discount_per = $request->discount_per[$i];
                    $item_warehouse->alert_quantity = $request->alert_quantity[$i];
                    $item_warehouse->selling_price_tax_type = $request->selling_price_tax_type[$i];
                    $item_warehouse->tax_per = $request->tax_per[$i];

                    $item_warehouse->company_id = $cmp_and_user[1];
                    $item_warehouse->created_by = $cmp_and_user[0]; 
                    if($request->not_for_selling && count($request->not_for_selling)>0){
                        if(in_array($request->check_box_val[$i],$request->not_for_selling)){
                            $item_warehouse->not_for_selling = 'Yes';
                        }
                        else{
                            $item_warehouse->not_for_selling = 'No';
                        }
                    }
                    else{
                        $item_warehouse->not_for_selling = 'No';
                    }
                    $item_warehouse->save();  
                    $i++;
                } 
            }
 
            self::db()::commit();


            if($request->item_id){
                $mess = "updated";
            }
            else{
                $mess = "created";                
            }

            if($save == "create_another"){
                return redirect($this->backtoitemnew())->with(['success' => "Record is ".$mess." successfully!"]);
            }
            else{
                return redirect($this->backtoitemlist())->with(['success' => "Record is ".$mess." successfully!"]);
            }
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect($this->backtoitemlist())->with(['error' => $e->getMessage()]);
        }

    }

    public function delete(Request $request)
    {     
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()){ 
            return ['status'=>201,'message'=>$validator->messages()->toJson()];     
        }
        try{   
            $data = self::model('CompanyItem')::find($request->id);
            $exist = self::model('OrderLine')::where('company_item_id',$request->id)->first();
            if(!$exist){
                $data->delete();
                return ['status'=>200,'message'=>'Item deleted']; 
            }
            return ['status'=>201,'message'=>'Item is in use']; 
        }
        catch(\Exception $e){
            return ['status'=>201,'message'=>$e->getMessage()];      
        }
    }

    protected function backtoitemnew()
    {
        return route('item-add');
    }
    protected function backtoitemlist()
    {
        return route('item-list');
    }
    protected function backtoitemedit($id)
    {
        return route('item-edit',['id'=>base64_encode(convert_uuencode($id))]);
    }

 
}
