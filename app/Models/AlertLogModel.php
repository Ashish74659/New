<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertLogModel extends Model
{
    use HasFactory;
    protected $table ='tbl_alertlog';
    protected $guarded = [];
}
