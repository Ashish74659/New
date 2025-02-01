<?php

namespace App\Service_next;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Traits_next\ApiResponse;
use App\Traits_next\VendorApproveReject;
use App\Mail\sendmail;
use Exception;
use App\Helpers\NumberSequenceHelpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CustomerprofileNotification;
use App\Http\Controllers\Controller;
use App\Helpers\ModelHelper;
use App\Amyservices\PasswordService;

class AuthService
{
    use ApiResponse,VendorApproveReject;
    protected $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function otpRequest($request)
    {
        try{
            $random = rand(100000, 999999);
            $dummyUser = $this->modelClass::create([
                    'organization_name' => $request->organization_name,
                    'name' => $request->name,
                    'email' => $request->email,
                    'otp' => $random,
                ]);
            if ($dummyUser) {
                return ['message'=>'success','data' => $dummyUser];
            } else {
                  return $this->errorResponse(['error' => __('common.otp-request-failed')], 500);
            }
        }
        catch (Exception $e) {
            return $this->errorResponse(['error' => 'Exception: ' . $e->getMessage()], 500);
        }

    }

    public function store(Request $request)
    {
        try{
            $random = rand(100000, 999999);
            $dummyUser = $this->modelClass::create([
                    'organization_name' => $request->organization_name,
                    'name' => $request->name,
                    'last_name' => $request->last_name ? $request->last_name : null,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'address' => $request->address,
                    'otp' => $random,
                    'cr_number'=>$request->cr_number,
                    'type'=>'intrest'
                ]);
            if ($dummyUser) {
                return $dummyUser;
            } else {
                  return $this->errorResponse(['error' => __('common.customer-register-failed')], 500);
            }
        }
        catch (Exception $e) {
            return $this->errorResponse(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }

    public function initialRegistarion($userData ,$request)
    {
        DB::beginTransaction();

        try {
            $def_company_id = Controller::helper('ModelHelper')::default_company_id();
            $max_id = Controller::helper('NumberSequenceHelpers')::apply_no_sequence('Supplier Request',$def_company_id);

            {
                if($max_id == 0 || $max_id == 1)
                {
                    return ["data"=>null, 'message'=>'common.something-went-wrong-administrator'];
                }
            }


            $type = Controller::model('Setup')::where('type','Allow Supplier Request Workflow')->first()->type_value;
            if ($type == "Yes") {

                $status = "In Review";
            }
            else{
                $status = "Approved";
            }
            $registerdUser = $this->modelClass::create([
                'code' => $max_id,
                'organization_name' => $userData->organization_name,
                'name' => $userData->name,
                'last_name' => $userData->last_name,
                'email' => $userData->email,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
                'cr_number' => $request->cr_number,
                'status' => $status
            ]);
            if($registerdUser)
            {
                $assignCompany= $this->userCompany($registerdUser->id,$request->company_id);

                $company_id = Controller::model('UserCompany')::where('supplier_request_id',$registerdUser->id)->pluck('company_id')->toArray();

                if ($status == "Approved") {
                    $pass = new PasswordService();
                    $generatedPassword = $pass->generateRandomString();
                    $userRegister = Controller::helper('ModelHelper')::create_user($registerdUser?->name,$registerdUser?->email,null,null,$generatedPassword,'Supplier');
                    if ($userRegister) {
                        $company = Controller::helper('EmailHelper')::company_name($company_id);
                        $email_teplate_id = Controller::helper('EmailHelper')::email_template_id('Supplier Request Approval');
                        $mail = Controller::helper('EmailHelper')::email_variables_suplierapprove($email_teplate_id,[$company,$registerdUser?->code,$registerdUser?->email,$generatedPassword,$registerdUser?->name]);
                        Controller::helper('EmailHelper')::mail_send($registerdUser?->email,$mail[0],$mail[1]);
                        Controller::helper('NumberSequenceHelpers')::update_no_sequence('Supplier Request',$def_company_id);
                        DB::commit();
                        return ['data'=>$userRegister,"message"=> 'success',];
                    } else {
                        DB::rollBack();
                        return ['data'=>null,'message'=>'common.customer-register-failed'];
                    }
                } else if ($status == "In Review") {
                    Controller::helper('NumberSequenceHelpers')::update_no_sequence('Supplier Request',$def_company_id);
                    $return_value = Controller::helper('ApplyWorkflowHelper')::get_workflow_apply_on('Supplier Registration Request',$registerdUser?->id,$registerdUser?->code,$def_company_id);
                    if($return_value == "Success"){
                        DB::commit();
                        return ["message"=> 'success','data'=>$registerdUser];
                    }
                    else{
                        DB::rollBack();
                        return ["message"=>$return_value,'data'=>null];
                    }


                }
            }
            else {
                DB::rollBack();
                return ["message"=>'common.customer-register-failed','data'=>null];
            }
        } catch (Exception $e) {
            DB::rollBack();
            return ["message"=>'common.customer-register-failed','data'=>null];

        }
    }

    public function assignCompany($s_o_r_id,$s_r_id){
        Controller::model('UserCompany')::where('supplier_otp_request_id',$s_o_r_id)->update([
            'supplier_request_id'=> $s_r_id
        ]);

    }

    public function userCompany($s_r_id, $company)
    {
        try {
            $dataToInsert = [];
            foreach ($company as $data) {
                $dataToInsert[] = [
                    'supplier_request_id' => $s_r_id,
                    'company_id' => $data,

                ];
            }
            Controller::model('UserCompany')::insert($dataToInsert);
            return true;
        } catch (\Exception $e) {
            return $this->errorResponse(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }



}
