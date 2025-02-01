<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentimages extends Model
{
    use HasFactory;
    protected $table = "commentimages";
    protected $guarded = [];

    public function parentable()
    {
        return $this->morphTo();
    }
}
