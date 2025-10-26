<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class NhanVien extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'ho_va_ten',
        'avatar',
        'email',
        'so_dien_thoai',
        'password',
        'dia_chi',
        'tinh_trang',
        'id_chuc_vu',
        'is_master',
    ];
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'id_chuc_vu', 'id');
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }
}
