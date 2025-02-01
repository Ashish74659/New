<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
trait ModifierTrait
{
    
    public function index(Request $request)
    {
        $data = self::helper('ModelHelper')::getactive('ModifierHeader','all');        
        return view('admin.item.modifier.index',compact('data'));        
    } 
    

    public function add(Request $request)
    {
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        }
        $all_items = self::helper('ModelHelper')::getactive('Item','Active');
        $items = ["<option value=''>--Select Product--</option>"];
        foreach($all_items as $itm){                  
            $items[] = "<option value=" . $itm->id . ">$itm->code / $itm->name</option>";            
        }
        $item = implode(",", $items);
        $data = self::model('ModifierHeader')::find($id);
        $lines = self::model('ModifierLine')::where('modifier_header_id',$id)->get();
        return view('admin.item.modifier.add',compact('data','items','lines'));  
    } 

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [            
            'name' => 'required',             
        ]);
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
         
        try{ 
            if($request->modifier_header_id){
                $id = convert_uudecode(base64_decode($request->modifier_header_id));
                $data = self::model('ModifierHeader')::find($id);                                
            }
            else{            
                $found_data = self::helper('ModelHelper')::existance_by_or('ModifierHeader',['name'],[$request->name]);
                if($found_data){ 
                    self::db()::rollback(); 
                    return redirect($this->backtomodifiernew())->with(['error' => __('This Record is already exist !')]);
                }                 
                $model = self::model('ModifierHeader');
                $data = new $model();                               
                $data->created_by = $cmp_and_user[0];
                $data->name = $request->name;
                $data->code = self::helper('MasterHelper')::generate_code('ModifierHeader'); 
            } 
            $data->description = $request->description;                       
            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = "Active";
            $data->save();

            self::model('ModifierLine')::where('modifier_header_id',$data->id)->delete();
            $i = 0;
            if($request->item_id && count($request->item_id) > 0){
                foreach($request->item_id as $itm_id){
                    $new_found_data = self::helper('ModelHelper')::existance_by_and('CompanyItem',['modifier_header_id','item_id'],[$data->id,$itm_id]);
                    if($new_found_data){ 
                        self::db()::rollback(); 
                        return redirect($this->backtomodifiernew())->with(['error' => __('Some Modifier lines repeated !')]);
                    }  
                    $modelline = self::model('ModifierLine');
                    $dataline = new $modelline();
                    $dataline->modifier_header_id = $data?->id;
                    $dataline->item_id = $itm_id;

                    if($itm_id){
                        $itms = self::model('Item')::find($itm_id);                        
                        $dataline->item_name = $itms?->name;
                    }
                    else{
                        $dataline->item_name = $request->item_name[$i];
                    }

                    $dataline->modifier_name = $request->modifier_name[$i];
                    $dataline->price = $request->price[$i];
                    $dataline->company_id = $cmp_and_user[1];
                    $dataline->created_by = $cmp_and_user[0];
                    $dataline->save();
                    $i++;
                }
            }

            self::db()::commit();                  
            return redirect($this->backtomodifierlist())->with(['success' => __('Record is created successfully !')]);
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect($this->backtomodifierlist())->with(['error' => $e->getMessage()]);
        }
    }
 
   
    protected function backtomodifiernew()
    {
        return route('modifier-add');
    }
    
    protected function backtomodifierlist()
    {
        return route('modifier-list');
    }

    protected function backtomodifieredit($id)
    {
        return route('modifier-edit',['id'=>base64_encode(convert_uuencode($id))]);
    }



}

 