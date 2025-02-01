<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Validator;  

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Endroid\QrCode\ErrorCorrectionLevel; 
use Endroid\QrCode\Color\Color;

trait PosTrait
{
    
    public function emp_case_details() {         
        $user = self::user();        
        if($user){            
            $data = self::model('UserPayment')::where('user_id',$user?->id)->where('status','Ongoing')->first();            
            return [$data?->initial_cash,$data];
        }
        else{
            return [null,null];             
        }
    } 

    public function openreg(Request $request)
    {
        $cash = self::emp_case_details();
        // if(!$cash[1]){
        //     return redirect(route('dashboard'))->with(['error' => 'Not authorized']);
        // }
        if($cash[0] > 0){
            return redirect($this->pos_order());            
        }
        return view('pos.open_registration');        
    }

    public function closereg(Request $request)
    {        
        self::db()::beginTransaction();
        // try{  
            $cash = self::emp_case_details();
            if($cash[0] > 0){            
                $cash[1]->final_cash = $request->final_cash;
                $cash[1]->final_note = $request->final_note;
                $cash[1]->status = "Completed";
                $cash[1]->save();              
                self::db()::commit();       
                return redirect(route('emp-pos-order'))->with(['success' => 'Register Closed']);
            } 
            else{
                return redirect()->back()->with(['error' => 'You are not registered']);
            }
        // }
        // catch(\Exception $e){
        //     self::db()::rollback(); 
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }
        return view('pos.open_registration');        
    } 
       
    public function pos_start(Request $request)
    {   
        self::db()::beginTransaction();
        try{ 
            $cmp_and_user = self::loginandcompany();     
            $cash = self::emp_case_details();
            $user = self::user();
            if($cash[0] <= 0){
                $model = self::model('UserPayment');
                $emp_payment = new $model();
                $emp_payment->user_id = $cmp_and_user[0];
                $emp_payment->initial_cash = $request->initial_cash;
                $emp_payment->initial_note = $request->initial_note;
                $emp_payment->company_id = $cmp_and_user[1];
                $emp_payment->created_by = $cmp_and_user[0];
                $emp_payment->status = 'Ongoing';
                $emp_payment->start_at = date('Y-m-d H:i:s');
                $emp_payment->save();
                
                
                $user->initial_cash = $request->initial_cash;
                $user->save();

                self::db()::commit();
            }
            return redirect($this->pos_order());
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
 
    public function pos_register_details(Request $request)
    { 
        $currency = self::helper('ModelHelper')::currency_of_user()[0];        
        return [$currency,self::emp_case_details()[1]];
    }
    
    protected function pos_order()
    {         
        return route('emp-pos-order');
    }
    
    public function emp_pos_order(Request $request)
    {         
        $order_id = $request->order_id;                
        $order = self::get_order_detail($order_id);
        $rat = payment_allow($request->order_id); 
        $data = $order[0];
        if($data && !$rat){ 
            return redirect()->route('dashboard')->with(['error' => 'Order can not be edited because order status id '.$data?->status]);
        }
        $data_line = $order[1];        
        $user = self::user();        
        if($user){
            $cash = self::emp_case_details();           
            if($cash[0] > 0){
                $category = self::helper('ModelHelper')::getactive('Category','Active'); 
                $country = self::helper('ModelHelper')::getactive('Countries','Active');        
                $customer = self::helper('ModelHelper')::getactive('Customer','Active');        
                $subcategories = [];
                if($category && count($category)>0){                    
                    foreach($category as $cat){                        
                        $subcategories[] = self::helper('ModelHelper')::children_by_parent('SubCategory','category_id',$cat?->id);        
                    } 
                } 
                $currency = self::helper('ModelHelper')::currency_of_user()[0];        
                return view('pos.pos_order',compact('data','data_line','category','subcategories','currency','country','customer')); 
            }
            else{
                return view('pos.open_registration');
            }
        }
        else{
            return redirect()->route('dashboard')->with(['error' => 'You dont have permission']);
        }
    }

    public function save_order_by_emp(Request $request)
    {         
        self::db()::beginTransaction();  
        try{  
            $cmp_and_user = self::loginandcompany();  
            if(!$request->customer_id){
                self::db()::rollback(); 
                return [201,"Please select customer first"];
            }
            if($request->product_id && count($request->product_id)>0 && $request->quantity && count($request->quantity)>0 && $request->status){
                if($request->order_id){
                    $id = convert_uudecode(base64_decode($request->order_id));
                    $data = self::model('OrderHeader')::find($id);
                }
                else{
                    $code = self::helper('NumberSequenceHelpers')::number_sequence_generate('order','OrderHeader');                    
                    if(!$code){
                        self::db()::rollback(); 
                        return [201,"Number sequence not defined"];
                    }
                    $model = self::model('OrderHeader');
                    $data = new $model();
                    $data->code = $code;
                    $data->created_by = $cmp_and_user[0];                           
                }
                $data->updated_by = $cmp_and_user[0];  
                $data->company_id = $cmp_and_user[1]; 
                $data->customer_id = $request->customer_id;
                $data->status = $request->status;
                $data->save();          

                $i=0;                
                $tax = 0;
                $discount = 0;
                $net_total = 0;
                $grand_total = 0;

                self::db()::table('order_line')->where('order_header_id',$data->id)->delete();
                foreach($request->product_id as $cmp_item_id){ 
                    $quantity = $request->quantity[$i];
                    $item = self::model('CompanyItem')::find($cmp_item_id);
                    if($item){
                        $model_line = self::model('OrderLine');
                        $data_line = new $model_line();
                        $data_line->order_header_id = $data->id;
                        $data_line->item_id = $item->item_id;
                        $data_line->company_item_id = $cmp_item_id;

                        if($item->selling_price_tax_type == "Exclusive"){
                            $tot_price = $quantity * (float)$item->selling_price;
                            $dis = ($tot_price*(float)$item->discount_per) / 100;
                            $total_after_dis = ($tot_price - $dis);
                            $tot_sales_tax = ($total_after_dis * (float)$item->tax_per) / 100;
                            $nettotal = $total_after_dis + $tot_sales_tax;
                            $net_amt = $tot_price;      
                        }
                        else if($item->selling_price_tax_type == "Inclusive"){                            
                            $unit_tax = (float)$item->selling_price*($item->tax_per/100);
                            $unit_price_without_tax = (float)$item->selling_price-$unit_tax; 
                            $unit_dis = $unit_price_without_tax*((float)$item->discount_per/100);
                            $unit_price_without_tax_discount = (float)$item->selling_price - $unit_tax - $unit_dis;

                            $tot_price = $quantity*(float)$item->selling_price;
                            $nettotal = $quantity*($unit_price_without_tax_discount + $unit_tax);
                            $tot_sales_tax = $quantity * $unit_tax;
                            $dis = $quantity * $unit_dis;
                            $net_amt = $tot_price;
                        }
                        else{
                            $tot_price = $quantity * (float)$item->selling_price;
                            $dis = ($tot_price*(float)$item->discount_per) / 100;
                            $nettotal = $tot_price - $dis;                
                            $tot_sales_tax = 0;
                            $net_amt = $nettotal;
                            $tot_price = $quantity * (float)$item->selling_price;
                            $dis = ($tot_price * (float)$item->discount_per) / 100;
                            $nettotal = $tot_price - $dis;                            
                        }
 
                        $data_line->price = $tot_price;
                        $data_line->quantity = $quantity;
                        $data_line->discount = $dis;
                        $data_line->tax = $tot_sales_tax;
                        $data_line->sub_total = $nettotal;
                        $data_line->tax_type = $item->selling_price_tax_type;
                        $data_line->created_by = $cmp_and_user[0];                           
                        $data_line->updated_by = $cmp_and_user[0];  
                        $data_line->company_id = $cmp_and_user[1]; 
                        $data_line->save();   
                        
                        $discount += $dis;
                        $tax += $tot_sales_tax;   
                        $net_total += $net_amt;
                        $grand_total += $nettotal;
                    }
                    else{
                        self::db()::rollback(); 
                        return [201,"Some items are missing"];
                    }
                    $i++;
                } 

                $data->sub_total = $net_total;
                $data->tax = $tax;
                $data->discount = $discount;
                $data->net_total = $net_total;
                $data->grand_total = $grand_total;
                $data->save();
                                          
                self::db()::commit();                
                if($request->status == "Hold"){
                    $url = route('emp-pos-order');
                }
                else if($request->status == "Void"){
                    $url = route('emp-pos-order');
                }
                else if($request->status == "Ongoing"){
                    $url = route('pos-payment-page',['order_id'=>base64_encode(convert_uuencode($data?->id))]);
                }

                return [200,base64_encode(convert_uuencode($data?->id)),$data?->code,$url,$data->code];
            }
            else{
                self::db()::rollback(); 
                return [201,"Please order atleast one item"];
            }
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }            
    }

    public function get_order_detail($order_id)
    {
        if(strlen($order_id) > 10){
            $order_id = convert_uudecode(base64_decode($order_id));    
        }     
        $data = self::model('OrderHeader')::find($order_id);
        $data_line = self::model('OrderLine')::with('item','company_item')->where('order_header_id',$order_id)->get();
        return [$data,$data_line];        
    }

    public function get_items_by_cat_subcat(Request $request)
    {          
        $cmp_id = self::user()?->company_id;                
        $all_items = [];
        if($request->parent_id == "search"){ //$request->parent_column              
            $items = [];          
            $items_ss = self::model('Item')::where('code', 'like', "%{$request->parent_column }%")->orWhere('name', 'like', "%{$request->parent_column}%")->orWhere('sku', 'like', "%{$request->parent_column}%")->get();            
            if(count($items_ss)>0){
                foreach($items_ss as $itm){
                    if($itm->is_pos == "Yes"){
                        $items[] = $itm;
                    }
                }
            }           
        }
        else if($request->parent_id == "all"){  
            $items = self::model('Item')::where('is_pos','Yes')->get();
        }
        else{
            $items = self::model('Item')::where($request->parent_column,$request->parent_id)->where('is_pos','Yes')->get();
        }
        
        if($items && count($items)>0){
            foreach($items as $itm){                
                $collect = self::model('CompanyItem')::with('item')->where('item_id',$itm->id)->where('remaining_quantity','>',0)->where('comy_id',$cmp_id)->where('not_for_selling','No')->first();                            
                if($collect){
                    $all_items[] =$collect;
                } 
            }
        }  
        
        return $all_items;
    }

    public function add_item_to_cart(Request $request)
    {                   
        $cmp_id = self::user()?->company_id;                         
        return self::model('CompanyItem')::with('item')->where('item_id',$request->item_id)->where('comy_id',$cmp_id)->first();                        
    }
    
    public function runningorder(Request $request)
    {
        $data = self::runningorder_data();   
        $currency = self::helper('ModelHelper')::currency_of_user()[0];                  
        return view('pos.running_order',compact('data','currency'));         
    }

    public function runningorder_data()
    {
        $cmp_id = self::user()?->company_id;   
        return self::model('OrderHeader')::with('company','customer','creator')->where('company_id',$cmp_id)->whereIn('status',['Hold','Ongoing'])->get();             
    } 

    public function historyorder_data(Request $request)
    {
        $cmp_id = self::user()?->company_id;
        return self::model('OrderHeader')::with('company','customer','creator')->where('company_id',$cmp_id)->whereIn('status',['Void','Payment Clear'])->get();             
    }     

    public function pos_payment_page(Request $request)
    {
        $tile = self::helper('ModelHelper')::tender_tile();        
        $data = self::get_order_detail($request->order_id); 
        $currency = self::helper('ModelHelper')::currency_of_user()[0];                
        if($tile && count($tile)>0){
            if($data[0] && $data[1] && count($data[1])>0){
                $order = $data[0];
                $rat = payment_allow($request->order_id);             
                if($rat){
                    $order_line = $data[1];
                    return view('pos.payment',compact('order','order_line','tile','currency'));
                }
                return redirect()->route('dashboard')->with(['error' => 'Payment can not be accepted on this order']);            
            }    
        }    
        else{
            return redirect()->route('dashboard')->with(['error' => 'Tender Tile Not Found']);    
        }
        return redirect()->route('dashboard')->with(['error' => 'Order Not Found']);
    }
        
    protected function view_invoice($id)
    {        
        return route('order-invoice-view',['order_id'=>base64_encode(convert_uuencode($id))]);
    }

    public function complete_payment(Request $request)
    { 
        self::db()::beginTransaction();
        try{              
            $validator = Validator::make($request->all(), [
                'order_id' => 'required',
                'net_total' => 'required',  
            ]);        
            if($validator->fails()){ 
                return redirect()->back()->with(['error' => $validator->messages()->toJson()]);
            }

            $cmp_and_user = self::loginandcompany();     
            $rat = payment_allow($request->order_id);
            if($rat){
                $order_id = convert_uudecode(base64_decode($request->order_id));                     
                $ord = self::get_order_detail($order_id);                    
                $data = $ord[0];

                $model = self::model('OrderTransaction');
                $payment = new $model();               
                $payment->code = rand(1000000000,9999999999);
                $payment->card_holder_name = null;
                $payment->card_number = null;
                $payment->expiry = null;
                $payment->cvv = null;
                $payment->payment_mode = 'Cash';
                $payment->order_header_id = $order_id;
                $payment->customer_id = $data?->customer_id;
                $payment->net_total = $request->net_total;
                $payment->status = 'Success';
                $payment->created_by = $cmp_and_user[0];
                $payment->company_id = $cmp_and_user[1];
                $payment->save();

                if($payment->status == "Success"){
                    $code = self::helper('NumberSequenceHelpers')::number_sequence_generate('invoice','OrderInvoice');                                        
                    if(!$code){
                        self::db()::rollback();                         
                        return redirect()->back()->with(['error' => "Number sequence not defined or not properly"]);
                    }

                    $model = self::model('OrderInvoice');
                    $invoice = new $model();

                    $invoice->code = $code;
                    $invoice->order_transaction_id = $payment->id;                    
                    $invoice->order_header_id = $order_id;
                    $invoice->customer_id = $data?->customer_id;
                    $invoice->net_total = $request->net_total;                    
                    $invoice->created_by = $cmp_and_user[0];
                    $invoice->company_id = $cmp_and_user[1];
                    $invoice->save();

                    $data->tranaction_id = $payment->id;
                    $data->invoice_id = $invoice->id;
                    $data->payment_date = now();
                    $data->status = "Payment Clear";
                    $data->save();

                    if($request->use_loyality){                        
                        $cust = self::model('Customer')::find($data?->customer_id);
                        $cust->loyality_point = $cust->loyality_point - $request->use_loyality;
                        $cust->save();
                    }

                    foreach($ord[1] as $ord_line){                        
                        $cmp_itm = self::model('CompanyItem')::find($ord_line->company_item_id);
                        $cmp_itm->remaining_quantity = $cmp_itm->remaining_quantity - $ord_line->quantity;
                        $cmp_itm->save();
                    }

                } 
                self::db()::commit();
                return redirect($this->view_invoice($data->id))->with(['success' => __('Payment Successfull')]);                
            }
            else{
                self::db()::rollback(); 
                return redirect()->route('dashboard')->with(['error' => 'Payment can not be accepted on this order']);
            }
        }
        catch(\Exception $e){
            self::db()::rollback(); 
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    } 

    public function order_invoice_view(Request $request)
    {     
        try{   
            if(strlen($request->order_id) > 10){
                $order_id = convert_uudecode(base64_decode($request->order_id));    
            }    
            else{
                $order_id = $request->order_id;
            } 
            $order_details = self::get_order_detail($order_id); 
            $order = $order_details[0];
            $order_line = $order_details[1];            
            if(!$order?->invoice_id){
                return redirect()->route('dashboard')->with(['error' => 'No invoice is generated against this order']);
            }
            
            $data = self::model('OrderInvoice')::find($order?->invoice_id);                     
            if($data && $order && $order_line && count($order_line)>0){            
                //qr1
                $website_url = url('');        
                $web = new QrCode($website_url);                
                $web->setSize(100);  // Set the size (in pixels)
                $web->setMargin(10); // Set the margin (default is 10)
                $web->setForegroundColor(new Color(0, 0, 0)); // Blue color for QR code foreground
                $web->setBackgroundColor(new Color(255, 255, 0)); // White color for background                  
        
                $writerweb = new PngWriter();

                $result = $writerweb->write($web);
                $webImage = 'data:image/png;base64,' . base64_encode($result->getString());     
                        
                $name = $data?->customer?->name;        
                $email = $data?->customer?->email;        

                $date = self::helper('MasterHelper')::date_time_formate($data?->created_at);
                $path = "https://zentaro.kefify.com/build/images/pos-img/logo.png";
                // $path = "http://127.0.0.1:8000/build/images/pos-img/logo.png";
        
                $qrContent = "Name: $name\nEmail: $email\nDate: $date\nAmount: $data?->net_total";        
                 
                $qrCode = new QrCode($qrContent);                
                $qrCode->setSize(500);  // Set the size (in pixels)
                $qrCode->setMargin(10); // Set the margin (default is 10)
                $qrCode->setForegroundColor(new Color(0, 0, 0)); // Blue color for QR code foreground
                $qrCode->setBackgroundColor(new Color(255, 255, 0)); // White color for background         
                $logo = imagecreatefrompng($path);   
                $writer = new PngWriter();
        
                $logoWidth = imagesx($logo);
                $logoHeight = imagesy($logo);
                $logoSize = 50;
                $logoResized = imagescale($logo, $logoSize, $logoSize);                
                $result = $writer->write($qrCode);
                $qrImage = imagecreatefromstring($result->getString());        
                $qrWidth = imagesx($qrImage);
                $qrHeight = imagesy($qrImage);    
                $logoX = ($qrWidth - $logoSize) / 2;
                $logoY = ($qrHeight - $logoSize) / 2;        
                imagecopy($qrImage, $logoResized, $logoX, $logoY, 0, 0, $logoSize, $logoSize);        
                ob_start();
                imagepng($qrImage);
                $qrCodeImage = 'data:image/png;base64,' . base64_encode(ob_get_clean());        
                imagedestroy($logo);
                imagedestroy($qrImage);
                imagedestroy($logoResized);
                return view('pos.invoice', compact('data', 'qrCodeImage','webImage','date','order','order_line'));       

            }
            else{
                return redirect()->route('dashboard')->with(['error' => 'Order Not found']);
            }
        }
        catch(\Exception $e){
            return redirect()->route('dashboard')->with(['error' => $e->getMessage()]);            
        }
        
    }

    public function order_detail(Request $request)
    {                
        return self::get_order_detail($request->order_id)[1];
    }
     
 
}
