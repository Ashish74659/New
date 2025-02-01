<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    use HasFactory;
   
    protected $table = "order_transaction";
    protected $guarded = [];
            
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }  
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function order_header()
    {
        return $this->belongsTo(OrderHeader::class, 'order_header_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    } 
}
