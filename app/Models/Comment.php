<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'blog_id', 'user_id'];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
