<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
trait EmailTrait
{
    public function index(Request $request)
    {
        $data = self::model('EmailTemplate')::get();
        return view('masters.email.index',compact('data'));
    }

    public function add(Request $request)
    {
        $id = null;
        $emailmaster = [];
        if($request->id)
            $id = convert_uudecode(base64_decode($request->id));
        $email_template = self::helper('ModelHelper')::find('EmailTemplate',$id);
        $allemailmaster = self::helper('ModelHelper')::getactive('EmailMaster','Active');
        foreach($allemailmaster as $emails){
            $exist = self::model('EmailTemplate')::where('email_master_id',$emails->id)->first();
            if(!$exist){
                $emailmaster[] = $emails;
            }
        }
        if($email_template){
            $emailmaster = [];
            $emailmaster[] = self::helper('ModelHelper')::find('EmailMaster',$email_template->email_master_id);
        }
        return view('masters.email.add',compact('emailmaster','email_template'));
    }


    public function get_email_master(Request $request)
    {
        if($request->email_master_id){
            $email = self::helper('ModelHelper')::find('EmailMaster',$request->email_master_id);
            return json_encode(array("statusCode"=>200, "variables"=>$email->description));
        }
        else{
            return json_encode(array( "statusCode"=>201));
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_master_id' => 'required',
            'veriable' => 'required',
            'subject' => 'required',
            'content'=> 'required',
            'name'=> 'required',
        ]);
        if($validator->fails()){ 
            return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
        try{
            if($request->email_template_id){
                $id = convert_uudecode(base64_decode($request->email_template_id));
                $data = self::model('EmailTemplate')::find($id);
            }
            else{
                $model = self::model('EmailTemplate');
                $data = new $model();
                $data->code = self::helper('MasterHelper')::generate_code('EmailTemplate');
                $data->created_by = $cmp_and_user[0];
            }
            $email = self::helper('ModelHelper')::find('EmailMaster',$request->email_master_id);

            $data->name = $request->name;
            $data->email_master_id = $request->email_master_id;
            $data->veriable = $email->description;
            $data->subject = $request->subject;
            $data->content = $request->content;
            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = "Active";
            $data->save();


            self::db()::commit();
            if($request->email_template_id){
                return redirect($this->backtolist())->with(['success' => __('Record is updated successfully !')]);
            }
            else{
                return redirect($this->backtolist())->with(['success' => __('Record is created successfully !')]);
            }

        }
        catch(\Exception $e){
            self::db()::rollback();
            return redirect($this->backtolist())->with(['error' => $e->getMessage()]);
        }

    }

   public function get_all_email_template(Request $request)
    {
        $html = [];
        $data = self::helper('ModelHelper')::getactive('EmailTemplate','Active');
        foreach($data as $dt){
            if($request->email_temp_id == $dt?->id)
                $html[] = '<option value="'.$dt?->id.'" selected> '.$dt?->name.' / '.$dt?->email_master?->name.' </option>';
            else
                $html[] = '<option value="'.$dt?->id.'"> '.$dt?->name.' / '.$dt?->email_master?->name.' </option>';
        }
        return $html;
    }

     public function delete(Request $request)
    {
        if($request->id){
            return 200;
        }
        return 202;

    }

    protected function backtolist()
    {
        return route('email-template-list');
    }
    protected function backtoedit($id)
    {
        return route('email-template-add',['id'=>base64_encode(convert_uuencode($id))]);
    }


}
