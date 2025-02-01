<?php
namespace App\Amyservices;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DataTables;

class CommentService
{
    public function list($request)
    {
        try{
            $user = Auth::user();
            $data = Controller::model('Comments')::select('comments.*','users.name as user_name',
            'users.profile_img')
            ->with('CommentImage')
            ->join('users','users.id','comments.created_by')
            ->where('comments.source',$request->source)
            ->where('comments.source_id',$request->source_id)
            ->orderby('comments.id','Desc')
            ->get();
            return ['data'=>$data,'message'=>'common.list'];
        }
        catch (Exception $e) {
            return ['data' =>null, 'message' => $e->getMessage()];
        }
        
    }
    public function store($request){
        try {
            $mod_comment = Controller::model('Comments');
            $comment = new $mod_comment();
            $comment->source= $request->source;
            $comment->source_id = $request->source_id;
            $comment->comment = $request->comment;
            $comment->created_by = Auth::user()->id;
            $comment->save();
            $comment_id = $comment->id;
            
            if ($request->hasFile('attachment_file')) {
                $files = $request->file('attachment_file');
                $file_type = 'image_document';
                $folder = "Comment Doc-" . $request->source;

                foreach ($files as $file) {
                    $image_path = Controller::file_extension($file, $file_type, $folder, 10);
                    $mod = Controller::model('CommentImage');
                    $imgs = new $mod();
                    $imgs->comment_id = $comment_id;
                    $imgs->attachment_name = $folder . '/' . $image_path;
                    $imgs->attachment_type = $file->getClientOriginalExtension(); 
                    $imgs->created_by = Auth::user()->id;
                    $imgs->save();
                }
            }

            $message = ' has added comments';
            addToLog($request->source,$request->source_id,$message);
            return ['data' => $request->source_id, 'message' => __('common.comment-added-successfully')];

        } catch (\Exception $e) {
            return ['data' => null, 'message' => $e->getMessage()];
        }
    }
}
