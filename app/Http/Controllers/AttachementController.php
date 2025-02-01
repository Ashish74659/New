<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttachementController extends Controller
{
    public function attachementUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attachment_file.*' => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx,xlsx,xls',
            'source_id' => 'required',
            'source' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            if ($request->hasFile('attachment_file')) {
                $files = $request->file('attachment_file');
                $file_type = 'image_document';
                if(intVal($request->source_id) == 0)
                {
                    $source_id = convert_uudecode(base64_decode($request->source_id));
                }
                else{
                    $source_id = $request->source_id;
                }

                foreach ($files as $file) {
                    $image_path = self::helper('ModelHelper')::folder_name($source_id,$request->source,'Internal Document',$file,10,'image_document');
                    if(empty($image_path))
                    {
                        return response()->json(['error' => false, 'message' => __('common.folder-name-not-generating')], 400);
                    }
                    $imgs = new Attachement();
                    $imgs->source_id = $source_id;
                    $imgs->source = $request->source;
                    $imgs->attachment_name = $image_path[1];
                    $imgs->attachment_type = $file->getClientOriginalExtension();
                    $imgs->description = $request->description;
                    $imgs->created_by = Auth::user()->id;
                    $imgs->status = "Draft";
                    $imgs->save();
                }
                $message = ' has uploaded documents';
                addToLog($request->source,$source_id,$message);
                return response()->json(['success' => true, 'message' => __('common.file-uploaded-successfully')]);
            } else {
                return response()->json(['error' => false, 'message' => __('common.file-not-found')], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' =>  $e->getMessage()], 500);
        }
    }

    public function attachementList(Request $request)
    {
        try{
            if(intVal($request->source_id) == 0)
            {
                $source_id = convert_uudecode(base64_decode($request->source_id));
            }
            else{
                $source_id = $request->source_id;
            }
            $data = Attachement::where('created_by',Auth::user()->id)
            ->where('source_id',$source_id)
            ->where('source',$request->source)
            ->orderby('id','desc')
            ->get();
            return response()->json(['data' => $data, 'message' => 'File List']);

        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function attachementSubmitList(Request $request)
    {
        try{
            if(intVal($request->source_id) == 0)
            {
                $source_id = convert_uudecode(base64_decode($request->source_id));
            }
            else{
                $source_id = $request->source_id;
            }

            $data = Attachement::where('created_by',Auth::user()->id)
            ->where('source_id',$source_id)
            ->where('source',$request->source)
            ->where('status','Submitted')
            ->orderby('id','desc')
            ->get();
            return response()->json(['data' => $data, 'message' => 'File List']);

        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function attachementDelete(Request $request)
    {
        try{
            if(intVal($request->document_id) == 0)
            {
                $document_id = convert_uudecode(base64_decode($request->document_id));
            }
            else{
                $document_id = $request->document_id;
            }
            $data =  Attachement::where('id',$document_id)->first();
            Attachement::where('id',$request->document_id)->where('status','Draft')->delete();
            $message = ' has deleted documents-'.$data->id;
            addToLog($data->source,$data->source_id,$message);
            return response()->json(['data' =>$request->document_id , 'message' =>__('common.file-deleted-successfully')]);

        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => __('common.file-delete-failed') . $e->getMessage()], 500);
        }
    }

    public function attachementSubmit(Request $request)
    {
        try{
            if(intVal($request->document_id) == 0)
            {
                $document_id = convert_uudecode(base64_decode($request->document_id));
            }
            else{
                $document_id = $request->document_id;
            }
            Attachement::where('id',$document_id)->where('status','Draft')->update(
                [
                    "status"=>"Submitted"
                ]
            );
            $data =  Attachement::where('id',$document_id)->first();
            $message = ' has submitted documents-'.$data->id;
            addToLog($data->source,$data->source_id,$message);
            return response()->json(['data' =>$document_id , 'message' =>__('common.file-submitted-successfully')]);

        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => __('common.file-submitted-failed') . $e->getMessage()], 500);
        }
    }

}
