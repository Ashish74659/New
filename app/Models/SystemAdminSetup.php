<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SystemAdminSetup extends Model
{
    use HasFactory;

    protected $table = "systemadminsetup";
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'default_currency_id');
    }
    public function scopeActiveOnly($query)
    {
        return $query->where('status', 'Active')->orderBy('id', 'DESC')->get();
    }

}
