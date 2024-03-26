<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Friend extends Model
{
    use HasFactory;

    protected $guarded = [
        'user_id',
        'friend_id',
    ];

    public function users(): belongsTo
    {
        return $this->belongsTo(Friend::class);
    }
}
