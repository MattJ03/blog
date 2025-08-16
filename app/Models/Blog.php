<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'category', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
