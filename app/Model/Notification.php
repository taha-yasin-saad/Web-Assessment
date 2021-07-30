<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'reservation_id',
        'user_id',
        'message',
        'is_read'
    ];
}
