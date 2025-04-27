<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiKhachHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tinh_thanh',
        'quan_huyen',
        'phuong_xa',
        'dia_chi_cu_the',
        'mac_dinh'
    ];
}
