<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator; 
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\IOFactory;
trait ImportExportTrait
{        
    public function get_id_by($model,$column,$value)
    { 
        return self::model($model)::where($column,$value)->pluck('id')->first(); 
    }
    
    public function download_template(Request $request)
    { 
        $type = convert_uudecode(base64_decode($request->type));
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename="'.$type.'.csv"'];
        switch ($type) {
            case 'item_header':
                $columns = ['Code', 'Name', 'SKU', 'Barcode', 'Weight With Scale', 'Is POS', 'Unit Of Measurement', 'Category ID', 'Sub Category ID', 'Modifier ID', 'Status'];
                break;

            case 'company_item':
                $columns = ['Item Id', 'Warehouse Id', 'selling Price', 'Product Quantity', 'Discount Id', 'Alert Quantity', 'Tax ID', 'Tax Type', 'Not For Selling'];
                break;

            default:
                $columns = [];
                break;
        }
        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); 
            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }    

    public function upload_item_master(Request $request)
    {            
        $message = [];
        self::db()::beginTransaction();
        try {
            $cmp_and_user = self::loginandcompany();
            $validator = Validator::make($request->all(), [
                'file_type' => 'required',
                'uploaded_file' => 'required', 
            ]);
            if($validator->fails()){ 
                return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
            }

            if($request->uploaded_file){
                $filePath = $request->file('uploaded_file')->getRealPath();
                $spreadsheet = IOFactory::load($filePath); 
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray(null, true, true, true);
 

                    if($request->file_type == "item_header"){  
                        foreach ($rows as $key => $row) {
                            if ($key === 1) continue;
                            if (trim($row['A']) && trim($row['B']) && trim($row['C']) && trim($row['D']) && trim($row['E']) && trim($row['F']) && trim($row['G']) && trim($row['H']) && trim($row['I']) && trim($row['K'])) {                                                                 
                                if(!in_array($row['E'],['Yes','No'])){                                
                                    $message[]= 'Wrong value in E'.$key;
                                }
                                if(!in_array($row['F'],['Yes','No'])){                                
                                    $message[]= 'Wrong value in F'.$key;
                                }
                                if(!in_array($row['K'],['Active', 'Inactive'])){                                
                                    $message[]= 'Wrong value in K'.$key;
                                }

                                $uom = self::get_id_by('UOM','name',$row['G']);
                                if(!$uom){
                                    $message[]= 'Wrong value in G'.$key;
                                }

                                $cat = self::get_id_by('Category','code',$row['H']);                            
                                if(!$cat){
                                    $message[]= 'Wrong value in H'.$key;
                                }

                                $subcat = self::get_id_by('SubCategory','code',$row['I']);                            
                                if(!$subcat){
                                    $message[]= 'Wrong value in I'.$key;
                                }
                                else{
                                    $sub = self::model('Subcategory')::where('category_id',$cat)->where('id',$subcat)->first();
                                    if(!$sub){
                                        $message[]= $row['I'].' is not child of '.$row['H'].'. Wrong value in I'.$key;;
                                    }
                                }

                                $modifier = null;
                                if(trim($row['J'])){
                                    $modifier = self::get_id_by('ModifierHeader','code',$row['J']);                                                            
                                    if(!$modifier){
                                        $message[]= 'Wrong value in J'.$key;
                                    }
                                }

                                
                                if($uom && $cat && $subcat){

                                    $found_data = self::helper('ModelHelper')::existance_by_or('Item',['code','name','sku','barcode'],[$row['A'],$row['B'],$row['C'],$row['D']]);
                                    if($found_data){ 
                                        $message[]= 'Item of row .'.$key.' already exists';
                                    }

                                    $model = self::model('Item');
                                    $data = new $model();
                                    $data->code = $row['A'];
                                    $data->name = $row['B'];
                                    $data->sku = $row['C'];
                                    $data->barcode = $row['D'];
                                    $data->weight_with_scale = $row['E'];
                                    $data->is_pos = $row['F'];
                                    $data->uom_id = $uom;
                                    $data->category_id  = $cat;
                                    $data->subcategory_id  = $subcat; 
                                    $data->modifier_header_id = $modifier;
                                    $data->status = $row['K'];

                                    $data->created_by = $cmp_and_user[0]; 
                                    $data->updated_by = $cmp_and_user[0];
                                    $data->company_id = $cmp_and_user[1];
                                    $data->save(); 
                                }
                                else{
                                    $message[]= 'UOM , Category , Subcategory may be not correctly defined';
                                }
                            }  
                            else{
                                $message[]= 'Some values are missing in row '.$key;
                            }                       
                        } 
                    }

                    else if($request->file_type == "company_item"){   
                        foreach ($rows as $key => $row) {
                            if ($key === 1) continue; 
                            if (trim($row['A']) && trim($row['B']) && trim($row['C']) && trim($row['D']) && trim($row['F']) && trim($row['I'])) {                                
                                if(!in_array($row['H'],['Exclusive','Inclusive',''])){                                
                                    $message[]= 'Wrong value in H'.$key;
                                }
                                if(!in_array($row['I'],['Yes','No'])){                                
                                    $message[]= 'Wrong value in I'.$key;
                                }
                              
                                $item_id = self::get_id_by('Item','code',$row['A']);
                                if(!$item_id){
                                    $message[]= 'Wrong value in A'.$key;
                                }
                                
                                $comy_id = null;
                                $warehouse_id = self::get_id_by('Warehouse','code',$row['B']);                            
                                if(!$warehouse_id){                                    
                                    $message[]= 'Wrong value in B'.$key;
                                }                                
                                else{
                                    $comy_id = self::model('Warehouse')::where('id',$warehouse_id)->pluck('cmp_id')->first();
                                    if(!$comy_id){
                                        $message[]= 'Wrong value in B'.$key. 'Company not mapped with this Warehouse';
                                    }
                                }
                              
                                if(!is_numeric($row['C'])){
                                    $message[]= 'Wrong value in C'.$key;
                                }
                                if(!is_numeric($row['D'])){
                                    $message[]= 'Wrong value in D'.$key;
                                }  
                                if(!is_numeric($row['F'])){
                                    $message[]= 'Wrong value in F'.$key;
                                }  

                                $discount = null;
                                if(trim($row['E'])){
                                    $discount = self::model('Discount')::where('name',$row['E'])->pluck('name')->first();
                                    if(!$discount){
                                        $message[]= 'Wrong value in E'.$key;
                                    }
                                }
       
                                $tax = null;
                                if(trim($row['G'])){
                                    $tax = self::model('Tax')::where('name',$row['G'])->pluck('name')->first();
                                    if(!$tax){
                                        $message[]= 'Wrong value in G'.$key;
                                    }
                                }
                         
                                if($item_id && $warehouse_id){
                                    if($tax && !$row['H']){
                                        $message[]= 'H'.$key. ' must have value because there is tax defined';
                                    }        
                                    else{
                                        $new_found_data = self::helper('ModelHelper')::existance_by_and('CompanyItem',['item_id','warehouse_id'],[$item_id,$warehouse_id]);
                                        if($new_found_data){
                                            $message[]= 'Company item of row .'.$key.' already exists';
                                        }  
                                        $model = self::model('CompanyItem');
                                        $item_warehouse = new $model();                                                                         
                                        $item_warehouse->item_id = $item_id;
                                        $item_warehouse->warehouse_id = $warehouse_id;
                                        $item_warehouse->comy_id = $comy_id;
                                        $item_warehouse->selling_price = $row['C'];
                                        $item_warehouse->product_quantity = $row['D'];
                                        $item_warehouse->remaining_quantity = $row['D'];
                                        $item_warehouse->alert_quantity = $row['F'];
                                        if($tax){
                                            $item_warehouse->selling_price_tax_type = $row['H'];                                
                                        }
                                        else{
                                            $item_warehouse->selling_price_tax_type = null;
                                        }
                                        $item_warehouse->discount_per = $discount;
                                        $item_warehouse->tax_per = $tax;
                                        $item_warehouse->company_id = $cmp_and_user[1];
                                        $item_warehouse->created_by = $cmp_and_user[0];  
                                        $item_warehouse->not_for_selling = $row['I'];
                                        $item_warehouse->save();
                                    }
                                }
                                else{
                                    $message[]= 'Item , Warehouse may be not correctly defined';
                                }
                            } 
                            else{
                                $message[]= 'Some values are missing in row '.$key;
                            }                           
                        } 
                    }

                     














 
                if(count($message)>0){
                    self::db()::rollback(); 
                    return redirect()->back()->with(['error' => implode(',', $message)]);
                }
                else{
                    self::db()::commit(); 
                    return redirect()->back()->with(['success' => "Data Imported"]);
                }
            }
        }  catch(\Exception $e){
            self::db()::rollback(); 
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
    
}

 



 