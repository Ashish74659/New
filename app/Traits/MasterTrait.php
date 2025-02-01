<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait MasterTrait
{

    public function fileTest(Request $request)
    {
       $filePath = urldecode($request->path);
       if ( $filePath && Storage::disk('public')->exists($filePath)) {
           return response()->file(storage_path("app/public/{$filePath}"));
       }
       abort(404, 'File not found');
    }

    public function index(Request $request,$mod)
    {
        $data = self::helper('ModelHelper')::getactive($mod,'all');
        return view('masters.common.master.index', compact('data','mod'));
    }
    
    public function add(Request $request,$mod)
    {        
        $model = self::model($mod);
        if($request?->masters_code)
            $next_code = $request->masters_code;
        else
            $next_code = self::helper('MasterHelper')::generate_code($mod);

        $cmp_and_user = self::loginandcompany();    
        $found_data = self::unique_two($mod,'name',$request->masters_name,'code',$next_code);  
             
        if($request->masters_name && $request->masters_description){
            if($found_data){
                return 202;
            }
            else{
                try{
                    $data = new $model();
                    $data->code = $next_code;
                    $data->name = $request->masters_name;
                    $data->description = $request->masters_description;
                    $data->created_by = $cmp_and_user[0];
                    $data->company_id = $cmp_and_user[1];                     
                    $data->status = "Active";

                    if($mod == "Currency"){
                        $data->symbol = $request->master_symbol;
                    }
                    

                    $data->save();
                    self::db()::commit();
                    return 200;
                }
                catch(\Exception $e){
                    self::db()::rollback();
                    return 201;
                }
            }
        }
        else{
            return 203;
        }

        //200 success , 201 error , 202 record exist , 203 required
    }

    public function edit(Request $request,$mod)
    {
        $id = $request->doc_id;
        if($id){
            if(strlen($id) > 10){
                $id = convert_uudecode(base64_decode($id));    
            }         
            $data = self::helper('ModelHelper')::find($mod,$id);            
            return $data;
        }
        else{
            return redirect($this->backtoindex($mod));
        }
    }

    public function update(Request $request,$mod)
    {
        if($request->master_id){
            self::db()::beginTransaction();
            try{
                $data = self::model($mod)::find($request->master_id); 
                $data->description = $request->master_description;
                if($mod == "Currency"){
                    $data->symbol = $request->master_symbol;
                }
                $data->status = "Active";
                $data->save();
                self::db()::commit();
                return true;
            }
            catch(\Exception $e){
                self::db()::rollback();
                return false;
            }
        }
        else{
            return redirect($this->backtoindex($mod));
        }
    }

    public function delete(Request $request,$mod,$doc_id)
    {
        if($doc_id && $mod){
            $id = convert_uudecode(base64_decode($doc_id));
            $dep_model = '';
            $dep_column = '';

            switch($mod){
                 


            }
            if($dep_model && $dep_column){
                $checkdep = self::model($dep_model)::where($dep_column,$id)->first();
                if(!$checkdep){
                    $data = self::model($mod)::find($id);
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
                return 202;
        }
        else{
            return 202;
        }
    }

    protected function backtoindex($mod)
    {
        return url('/master/'.$mod.'-list');
    }

    protected function indexs($parent,$mod)
    {
        $data = self::helper('ModelHelper')::getactive($mod,'all');
        $parentdata = self::helper('ModelHelper')::getactive($parent,'all');
        return view('masters.common.master_with_child.index', compact('data','parentdata','mod','parent'));
    }

    public function adds(Request $request,$parent,$mod)
    {        
        
       
        $model = self::model($mod); 
        $prnt = strtolower($parent).'_id';
        if($request?->masters_code)
            $next_code = $request->masters_code;
        else
            $next_code = self::helper('MasterHelper')::generate_code($mod);

        $cmp_and_user = self::loginandcompany();
        // $found_data1 = $model::where('name',$request->masters_name)->where($prnt,$request->parent_id)->where('company_id',$cmp_and_user[1])->first();
        // $found_data2 = $model::where('code',$next_code)->where($prnt,$request->parent_id)->where('company_id',$cmp_and_user[1])->first();

        if($request->masters_name && $request->masters_description){
            // if($found_data1 || $found_data2){
            //     return false;
            // }
            // else{ 
                try{ 
                    $data = new $model();
                    $data->code = $next_code;
                    $data->name = $request->masters_name;
                    if($parent == "Company"){
                        $data->cmp_id = $request->parent_id;
                    }
                    else{
                        $data->$prnt = $request->parent_id;
                    }
                    $data->description = $request->masters_description;
                    $data->created_by = $cmp_and_user[0];
                    $data->company_id = $cmp_and_user[1];
                    $data->status = "Active";
                    $data->save();
                    self::db()::commit();
                    return true;
                }
                catch(\Exception $e){
                    self::db()::rollback();
                    return false;
                }
            // }
        }
        else{
            return redirect($this->backtoindex($mod));
        }
    }

    public function edits(Request $request,$parent,$mod)
    {

        if($request->doc_id){
            $id = convert_uudecode(base64_decode($request->doc_id));
            $data = self::model($mod)::find($id);
            return $data;
        }
        else{
            return redirect($this->backtoindex($mod));
        }
    }

    public function updates(Request $request,$parent,$mod)
    {
        if($request->master_id){
            self::db()::beginTransaction();
            try{
                $data = self::model($mod)::find($request->master_id);                
                $data->description = $request->master_description;
                $data->status = "Active";
                $data->save();
                self::db()::commit();
                return true;
            }
            catch(\Exception $e){
                self::db()::rollback();
                return false;
            }
        }
        else{
            return redirect($this->backtoindex($mod));
        }
    }

    public function get_subcategory(Request $request)
    {  
        if(strlen($request->parent_id) > 10){
            $id = convert_uudecode(base64_decode($request->parent_id));
        }
        else{
            $id = $request->parent_id;
        }
        $subcategories = self::helper('ModelHelper')::children_by_parent($request->child,$request->parent_column,$id);
        return $subcategories;
    }

    public function deletes(Request $request,$parent,$mod)
    {
        if($request->id){
            $model = self::model($mod);
            return 200;
        }
        else{
            return 202;
        }
    }

    
    

    public function switch_company(Request $request)
    {
        $user_id = self::user_id();
        $cmp_id = convert_uudecode(base64_decode($request->company_id));
        $user = self::model('User')::find($user_id);
        $user->company_id = $cmp_id;
        $user->save();
        return 200;
    }


    public function find_doc_by_id(Request $request)
    {
        return self::helper('ModelHelper')::find($request->model,$request->id);
    }

}
