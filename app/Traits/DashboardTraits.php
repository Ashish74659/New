<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request; 
use App\Models\SystemAdminSetup;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CustomerRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert; 
use Illuminate\Support\Facades\Validator;

trait DashboardTraits
{


    public function dashboard()
    {
        $data = null;
        return view('employee_dashboard', compact('data'));

        // switch ($usertype) {
        //     case 'Employee':
        //         if (Gate::forUser(auth()->user())->allows('Employee Dashboard')) {
        //             
        //         }
        //         Auth::guard('web')->logout();
        //         return abort(403);
        //         break;
        //     case 'Approved Vendor':

        //         if (Gate::forUser(auth()->user())->allows('Vendor Dashboard')) {
        //             $email = Auth::user()->email;
        //             $vendor_ids = Controller::helper('ModelHelper')::getvendorId($email);
        //             $awardedtenders = self::model('PurchaseOrder')::with('tender')->whereIn('vendor_id', $vendor_ids)->whereNotNull('tender_id')->take(5)->get();
        //             $purchaseOrders = self::model('PurchaseOrder')::whereIn('vendor_id', $vendor_ids)->whereIn('status', ['Approved', 'In review'])->latest('created_at')->take(5)->get();
        //             return view('admin.vendor.vendor_dashboard', compact('data', 'awardedtenders', 'purchaseOrders'));
        //         }
        //         Auth::guard('web')->logout();
        //         return abort(403);
        //         break;
        //     default:
        //         return view('dashboard');
        //         break;
        // }
    }



    public function masterSetting()
    {
        return view('admin.masterSetting.mastersetting');
    }


    public function show()
    {
        $data = $this->dashboardCount->all();
    }

    public function dashboard_index()
    {
        dd("dashboard");
        // $auctions = $this->dashboardCount->activeAuctionData();
        // $purchaseorders = $this->dashboardCount->purchaseData();
        // $custReqs = $this->dashboardCount->cust_reqData();
        // $vendor_profiles = $this->dashboardCount->pendingVendorReqData();
        // $tenders = $this->dashboardCount->tenderData();
        // $rfi = $this->dashboardCount->publishedRfiData();
        // $purchaseByGroup = $this->dashboardCount->purchaseByGroup();
        // $tndrByMonth = $this->dashboardCount->tenderByMonth();

        // return view(
        //     'admin.dashboard.maindashboard',
        //     compact(
        //         'auctions',
        //         'purchaseorders',
        //         'custReqs',
        //         'vendor_profiles',
        //         'tenders',
        //         'rfi',
        //         'purchaseByGroup',
        //         'tndrByMonth',

        //     )
        // );
    }
   
    public function systemadmin()
    {
        $systemadmin = SystemAdminSetup::first();
        $currency = self::helper('ModelHelper')::getactive('Currency', 'Active');
        return view('admin.masterSetting.system-admin', compact('systemadmin', 'currency'));
    }

    public function systemadminStore(Request $request)
    {
        $number_attempts_enable=1;
        if($request->number_attempts_enable==null)
        {
            $number_attempts_enable=0;
        }

        $auto_release_enable=1;
        if($request->auto_release_enable==null)
        {
            $auto_release_enable=0;
        }
        $data = SystemAdminSetup::first();
        $data->otptime = $request->otp_time;
        $data->otp_enable = $request->otp_time_enable;
        $data->numbertime = $request->number_attempts;
        $data->number_enable = $number_attempts_enable;
        $data->auto_release_time = $request->auto_release_time;
        $data->auto_release_enable = $auto_release_enable;
        $data->registration = $request->registration_setting;
        $data->mailSetting = $request->email_setting;
        $data->host = $request->host;
        $data->port = $request->port;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->encryption = $request->encryption;
        $data->address = $request->address;
        $data->default_currency_id = $request->currency_id; 
 
        $data->save();
        return redirect()->back()->with(['success' => __('Record is updated successfully !')]);
    }

    public function emp_admin_profile()
    {
        $user_id = Auth::user()?->id;
        $user = self::model('User')::with('totalCompany', 'totalCompany.company')->find($user_id);
        $company = $user?->totalCompany;
        return view('user-profile', compact('user', 'company'));
    }
    public function emp_admin_change_password()
    {
        $user_id = Auth::user()?->id;
        $user = self::model('User')::with('totalCompany', 'totalCompany.company')->find($user_id);
        $company = $user?->totalCompany;

        return view('vendor-emp-change-pass', compact('user', 'company'));
    }

      
    public function updateProfilePhoto(Request $request)
    {

        $user = Auth::user();
        $data = self::model('User')::find($user->id);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('uploads/' . $imageName);

            $image->move(public_path('profile'), $imageName);

            $data->profile_img = $imageName;
            $data->save();
        }
        return back()->with(['success' => __("Profile updated successfully !")]);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $data = self::model('User')::find($user->id);
        $old_password = $request?->oldPassword;
        $newPassword = $request?->newPaassword;

        $at =  Auth::attempt(['email' => $user->email, 'password' => $old_password]) ;

        if (!$at) {
            return back()->with(['error' => __("Current Password Doesn't Match !")]);
        }

        $data->password = Hash::make($newPassword);
        $data->save();

        return back()->with(['success' => __("Password Changed successfully !")]);

    }
}
