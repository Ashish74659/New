<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model  
{
    use HasFactory;
   
    protected $table = "order_line";
    protected $guarded = [];
            
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function order_header()
    {
        return $this->belongsTo(OrderHeader::class, 'order_header_id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function company_item()
    {
        return $this->belongsTo(CompanyItem::class, 'company_item_id');
    }
}

       
            