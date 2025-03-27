<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class KhachHang extends Model
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
        'type-account',
        'content_block',
        'hash_active',
        'hash_reset',
    ];
}
