<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $table = "company";
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
    public function pos_type()
    {
        return $this->belongsTo(PosType::class, 'pos_type_id');
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
    public function date_formate()
    {
        return $this->belongsTo(DateFormate::class, 'date_formate_id');
    }
    public function time_zone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id');
    }


    public function scopeActiveOnly($query)
    {
        return $query->where('status', 'Active')->orderBy('id', 'DESC');
    }
    public function scopecreateBy($query)
    {
        return $query->with('creator')->latest()->get();
    }



}
