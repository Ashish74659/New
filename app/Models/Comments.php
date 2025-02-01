<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $guarded = [];

    public function CommentImage()
    {
        return $this->hasMany(CommentImage::class, 'comment_id', 'id');
    }

}
