<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;
    protected $table = "customer_contact";
    protected $guarded = [];
            
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
