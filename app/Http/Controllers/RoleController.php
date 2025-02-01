<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('setting.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permission = Permission::get();
        $all_menus = Menu::get();
        return view('setting.role.new',compact('all_menus'));
    }

    public function rolemenusetting(Request $request)
    {

        $data =[];
        if($request->ids){
            if(in_array('All', $request->ids))
            {
                $data = Permission::with('Menu_details')->latest()->get();
            }else{
                $data = Permission::with('Menu_details')->whereIn('menu_id', $request->ids)->get();
            }
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {        
        $request->validate(['name'=>'required']);
        $role = Role::create(['name'=>$request->name,'description'=>$request->description]);
        $permission = Permission::whereIn('id',$request->permission)->get();
        $permission = $permission->pluck('name')->toArray();        
        $role->syncPermissions($permission);
        return redirect('user/roles')->with(['success' => __('Record is created Successfully !')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('setting.role.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role,Request $request)
    {        
        $all_menus = Menu::get();
        $all_permissions= $role->permissions;
        $permission_list = $role->permissions->pluck('id')->toArray();
        $permission = Permission::with('Menu_details')->whereIn('id', $permission_list)->get();
        $selected_menus = array_unique($permission->pluck('menu_id')->toArray());        
        return view('setting.role.edit',compact('role','all_menus','all_permissions','selected_menus'));        

    }
    public function editMenu(Request $request){
        $role_id = convert_uudecode(base64_decode($request->role_id));
        $role = Role::with('permissions')->find($role_id);
        $role->permissions;

        $permission_list = $role->permissions->pluck('id')->toArray();

        $data = Permission::with('Menu_details')->whereIn('menu_id', $request->ids)->get();
        $html = '';
        foreach ($data as $item) {
            $html .= '<tr>';
            $html .= '<td><input type="checkbox" name="permission[]" class="checkone1" value="' . $item?->id . '"' . (in_array($item->id, $permission_list) ? 'checked' : '') . '></td>';
            $html .= '<td>' . $item?->name . '</td>';
            $html .= '<td>' . $item?->Menu_details?->menu_name . '</td>';
            $html .= '</tr>';
        }
        return $html;      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): RedirectResponse
    {

        $validatedData = $request->validate([
            'permissions.*' => 'required',
        ]);
        try{
            $role_id = convert_uudecode(base64_decode($request->role_id));
            if($request->permission == null ){
                return redirect('user/roles')->with(['success' => __('Record Updated Successfully !')]);
            }
            $role = Role::find($role_id);
            $role->description = $request->input('description');
            $role->save();
            $permission = Permission::whereIn('id',$request->permission)->get();
            $permissions = $permission->pluck('name')->toArray();
            $role->syncPermissions($permissions);
            return redirect('user/roles')->with(['success' => __('Record Updated Successfully !')]);
        }catch(\Exception $e)
        {            
            return redirect('user/roles')->with(['error' => __('Something went wrong !')]);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {         
        $role = Role::findOrFail($id);
        if($role->users()->exists())
        {            
            return redirect()->back()->with(['error' => __("Can't delete! This record is in use.")]);
        }else{
            $role->delete();            
            return redirect()->back()->with(['success' => __("Record is deleted successfully !")]);
        }
    }
}
