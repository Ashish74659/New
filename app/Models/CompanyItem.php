<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyItem extends Model 
{
    use HasFactory;
   
    protected $table = "company_item";
    protected $guarded = [];
            
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function comy()
    {
        return $this->belongsTo(Company::class, 'comy_id');
    }
    
    
    public function scopeActiveOnly($query)
    {
        return $query->where('status', 'Active')->orderBy('id', 'DESC');
    }
}
