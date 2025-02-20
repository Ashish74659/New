<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomNotifications extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'custom_notification';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
