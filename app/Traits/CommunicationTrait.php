<?php

namespace App\Traits;

use App\Helpers\NumberSequenceHelpers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


trait CommunicationTrait
{


    public function index(Request $request)
    {
        $id =convert_uudecode(base64_decode($request->id));
        if($request->type =='Tender'){
            $notices = self::model('NoticeCommunication')::where('tender_id',$id)->get();
        }elseif($request->type =='Auction'){
            $notices = self::model('NoticeCommunication')::where('auction_id',$id)->get();
        }elseif($request->type =='EOI'){
            $notices = self::model('NoticeCommunication')::where('eoi_id',$id)->get();
        }
        return view('noticecommunication.index',compact('notices','id'));
    }

    /*---------------publish the notice and communication-------*/
    public function publish(Request $request){
        $id =convert_uudecode(base64_decode($request->id));
        self::db()::beginTransaction();
        try{
            $notices = self::model('NoticeCommunication')::find($id);
            $notices->status =$request->status;
            $notices->save();
            self::db()::commit();
            if($request->status =='Cancel'){
                Alert::success('success','Record Cancel Successfully')->autoClose(5000);
            }else{
                 Alert::success('success','Record Published Successfully')->autoClose(5000);
            }
            return redirect()->route('notice.list', ['id' => base64_encode(convert_uuencode($notices?->tender_id)), 'type' => 'Tender']);
        }catch(\Exception $e){
            self::db()::rollback();
            self::alerterror();
            return redirect()->back();
        }
    }


    /*-------------get the data date according to date filed enum--------*/
    public function date_data(Request $request)
    {
       if($request->type =='Tender'){
        $data = self::model('Tender')::select($request->enumtype)->where('id', $request->id)->first();
            if ($data) {
                $value = $data->{$request->enumtype};
                return response()->json($value);
            } else {
                return false;
            }
       }elseif($request->type =='Auction'){

       }elseif($request->type =='EOI'){

       }
    }

    /*-------get the date after substract the days---------*/
    public function getdate(Request $request){
        if($request->type =='Tender'){
            $data = self::model('Tender')::select($request->enumtype)->where('id', $request->id)->first();
            $value = $data->{$request->enumtype};
            $date = Carbon::parse($value);
            $newDate = $date->subDays($request->days);
            return $newDate->format('Y-m-d');
        }elseif($request->type =='Auction'){

        }elseif($request->type =='EOI'){

        }
    }



    /*---------------  get employee or vendor emails---------*/
    public function getemoloyee_or_vendor(Request $request)
    {
        $id =$request->id;
        if($id){
            if($request->type =='Tender'){
                if($request->whoms =='Vendor'){
                    $tenderSends = self::model('TenderSend')::where('tender_id', $id)->distinct()
                    ->pluck('vendor_id');
                    $vendors =[];
                        foreach ($tenderSends as $tenderSend) {
                            $vendor = null;
                            if($vendor){
                            array_push( $vendors, $vendor);
                            }
                        }
                        if(!empty($vendors)) {
                            return response()->json(['data'=>$vendors,'status'=>'success']);
                        }else{
                            return response()->json(['message' => 'No record found', 'status' => 'error']);
                        }
                }else{
                    $tendermenbers = self::model('TenderMembers')::where('tender_id', $id)->distinct()->pluck('emp_id');
                    $employees =[];
                    foreach ($tendermenbers as $tenderMem) {
                        $employee = self::model('Company_employee')::find($tenderMem);
                        if ($employee) {
                            array_push($employees, $employee); // Push the found employee into the array
                        }
                    }
                    if (!empty($employees)) {
                        return response()->json(['data'=>$employees,'status'=>'success']);
                    }else{
                        return response()->json(['message' => 'No record found', 'status' => 'error']);
                    }
                }
            }elseif($request->type =='Auction'){

            }elseif($request->type =='EOI'){

            }
        }else{
            return false ;
        }
    }



    /*--------  get only those emloyee or vendor who has status Yes---*/

    public function getonlyYes_status(Request $request)
    {
        $id =$request->id;
        if($id){
            if($request->type =='Tender'){
                if($request->whoms =='Vendor'){
                    $tenderSends = self::model('TenderSend')::where('tender_id', $id)->where('sent_to','Yes')->distinct()
                    ->pluck('vendor_id');
                    $vendors =[];
                        foreach ($tenderSends as $tenderSend) {
                            $vendor = null;
                            if($vendor){
                            array_push( $vendors, $vendor);
                            }
                        }
                        if(!empty($vendors)) {
                            return response()->json(['data'=>$vendors,'status'=>'success']);
                        }else{
                            return response()->json(['message' => 'No record found', 'status' => 'error']);
                        }
                }else{
                    $tendermenbers = self::model('TenderMembers')::where('tender_id', $id)->where('sent_to','Yes')->distinct()->pluck('emp_id');
                    $employees =[];
                    foreach ($tendermenbers as $tenderMem) {
                        $employee = self::model('Company_employee')::find($tenderMem);
                        if ($employee) {
                            array_push($employees, $employee); // Push the found employee into the array
                        }
                    }
                    if (!empty($employees)) {
                        return response()->json(['data'=>$employees,'status'=>'success']);
                    }else{
                        return response()->json(['message' => 'No record found', 'status' => 'error']);
                    }
                }
            }elseif($request->type =='Auction'){

            }elseif($request->type =='EOI'){

            }
        }else{
            return false ;
        }

    }

    /*------------------ Created by Deependra--------*/
    public function addnotice(Request $request)
    {

        $id = convert_uudecode(base64_decode($request->id));
        $type =$request->type;
        if($id){
            if($request->type =='Tender'){
                $data = self::model('NoticeCommunication')::with('tender')->where('tender_id',$id)->first();
                $recdata =self::model('Tender')::find($id);

            }elseif($request->type =='Auction'){
                $data = self::model('NoticeCommunication')::with('auction')->where('auction_id',$id)->first();
                $recdata =self::model('Auction')::find($id);

            }elseif($request->type =='EOI'){
                $data = self::model('NoticeCommunication')::with('eoi')->where('eoi_id',$id)->first();
                $recdata =self::model('RFI')::find($id);

            }

            return view('noticecommunication.add',compact('data','type','recdata'));
        }else{
            self::alerterror();
            return redirect()->back();
        }

    }

    //  Edit communication
    public function edit(Request $request)
    {
        $id = null;
        $type =$request->type;
        if($request->id)
            $id = convert_uudecode(base64_decode($request->id));
        if($request->type =='Tender'){
                $tenderid = convert_uudecode(base64_decode($request->ten_id));
                $data = self::model('NoticeCommunication')::with('tender')->where('tender_id',$tenderid)->where('id',$id)->first();
                $recdata =self::model('Tender')::find($tenderid);
            }elseif($request->type =='Auction'){
                $data = self::model('NoticeCommunication')::with('auction')->where('auction_id',$id)->first();
                $recdata =self::model('Auction')::find($id);

            }elseif($request->type =='EOI'){
                $data = self::model('NoticeCommunication')::with('eoi')->where('eoi_id',$id)->first();
                $recdata =self::model('RFI')::find($id);
            }

        return view('noticecommunication.edit', compact('data','type','recdata'));
    }

    /*-----------Store the  alert----------*/
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'notice_id' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'schedule_date' => 'required',
            'sourcetype' => 'required',
        ]);
        if ($validator->fails()) {
            self::required();
            return redirect()->back();
        }

        $cmp_and_user = self::loginandcompany();
        self::db()::beginTransaction();
        try {
            $id = convert_uudecode(base64_decode($request->not_id));
            if ($id != null ) {
                $data = self::model('NoticeCommunication')::find($id);
            } else {
                $model = self::model('NoticeCommunication');
                $data = new $model();
                $data->created_by = $cmp_and_user[0];
            }
            if($request->sourcetype =='Tender'){
                $type = $request->sourcetype;
                $data->tender_id = $request->ten_id;
                $data->type_enum = $request->enumtype;
                $tenders = self::model('Tender')::find($request->ten_id);
                $tenders->alert = 'Yes';
                $tenders->save();

                if($request->whom =='Vendor')
                {
                    foreach($request->records as $index =>$rec_id){
                        $tendersend = self::model('TenderSend')::where('vendor_id',$rec_id)->where('tender_id',$request->ten_id)->first();
                        $tendersend->sent_to = 'Yes';
                        $tendersend->save();
                    }
                }else{
                    //  employee case
                    foreach($request->records as $index =>$rec_id){
                        $tendermenbers = self::model('TenderMembers')::where('tender_id', $request->ten_id)->where('emp_id',$rec_id)->first();
                        $tendermenbers->sent_to ='Yes';
                        $tendermenbers->save();
                    }

                }


            }elseif($request->sourcetype =='Auction'){
                $type = $request->sourcetype;
                $data->auction_id = $request->auc_id;
            }elseif($request->sourcetype =='EOI'){
                $type = $request->sourcetype;
                $data->eoi_id = $request->eoi_id;
            }
            $data->date = $request->schedule_date;
            $data->code = NumberSequenceHelpers::generateNumberSequence('NoticeCommunication','code','Code', 4);
            $data->type = $type;
            $data->alert_on = $request->alertdue;
            $data->days = $request->days;
            $data->subject_body = $request->subject;
            $data->mail_body = $request->content;
            $data->whom = $request->whom;

            $data->updated_by = $cmp_and_user[0];
            $data->company_id = $cmp_and_user[1];
            $data->status = "Draft";
            $data->save();
            self::db()::commit();
 
                self::alertSuccess();
                if($request->sourcetype =='Tender'){
                    return redirect()->route('notice.list', ['id' => base64_encode(convert_uuencode($data?->tender_id)), 'type' => 'Tender']);
                }elseif($request->sourcetype =='Auction'){
                    return redirect()->route('notice.list', ['id' => base64_encode(convert_uuencode($data?->tender_id)), 'type' => 'Auction']);
                }elseif($request->sourcetype =='EOI'){
                    return redirect()->route('notice.list', ['id' => base64_encode(convert_uuencode($data?->tender_id)), 'type' => 'EOI']);
                }
                return redirect()->back();
        } catch (\Exception $e) {
            self::db()::rollback();
            self::alerterror();
            return redirect()->back();
        }
    }



    /*---------------update Notification status---------*/
    public function updatetenotification_status(Request $request)
    {
        $id =$request->id;
        if($request->type =='Tender'){
            if($request->whoms =='Vendor'){
                $tenderSends = self::model('TenderSend')::where('tender_id', $id)->where('vendor_id',$request->emporvendorid)->first();
                $tenderSends->sent_to ="No";
                $tenderSends->save();
            }else{
                //  For employee
                $tendermenbers = self::model('TenderMembers')::where('tender_id', $id)->where('emp_id',$request->emporvendorid)->first();
                $tendermenbers->sent_to ='No';
                $tendermenbers->save();
            }
        }elseif($request->type =='Auction'){

        }elseif($request->type =='EOI'){

        }

    }


    /*---------View Logs------------------*/
    public function viewLogs(Request $request){
        $id =$request->noticeId;
        $data = self::model('AlertLogModel')::where('communication_id',$id)->get()->toArray();
        if (empty($data)) {
            return response()->json(['message' => 'No record found','status'=>'404']);
        }
        return response()->json(['data'=>$data],200);
    }




    public function viewNotice(Request $request){        
        return view('noticecommunication.view');
    }

    protected function backtolist()
    {
        return route('notice-list');
    }
}
