<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_reply extends Model
{
    protected $fillable = [
        'comment_id',
        'user_id',
        'body',
        'is_active'
    ];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
