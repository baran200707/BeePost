<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
