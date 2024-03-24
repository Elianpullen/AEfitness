<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Friend extends Model
{
    use HasFactory;

//    protected $guarded = [
//        'user_id',
//        'friend_id',
//        'status',
//    ];

//    public function users(): BelongsToMany
//    {
//        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
//    }
}
