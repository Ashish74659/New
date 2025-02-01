<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator; 
trait CategoryTraits
{
    public function cat_list(Request $request)
    {
        $data = self::helper('ModelHelper')::getactive('Category','all');        
        return view('admin.category.index',compact('data'));
    } 
     
    public function cat_add(Request $request)
    { 
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        } 
        $data = self::model('Category')::find($id);                  
        $pos = self::helper('ModelHelper')::getactive('PosType','Active'); 
        $subcategories = self::helper('ModelHelper')::children_by_parent('SubCategory','category_id',$id);        
        return view('admin.category.add',compact('data','pos','subcategories')); 
    } 
    
    public function cat_store(Request $request)
    {      
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'postype_id'=> 'required',            
        ]);
 
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
        try{ 
            if($request->category_id){
                $id = convert_uudecode(base64_decode($request->category_id));
                $data = self::model('Category')::find($id);
            }
            else{ 
                $found_data = self::unique_two('Category','name',$request->name,'code',$request->code);
                if($found_data){ 
                    return redirect($this->backtocategorynew())->with(['error' => __('This Record is already exist !')]);
                }
                 
                $model = self::model('Category');
                $data = new $model();
				$data->code = $request->code;
				$data->name = $request->name;
                $data->created_by = $cmp_and_user[0];                
            }  
            
            
            $data->description = $request->description;
            $data->postype_id = $request->postype_id;
            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = "Active";
            $data->save();
            if($request->image){
                $imagedd = self::helper('ModelHelper')::folder_name($data->id,"Category","Category",$request->image,1,'image');
                $data->image = $imagedd[1];
            }
            $data->save();
 
 
            self::db()::commit();
            if($request->category_id){
                return redirect($this->backtocategorylist())->with(['success' => __('Record is updated successfully !')]);
            }
            else
                return redirect($this->backtocategorylist())->with(['success' => __('Record is created successfully !')]);
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect($this->backtocategorylist())->with(['error' => $e->getMessage()]);
        }

    }

    protected function backtocategorynew()
    {
        return route('category-add');
    }
    protected function backtocategorylist()
    {
        return route('category-list');
    }  



    
    public function sub_cat_list(Request $request)
    {
        $data = self::helper('ModelHelper')::getactive('SubCategory','all');        
        return view('admin.subcategory.index',compact('data'));
    } 
     
    public function sub_cat_add(Request $request)
    { 
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        } 
        $data = self::model('SubCategory')::find($id);                  
        $cat = self::helper('ModelHelper')::getactive('Category','Active');      
        return view('admin.subcategory.add',compact('data','cat')); 
    } 
    
    public function sub_cat_store(Request $request)
    {      
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'category_id'=> 'required',            
        ]);
 
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
        try{ 
            if($request->subcategory_id){
                $id = convert_uudecode(base64_decode($request->subcategory_id));
                $data = self::model('SubCategory')::find($id);
            }
            else{ 
                $found_data = self::unique_two('SubCategory','name',$request->name,'code',$request->code);                
                if($found_data){ 
                    return redirect($this->backtosubcategorynew())->with(['error' => __('This Record is already exist !')]);
                }
                 
                $model = self::model('SubCategory');
                $data = new $model();
                $data->created_by = $cmp_and_user[0];                
                $data->code = $request->code;
                $data->name = $request->name;
            }  
            
            $data->description = $request->description;
            $data->category_id = $request->category_id;
            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = "Active";
            $data->save();
          
 
            self::db()::commit();
            if($request->subcategory_id){
                return redirect($this->backtosubcategorylist())->with(['success' => __('Record is updated successfully !')]);
            }
            else
                return redirect($this->backtosubcategorylist())->with(['success' => __('Record is created successfully !')]);
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect($this->backtosubcategorylist())->with(['error' => $e->getMessage()]);
        }

    }

    protected function backtosubcategorynew()
    {
        return route('sub-category-add');
    }
    protected function backtosubcategorylist()
    {
        return route('sub-category-list');
    }  

 
 
}
