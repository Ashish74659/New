<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = self::helper('ModelHelper')::user_type();
        if ($user[2] == "Approved Vendor") {       
            $t_id = null;
            $lines_ids = [];
            $lineofbusiness = [];
            $salestaxgroup = [];
            $chain = [];
            $segment = [];
            $subsegment = [];
            $complete_task = 0;
            $my_task = null;
            $w_id = '';
            if ($request->w_id) {
                
                    $lineofbusiness = self::helper('ModelHelper')::getactive('LineOfBusiness', 'Active');
                    $salestaxgroup = self::helper('ModelHelper')::getactive('SalesTaxGroup', 'Active');
                    $chain = self::helper('ModelHelper')::getactive('Chain', 'Active');
                    $segment = self::helper('ModelHelper')::getactive('Segment', 'Active');
                    $subsegment = self::helper('ModelHelper')::getactive('SubSegment', 'Active');
             
            }
            $vendorEmail = Auth::user()->email;
            $data = null;
           
            $id = $data->id;
            
            $view_data = self::get_vendor_details($id);    
            $data = $view_data[0];
            $type_of_business_docs = $view_data[1];
            $quality_safety_docs = $view_data[2];
            $vendor_category = $view_data[3];
            $business_reference_docs = $view_data[4];
            $vendor_turnover = $view_data[5];
            $vendor_bank_details = $view_data[6];
            $vendor_refrences = $view_data[7];

            $vendor_business_line = self::model('Vendor_LineOfBusiness')::where('vendor_id', $data->id)->get();
            if ($vendor_business_line && count($vendor_business_line) > 0) {
                foreach ($vendor_business_line as $lines) {
                    $lines_ids[] = $lines->lineofbusiness_id;
                }
            }

            $tasks = self::model('AssignedTask')::with('task')->where('vendor_profile_id', $data?->id)->get();            
            $complete_task = count(self::model('AssignedTask')::where('vendor_profile_id', $data?->id)->where('status', 'Completed')->get());
            if ($complete_task) {
                $avg = 100 / count($tasks);
                $complete_task = $avg * $complete_task;
            }

            if ($request->t_id) {
                $t_id = convert_uudecode(base64_decode($request->t_id));
            }
            $my_task = self::model('AssignedTask')::find($t_id);


            $checklist_required = self::model('Setup')::where('type', 'Checklist_required')->pluck('type_value')->first();
            $checklist = self::helper('ModelHelper')::getactive('Checklist', 'Active');
            return view('profile.edit', compact('w_id', 'data', 'type_of_business_docs', 'quality_safety_docs', 'vendor_category', 'business_reference_docs', 'vendor_turnover', 'vendor_bank_details', 'complete_task', 'vendor_refrences', 'checklist', 'checklist_required', 'tasks', 'my_task', 'lineofbusiness', 'salestaxgroup', 'chain', 'segment', 'subsegment', 'lines_ids'));
        }else{
            return view('profile.editother');
        }

    }
    /**
     * Display the user's profile form.
     */
    public function change_password(Request $request): View
    {
        return view('profile.changepassword', [
            'user' => $request->user(),
        ]);
    }
    public static function get_vendor_details($id)
    {
        $data = null;
        $type_of_business_docs = [];
        $quality_safety_docs = [];
        $vendor_category = [];
        $business_reference_docs = [];
        $vendor_turnover = [];
        $vendor_bank_details = [];
        $data = null;
         
        return [$data, $type_of_business_docs, $quality_safety_docs, $vendor_category, $business_reference_docs, $vendor_turnover, $vendor_bank_details, $vendor_refrences, $vendor_question];
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
