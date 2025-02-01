<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator; 
use Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
// use App\Traits_next\TwoFactorAuth;
trait EmpUserTrait
{
      // use TwoFactorAuth;
      public function index(Request $request)
      {
          $data = self::helper('ModelHelper')::getactive('User','all');
          return view('users.index',compact('data'));
      }

      public function view(Request $request)
      {
          $id = convert_uudecode(base64_decode($request->id));
          $selectedcompany = self::helper('ModelHelper')::companies_by_doc_id('user_id',$id);
          $companies = self::model('Company')::select('name','code')->whereIn('id',$selectedcompany)->get();           
          $user = self::model('User')::find($id); 
          $userRole = $user?->roles->pluck('name','name')->all();               
          return view('users.view',compact('user','companies','userRole'));
      }
  
      public function add(Request $request)
      {
        $id = null;
        if($request->id){
            $id = convert_uudecode(base64_decode($request->id));
        }
        $data = self::model('User')::find($id);        
        $emps = [];                        
        $company = self::helper('ModelHelper')::getactive('Company','Active');
        $roles = Role::get();
        $userRole = [];
        if($data){
            $userRole = $data?->roles->pluck('name','name')->all();
        }
        $selectedcompany = self::helper('ModelHelper')::companies_by_doc_id('user_id',$id);
        $country = self::helper('ModelHelper')::getactive('Countries','Active'); 
        return view('users.add',compact('data','country','roles','userRole','company','selectedcompany'));
      }
  
    //   public function update(Request $request)
    //   {
    //       try {
    //           self::db()::beginTransaction();
    //           $validatedData = $request->validate([
    //               'roles' => 'required'
    //           ]);
    //           $input = $request->all();
    //           if(!empty($input['password'])){
    //               $input['password'] = Hash::make($input['password']);
    //           }else{
    //               $input = Arr::except($input,array('password'));
    //           }
    //           $id = convert_uudecode(base64_decode($request->id));
    //           $user = self::model('User')::find($id);
  
    //           if($user?->type == "Employee" && $request->employee_id){
    //               $emp = self::model('Company_employee')::find($request->employee_id);
    //               if($emp){
    //                   $emp->user_id = $id;
    //                   $emp->save();
    //                   $user->emp_id = $request->employee_id;
    //               }
    //               else{
    //                   self::db()::rollback();
    //                   return redirect()->back()->with(['error' => 'Employee not found']);                    
    //               }
    //           } 
    //           self::model('UserCompany')::where('user_id',$id)->delete();
    //              $i =0;
    //               foreach($request->company_id as $index =>$cmp_id){
    //                   $model = self::model('UserCompany');
    //                   $user_company = new $model();
    //                   $user_company->user_id = $id;
    //                   $user_company->company_id = $cmp_id;
    //                   $user_company->status = 'Active';
    //                   $user_company->save();
    //                   $i =$i++;
    //               }
                   
    //           $user->save();
    //           if($request->enable_2fa)
    //           {
    //               $fa_enable = $this->two_fa_setup('on',$user->id);
    //           }
    //           else{
    //               $fa_enable = $this->two_fa_setup('off',$user->id);
    //           }
    //           self::db()::table('model_has_roles')->where('model_id',$id)->delete();
    //           $user->assignRole($request->input('roles'));
    //           self::db()::commit();
    //           return redirect()->route('user-list')->with('success','User updated successfully');
    //       } catch (\Exception $e) {
    //           self::db()::rollback();
    //           return redirect()->back()->with(['error' => $e->getMessage()]);
    //       }
    //   }
   
      public function store(Request $request)
      {              
          try {
            self::db()::beginTransaction();
            $cmp_and_user = self::loginandcompany();

            if($request->user_id){
                $validator = Validator::make($request->all(), [                    
                    'company_id' => 'required',
                    'roles' => 'required',
                    'dob' => 'required',
                    'status' => 'required',
                    'city' => 'required',
                    'post_box' => 'required',
                    'country_id' => 'required',
                    'address' => 'required',
                ]);
            }
            else{
                $validator = Validator::make($request->all(), [
                    'code' => 'required',
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|same:confirm_password',
                    'company_id' => 'required',
                    'roles' => 'required',
                    'dob' => 'required',
                    'status' => 'required',
                    'city' => 'required',
                    'post_box' => 'required',
                    'country_id' => 'required',
                    'address' => 'required',
                    'image' => 'required',
                ]);
            }
 
            
            if($validator->fails()){ 
                return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
            } 

            $user_id = null;
            if($request->user_id){
                $user_id = convert_uudecode(base64_decode($request->user_id));
                $data = self::model('User')::find($user_id);
            }
            else{
                $model = self::model('User');
                $data = new $model();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->code = $request->code;
            }
                           
            $data->dob = $request->dob;            
            $data->city = $request->city;
            $data->post_box = $request->post_box;
            $data->country_id = $request->country_id;
            $data->address = $request->address;
            $data->status = $request->status;
            $data->type = 'User';            
            $data->company_id = $cmp_and_user[1];
            
            if($request->password){
                $data->password = Hash::make($request->password);
            }
            $data->save();

            if($request->image){
                $imagedd = self::helper('ModelHelper')::folder_name($data->id,"User","User",$request->image,1,'image');
                $data->profile_img = $imagedd[1];
            }
            $data->save();
             
            self::model('UserCompany')::where('user_id',$user_id)->delete();
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
              return redirect()->route('user-list')->with(['error' =>$e->getMessage()]);
          }
      }

}
