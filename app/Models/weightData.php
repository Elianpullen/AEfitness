<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class weightData extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'weight', 'bodyfat'];

    public function user() :hasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
