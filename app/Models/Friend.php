<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'friend_id'];

    public function user() :hasOne
    {
        return $this->hasOne(User::class, 'id', 'friend_id');
    }
}
