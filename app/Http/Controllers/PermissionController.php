<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Menu;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $all_permission = Permission::orderBy('id','DESC')->get();
        
        return view('setting.permission.index',compact('all_permission'));
    }
    public function create()
    {
        $menuset = Menu::get();
        $permission= null;
        return view('setting.permission.new',compact('menuset','permission'));
    }
    public function store(Request $request)
    { 
        $request->validate([
            'menu_setting'=>'required',
            'permission_name'=>'required',
        ]);
        if($request?->permission_id)
        {
            $id = convert_uudecode(base64_decode($request?->permission_id));
            $permission = Permission::find($id);
            $permission->menu_id = $request?->menu_setting;
            $permission->save(); 
            return redirect()->back()->with(['success' => __('Record is updated successfully!')]);
        }else{

            $permissionname = Permission::where('name',$request->permission_name)->first();
            if($permissionname){
               return redirect()->back()->with(['error' => __('This Record is already exist.')]);
            }

            $permission = Permission::create([
                'name'=>$request->permission_name,
                'menu_id' =>$request?->menu_setting,
            ]); 
            return redirect()->back()->with(['success' => __("Record is created successfully !")]);
        }


    }
    public function edit($id)
    { 
        $menuset = Menu::get();
        $permission = Permission::find($id);
        return view('setting.permission.new',compact('menuset','permission'));
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if($permission->roles()->exists())
        { 
            return redirect()->back()->with(['error' => __("Can't delete! This record is in use.")]);
        }else{
            $permission->delete(); 
            return redirect()->back()->with(['success' => __("Record is deleted successfully !")]);
        }
    }

}
