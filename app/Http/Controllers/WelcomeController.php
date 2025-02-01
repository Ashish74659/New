<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash; 
class WelcomeController extends Controller
{ 
    public function index(Request $request)
    {
        $data = null;//self::helper('ModelHelper')::getactive('User','all');        
        return view('welcome',compact('data'));
    }
    public function view(Request $request)
    {
        $id = convert_uudecode(base64_decode($request->id));
        $user = self::model('User')::find($id);
        return view('users.view',compact('user'));
    }

    public function edit(Request $request)
    {

        $id = convert_uudecode(base64_decode($request->id));
        $user = self::model('User')::find($id);
        $company_access = false;
        $emps = [];
        $emp_access = false;
        if($user?->type == "User"){
            $company_access = true;
        }
         
        $company = self::helper('ModelHelper')::getactive('Company','Active');
        $roles = Role::get();
        $userRole = $user->roles->pluck('name','name')->all();
        $selectedcompany = self::helper('ModelHelper')::companies_by_doc_id('user_id',$id);

        return view('users.edit',compact('emp_access','emps','user','roles','userRole','company','selectedcompany','company_access'));
    }

    public function update(Request $request)
    {

        try {
            self::db()::beginTransaction();
            $validatedData = $request->validate([
                'roles' => 'required'
            ]);
            $input = $request->all();
            if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('password'));
            }
            $id = convert_uudecode(base64_decode($request->id));
            $user = self::model('User')::find($id);

            if($user?->type == "Employee" && $request->employee_id){

                $emp = self::model('Company_employee')::find($request->employee_id);
                if($emp){
                    $emp->user_id = $id;
                    $emp->save();
                    $user->emp_id = $request->employee_id;

                }
                else{
                    self::db()::rollback();
                    return redirect()->back();
                }

            }

            if($user?->type == "Employee" || $user?->type == "User"){
                self::model('UserCompany')::where('user_id',$id)->delete();
               $i =0;
                foreach($request->company_id as $index =>$cmp_id){
                    $model = self::model('UserCompany');
                    $user_company = new $model();
                    $user_company->user_id = $id;
                    $user_company->company_id = $cmp_id;
                    $user_company->status = 'Active';
                    $user_company->save();
                    $i =$i++;
                }
                $user->save();
            }
            $user->save();
            if($request->enable_2fa)
            {
                $fa_enable = $this->two_fa_setup('on',$user->id);
            }
            else{
                $fa_enable = $this->two_fa_setup('off',$user->id);
            }
            self::db()::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
            self::db()::commit();
            return redirect()->route('user-list')->with('success','User updated successfully');
        } catch (\Exception $e) {
            self::db()::rollback();
            return redirect()->back()->with(['error' => __('Something went wrong !')]);

        }
    }

    public function add(Request $request)
    {
        $cmp_and_user = self::loginandcompany();
        $employee = self::model('Company_employee')::where('company_id',$cmp_and_user[1])->where('status','Active')->where('user_id',null)->get();        
        $company = self::helper('ModelHelper')::getactive('Company','Active');
        $roles = Role::get();
        return view('users.create',compact('roles','company','employee'));
    }

    public function store(Request $request)
    { 
        try {
            self::db()::beginTransaction();
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm_password',
                'company_id' => 'required',
            ]);

            $emp_id = null;
            if($request->emp_id){
                $emp_id = convert_uudecode(base64_decode($request->emp_id));
            }
            $data = self::helper('ModelHelper')::create_user($request->name,$request->email,null,null,$request->password,'User');
            $data->emp_id = $emp_id;
            $data->save(); 

            $emps = self::model('Company_employee')::find($emp_id);
            if($emps){
                $emps->user_id = $data->id;
                $emps->email = $request->email;
                $emps->save();
            }

            foreach($request->company_id as $cmp_id){
                $model = self::model('UserCompany');
                $user_company = new $model();
                $user_company->user_id = $data->id;
                $user_company->company_id = $cmp_id;
                $user_company->status = 'Active';
                $user_company->save();
            }
            
            $data->assignRole($request->roles);
            self::db()::commit();
            return redirect()->route('user-list')->with(['success' => __('User created successfully !')]);
        } catch (\Exception $e) {
            self::db()::rollback();
            return redirect()->back();
        }
    }

}
