<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class friendRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'sender_id', 'receiver_id', 'sent_date', 'accept_date'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
