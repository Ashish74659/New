<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPrefixLog extends Model
{
    use HasFactory;
    protected $table = "company_prefix_log";
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
    
}
