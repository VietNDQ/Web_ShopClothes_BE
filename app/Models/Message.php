<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    
    protected $fillable = [
        'sender_id',
        'sender_type',
        'message',
    ];

    public function sender()
    {
        return $this->morphTo();
    }
}
