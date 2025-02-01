<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;  
class Numbersequence extends Model
{
    use HasFactory;  
    protected $table = "numbersequence";
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

    public function numbersequence_map()
    {
        return $this->belongsTo(Number_Sequence_Map::class, 'numbersequence_map_id');
    }

    public function scopeActiveOnly($query,$cmp)
    {        
        return $query->orderBy('id', 'DESC')->where('company_id',$cmp);
    }
} 
