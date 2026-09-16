<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Like extends Model
{
    public function user(): BelongsTo {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
