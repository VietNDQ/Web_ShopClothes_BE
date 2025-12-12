<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KhachHang extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'khach_hangs';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'password',
        'so_dien_thoai',
        'ngay_sinh',
        'is_active',
        'is_block',
        'type_account',
        'content_block',
        'hash_active',
        'hash_reset',
    ];

    public function messages()
{
    return $this->morphMany(Message::class, 'sender');
}
}

