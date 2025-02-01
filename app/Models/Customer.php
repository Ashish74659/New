<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
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
    
    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
    public function pos()
    {
        return $this->belongsTo(POS::class, 'pos_id');
    }    
    
     
    public function scopeActiveOnly($query,$cmp)
    {        
        return $query->orderBy('id', 'DESC')->where('status', 'Active')->where('company_id',$cmp);
    }
}
