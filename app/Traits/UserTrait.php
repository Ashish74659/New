<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;
use App\Models\Blocked_users;
use App\Enum\StatusEnum;
use App\Models\SystemAdminSetup;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

trait UserTrait
{
    public function index()
    {
        try { 
            $userData =  User::UsersActive(); 
            $company = Company::get();
            return view('setting.user.index', compact('userData', 'company'));
        } catch (\Exception $e) {
            return redirect()->route('user-list')->with(['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $userId = Auth::check() ? Auth::id() : true;
            $data = $request->validate(
                [
                    'user_name'     => 'required|max:20',
                    'company' => 'required',
                    'user_email' => 'required',
                    'user_password' => [
                        'required',
                        Password::min(8)->letters()->mixedCase()->numbers()->symbols()
                    ],
                    'cnf_password' => 'required|same:user_password',
                ],
                [
                    'cnf_password.same' => 'Confirm password should match with new password',
                ]
            );
            $email = $request->user_email;
            $userCount = User::where('email', $email)->first();
            if ($userCount) {
                return redirect('vendorsetup/user/user-list')->with(['error' => __('This Email is already exist.')]);
            } else {
                $pass = Hash::make($request->user_password);
                User::create([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'password' => $pass,
                    'company_id' => $request->company,
                    'status' => 1,
                    'role' => 'guest',
                ]);
                return redirect('vendorsetup/user/user-list')->with(['success' => __('Record is created successfully !')]);
            }
            return redirect('vendorsetup/user/user-list');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-list')->with(['error' => $e->getMessage()]);
        }
    } 

    public function editUser(User $user, $id)
    {
        return view('setting.user.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function updateuser(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->formid;
            if ($request->user_password != '' ||  $request->cnf_password != '') {
                $data = $request->validate(
                    [
                        'user_password' => [
                            Password::min(8)->letters()->mixedCase()->numbers()->symbols()
                        ],
                        'cnf_password' => 'same:user_password',
                    ],
                    [
                        'cnf_password.same' => 'Confirm password should match with new password',
                    ]
                );

                $pass = Hash::make($request->user_password);
                $data = User::find($id);
                $data->status = $request->status;
                $data->password = $pass;
                $data->save();
                DB::commit();
                return redirect('vendorsetup/user/user-list')->with(['success' => __('Record is updated successfully !')]);
            } else {
                $data = User::find($id);
                $data->status = $request->status;
                $data->save();
                DB::commit();
                return redirect('vendorsetup/user/user-list')->with(['success' => __('Record is updated successfully !')]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-list')->with(['error' => $e->getMessage()]);
        }
    }

    public function block_User(Request $request, $id)
    {
        $uuid = Str::uuid()->toString();
        $data = User::find($id);
        $data->status = "Block";
        $data->password = $uuid;
        $data->email_verified_at = null;
        $data->save();
        return redirect('vendorsetup/user/user-list')->with(['success' => __('User id successfully blocked !')]);

    }

    public function Unblock_User(Request $request, $id)
    {
        DB::beginTransaction();
        try {
        $random = rand(100000, 999999);
        $pass = Hash::make($random);
        $data = User::find($id);
        $data->status = "Block";
        $data->password = $pass;
        $data->save(); 
        DB::commit();
        return redirect('vendorsetup/user/user-list')->with(['success' => __('User id successfully unblocked!')]);
        }
            catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', $e->getMessage())->autoClose(4000);
            return redirect()->route('user-list');
        }
    }

    public function block_FrontUser(Request $request, $id)
    {

        $uuid = Str::uuid()->toString();        
        try {
        $data = User::find($id);
         
        $data->status = 0;
        $data->password = $uuid;
        $data->email_verified_at = null;
        $data->save(); 
        return redirect('vendorsetup/user/front-user-list')->with(['success' => __('User id successfully blocked !')]);
        }
            catch (\Exception $e) { 
            Alert::error('Error', $e->getMessage())->autoClose(4000);
            return redirect()->route('front-user-list');
        }
    }

    public function Unblock_FrontUser(Request $request, $id)
    { 
        $random = rand(100000, 999999);
        $pass = Hash::make($random);
        $data = User::find($id);
        $data->status = 1;
        $data->password = $pass;
        $data->save();

        return redirect('vendorsetup/user/front-user-list')->with(['success' => __('User id successfully unblocked !')]);
    }

    public function ChangePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Blocked_users::find($id);
            user::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
            ]);
            $data1 = $data->delete();
            DB::commit();
            return redirect('vendorsetup/user/front-user-list')->with(['success' => __('User id successfully unblocked!')]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('front-user-list')->with(['error' => $e->getMessage()]);
        }
    }

    public function systemadmin()
    {
        $systemadmin = SystemAdminSetup::latest()->first();
        return view('admin.masterSetting.system-admin',compact('systemadmin'));
    }

    public function systemadminStore(Request $request)
    {
        if($request->id)
        {
            $data = SystemAdminSetup::find($request->id);
            $data->otptime = $request->otp_time;
            $data->otp_enable = $request->otp_time_enable;
             $data->numbertime = $request->number_attempts;
             $data->number_enable = $request->number_attempts_enable;
             $data->registration = $request->registration_setting;
             $data->mailSetting = $request->email_setting;
             $data->host = $request->host;
             $data->port = $request->port;
             $data->username = $request->username;
             $data->password = $request->password;
             $data->encryption = $request->encryption;
             $data->address = $request->address;
             $data->status = StatusEnum::APPROVED;
             $data->save();
        }
        else{
            $data = SystemAdminSetup::create([
                'otptime'=>$request->otp_time,
                'otp_enable'=>$request->otp_time_enable,
                'numbertime'=>$request->number_attempts,
                'number_enable'=>$request->number_attempts_enable,
                'registration'=>$request->registration_setting,
                'mailSetting'=>$request->email_setting,
                'host'=>$request->host,
                'port'=>$request->port,
                'username'=>$request->username,
                'password'=>$request->password,
                'encryption'=>$request->encryption,
                'address'=>$request->address,
                'status'=>StatusEnum::APPROVED,
            ]);
        } 
        $systemadmin = SystemAdminSetup::find($data->id);
        return view('admin.masterSetting.system-admin', compact('systemadmin'))->with(['success' => __('Record is updated successfully !')]);
    }
}
