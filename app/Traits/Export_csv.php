<?php

namespace App\Traits;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; 
 
trait Export_csv
{ 
   
    public function __construct()
    {        
       
    }   
     
    public function exportCsvCondition(Request $request)
    {         
        $status= $request->status;        
        $mod = 'Vendor_step_1';
        $model = 'App\Models\\' . $mod;
        $headers = [
            'Cache-Control'=>'must-revalidate, post-check=0, pre-check=0',   
            'Content-type'=> 'text/csv',   
            'Content-Disposition' => 'attachment; filename='.'Tender_'.$status . '.csv',
            'Expires'=> '0',  
            'Pragma'=> 'public'
        ];       
        
        if($status =='All')
        $list = $model::select('dynamics_vendor_id', 'contact_person', 'company_name', 'email', 'contact', 'status')->get()->toArray();             
       else     
            $list = $model::select('dynamics_vendor_id', 'contact_person', 'company_name', 'email', 'contact', 'status')->where('status',$status)->get()->toArray();             
       if(count($list)>0);
       else{
            Alert::error("No data found");
            return redirect()->back();
        }
       
        array_unshift($list, array_keys($list[0]));
        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };
        return response()->stream($callback, 200, $headers);
    }


}
