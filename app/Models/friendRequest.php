<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class friendRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'sender_id', 'receiver_id', 'sent_date', 'accept_date'
    ];

    public function sender() :hasOne
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function receiver() :hasOne
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }
}
