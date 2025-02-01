<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
class Number_Sequence_Map extends Model
{
    use HasFactory; 
    protected $table = "numbersequence_map";
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

    public function number_sequence()
    {
        return $this->belongsTo(Numbersequence::class, 'number_sequence_id');
    }

    public function scopeActiveOnly($query)
    {
        return $query->where('status', 'Active')->orderBy('id', 'DESC');
    }
} 
