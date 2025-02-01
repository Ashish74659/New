<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use ZipArchive;


class DocumentuploadController extends Controller
{



    public function document_view_page(Request $request)
    {        
        $mod = convert_uudecode(base64_decode($request->m));
        $cmp_and_user = self::loginandcompany();
        $data = self::model($mod)::where('company_id',$cmp_and_user[1])->get(); 
        $col = 'image';
        if($mod == "User") {            
            $col = 'profile_img';                                
        }
        return view('admin.consolidate_image.add',compact('data','mod','col')); 
    }

    public function document_upload_image(Request $request)
    { 
        self::db()::beginTransaction();
        try{ 
            $mod = $request->model;
            $cmp_and_user = self::loginandcompany();    
            $col = 'image';
            if($mod == "User") {            
                $col = 'profile_img';                                
            }        
            foreach($request->image as $key => $img){                
                $data = self::model($mod)::find($request->id[$key]);
                $imagedd = self::helper('ModelHelper')::folder_name($data->id,$mod,$mod,$img,1,'image');
                $data->$col = $imagedd[1];
                $data->save();
                                             
            }        
            self::db()::commit(); 
            return redirect()->back()->with(['success' => 'Image uploaded']);
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }       
    }
    


    // public function addDocument(Request $request)
    // {
    //     $id = convert_uudecode(base64_decode($request->id));
    //     $data = NULL;
    //     $folder_name = NULL;
    //     switch($request->model_name) {
    //         case('IdentifiedNeed'):
    //             $data = self::model('IdentifiedNeed')::find($id);
    //             $folder_name = 'Need';
    //             break;
    //         case('RFIDevelopment'):
    //             $data = self::model('RFIDevelopment')::find($id);
    //             $folder_name = 'RFIDevelopment';
    //             break;
    //         case('RFIPublish'):
    //             $data = self::model('RFIPublish')::find($id);
    //             $folder_name = 'RFIPublish';
    //             break;
    //     }
    //     if($data)
    //     {
    //         DB::beginTransaction();

    //         try {
    //             $destinationPath ='';
    //             $file = NULL;
    //             $file = $request->file;
    //             $size = $request->file->getSize();
    //             if ($request->hasFile('file')) {
    //                 $uploadedfile = $request->file('file');
    //                 $fileName = time() . '.' . $file->getClientOriginalExtension();
    //                 $destinationPath = public_path($folder_name);
    //                 $uploadedfile->move($destinationPath, $fileName);
    //                 $file =  $fileName;
    //             }
    //             $files = new Images();
    //             $files->url = $folder_name;
    //             $files->description = $request->description;
    //             $files->imagable_id = $id;
    //             $files->name = $file;
    //             $data->images()->save($files);
    //             DB::commit();

    //             return json_encode(array(
    //                 "statusCode" => 200
    //             ));
    //         } catch (\Exception $e) {
    //             return json_encode(array(
    //                 "statusCode"=>201,
    //             ));
    //         }
    //     }else{
    //         return json_encode(array(
    //             "statusCode"=>201,
    //         ));
    //     }

    // }

    // public function getDocument(Request $request)
    // {
    //     $id = convert_uudecode(base64_decode($request->documents));
    //     switch($request->model_name) {
    //         case('IdentifiedNeed'):
    //             $folder_name = 'Need';
    //             break;
    //         case('RFIDevelopment'):
    //             $folder_name = 'RFIDevelopment';
    //             break;
    //         case('RFIPublish'):
    //             $folder_name = 'RFIPublish';
    //             break;
    //     }
    //     try{
    //         $data =Images::where('imagable_id',$id)->where('url',$folder_name)->get();
    //         return response()->json($data);
    //     }catch(\Exception $e)
    //     {
    //         return false;
    //     }
    // }

    // public function viewleavedocument($id){
    //   $file =Images::find(base64_decode($id));
    //     return response()->download(public_path('leaverequestDocument/'.$file->name));
    // }

    // public function deleteDocument(Request $request){
    //     $data =Images::find($request->id);
    //     $filename = public_path($data?->url.'/'.$data?->name);
    //     try {
    //         File::delete($filename);
    //             $data->delete();
    //             self::alertdelete();
    //             DB::commit();
    //             return json_encode(array("statusCode"=>200 ));
    //     }catch (\Exception $e) {
    //         DB::rollback();
    //         return json_encode(array("statusCode"=>201 ));
    //     }
    // }

    // public function getBidDocument(Request $request)
    // {
    //     $documents = [];
    //     $doc_id = convert_uudecode(base64_decode($request->doc_id));
    //     $bid_doc = [];
    //     switch($request->model) {
    //         case('RFIDistribution'):
    //             $documents = self::model('Vt_Docouments')::where('documentsable_id',$doc_id)->where('attechmentType',$request?->doc_type)->get();
    //             break;
    //         case('TenderSend'):
    //             $documents = self::model('Vt_Docouments')::where('documentsable_id',$doc_id)->where('attechmentType',$request?->doc_type)->get();
    //             break;
    //     }
    //     $ids = $documents->pluck('bidbond_id')->toArray();
    //     switch($request->model) {
    //         case('RFIDistribution'):
    //             $rfibidDocs = self::model('RFIBidderDocument')::whereIn('id',$ids)->get();
    //             foreach($rfibidDocs as $doc)
    //             {
    //                 $bid_doc[] = self::model('BidderRequiredDocument')::select('name')->where('id',$doc?->bidder_doc_id)->first();
    //             }
    //             break;
    //         case('TenderSend'):
    //             foreach($documents as $docs)
    //             {
    //                 $bid_doc[] = self::model('TenderDocument')::where('doc_type','BidderRequiredDocument')->where('id',$docs?->bidbond_id)->first();
    //             }
    //             break;
    //     }
    //     $data = [$bid_doc,$documents];
    //     return $data;

    // }
 
    //  public function file_extension_tender_vendor($uploadedImage,$folder)
    // {
    //     $extension = $uploadedImage->getClientOriginalExtension();
    //     $imageName = time().rand(100,999). '.' . $extension;
    //     $allowedExtensions = ['jpeg','png','jpg','pdf','doc','docx','xlsx','xls'];
    //     if(in_array($extension, $allowedExtensions) && $uploadedImage->getSize()/1048576<= 10)
    //     {
    //         $destinationPath = public_path($folder.'/');
    //         $uploadedImage->move($destinationPath, $imageName);
    //         return  $imageName;
    //     }
    //     else
    //         return false;

    // }
    // public function document_upload(Request $request)
    // {
    //     try{
    //     $folder = "Default";
    //     $model = $request->model;
    //     $doc_id = convert_uudecode(base64_decode($request->doc_id));
    //     $bidder_id = null;
    //     $doc_type = $request->doc_type;
    //     $description = $request->description;
    //     $vendor_id = null;
    //     $tender_id = null;
    //     $vendor_profile_id = null;

    //     if($model && $doc_id && $doc_type){
    //     $cmp_and_user = self::loginandcompany();
    //     $data = self::helper('ModelHelper')::find($model,$doc_id);

    //         if($model == "TenderSend"){
    //             if($request->bidder_id)
    //                 $bidder_id = convert_uudecode(base64_decode($request->bidder_id));
    //             $vendor_id = $data->vendor_id;
    //             $tender_id = $data->tender_id;
    //             $folder = "TenderReply".base64_encode(convert_uuencode($data->vendor_id)).base64_encode(convert_uuencode($data->tender_id));
    //         }
    //         if($model == "RFIDistribution"){
    //             if($request->bidder_id)
    //                 $bidder_id = convert_uudecode(base64_decode($request->bidder_id));
               
    //             $folder = "RFIReply".base64_encode(convert_uuencode($data->vendor_id)).base64_encode(convert_uuencode($data->tender_id));
    //         }

    //         self::db()::beginTransaction();
    //         if ($request->hasFile('files')) {
    //             foreach($request->file('files') as $key => $file)
    //             {
    //                 $image = $this->file_extension_tender_vendor($file,$folder);
    //                 $type = $file->getClientOriginalExtension();
    //                 if(!$image){
    //                     self::db()::rollback();
    //                     return json_encode(array( "statusCode"=>201 ));
    //                 }
    //                 $img_model = self::model('Vt_Docouments');
    //                 $imgs = new $img_model();
    //                 $imgs->name = $image;
    //                 $imgs->vendor_profile_id = $vendor_profile_id;
    //                 $imgs->attechmentType = $doc_type;
    //                 $imgs->url = $folder;
    //                 $imgs->documentsable_type = self::model($model);
    //                 $imgs->documentsable_id = $doc_id;
    //                 $imgs->company_id = $cmp_and_user[1];
    //                 $imgs->created_by = $cmp_and_user[0];
    //                 $imgs->bidbond_id = $bidder_id;
    //                 $imgs->description = $description;
    //                 $imgs->save();
    //             }
    //         }
    //         self::db()::commit();

    //         return json_encode(array( "statusCode"=>200 ));
    //     }
    //     else{
    //         self::db()::rollback();
    //         return json_encode(array( "statusCode"=>201 ));
    //     }
    //     }
    //     catch(\Exception $e){
    //     self::db()::rollback();
    //   return json_encode(array( "statusCode"=>201 ));
    //     }
    // }

    // public function document_load(Request $request)
    // {
    //     $documents = [];
    //     try{
    //         $model = $request->model;
    //         $doc_id = convert_uudecode(base64_decode($request->doc_id));
    //         $doc_type = $request->doc_type;
    //         $bidder_id = null;
    //         $data = self::helper('ModelHelper')::find($model,$doc_id);


    //         if($model == "TenderSend"){
    //             if($request->bidder_id)
    //                 $bidder_id = convert_uudecode(base64_decode($request->bidder_id));

    //             $documents = self::model('Vt_Docouments')::where('documentsable_id',$data->id)->where('attechmentType',$doc_type)->where('bidbond_id',$bidder_id)->get();
    //         }
    //         if($model == "RFIDistribution"){
    //             if($request->bidder_id)
    //                 $bidder_id = convert_uudecode(base64_decode($request->bidder_id));

    //             $documents = self::model('Vt_Docouments')::where('documentsable_id',$data->id)->where('attechmentType',$doc_type)->where('bidbond_id',$bidder_id)->get();

    //         }
    //         return $documents;
    //     }
    //     catch(\Exception $e){
    //         return $documents;
    //     }
    // }

    // public function document_delete(Request $request)
    // {
    //     try{
    //         if($request->vt_id){
    //             $documents = self::model('Vt_Docouments')::find($request->vt_id);
    //             $filename = public_path($documents?->url.'/'.$documents?->name);
    //             File::delete($filename);
    //             $documents->delete();
    //             return json_encode(array( "statusCode"=>200));
    //         }
    //         return json_encode(array( "statusCode"=>201 ));
    //     }
    //     catch(\Exception $e){
    //         return json_encode(array( "statusCode"=>201 ));
    //     }
    // }

    // public function zip_download(Request $request)
    // {
    //     $id = convert_uudecode(base64_decode($request->id));
    //     $model = $request->model;
    //     $totaldoc = [];
    //     $tender_docs = self::model('TenderDocument')::where('doc_type','TenderRequiredDocument')->where('tender_id',$id)->get();

    //         if($tender_docs){
    //             foreach($tender_docs as $predoc){
    //                 if($predoc->tenderrequireddocument_id){
    //                     $doc = self::model('TenderRequiredDocument')::with('images')->find($predoc->tenderrequireddocument_id);
    //                 }
    //                 else{
    //                     $doc = self::model('TenderDocument')::with('images')->find($predoc->id);
    //                 }
    //                 if(count($doc->images)){
    //                     foreach($doc->images as $img){
    //                         $totaldoc[] = $img;
    //                     }
    //                 }
    //             }
    //         }

    //     $zip = new ZipArchive;
    //     $zipFile    = $model.time().rand(100,999).'.zip';
    //     if ($zip->open(public_path($zipFile), ZipArchive::CREATE) === TRUE)
    //     {
    //         if(count($totaldoc)>0){
    //             foreach ($totaldoc as $val)
    //             {
    //                 $value = public_path().'/'.$val->url.'/'.$val->name;
    //                 $relativeName = basename($value);
    //                  $exist = File::exists(public_path($val->url.'/'.$val->name));
    //                  if($exist){
    //                     $zip->addFile($value, $relativeName);
    //                  }
    //             }
    //             $zip->close();
    //             return response()->download($zipFile)->deleteFileAfterSend(true);
    //         }
    //         else
    //             return false;
    //     }
    //     else
    //         return false;
    // }
}

