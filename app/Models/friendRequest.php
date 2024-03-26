<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class friendRequest extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'status', 'sender_id', 'receiver_id', 'sent_date', 'accept_date'
    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_request_id', 'user_id');
        // change pivot name: ->as('test');
        // where pivot is: ->wherePivot('status', '=', 'accepted');
    }
}
