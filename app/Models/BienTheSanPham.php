<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BienTheSanPham extends Model
{
    protected $table = 'bien_the_san_phams';

    protected $fillable = [
        'id_san_pham',
        'kich_thuoc',
        'mau_sac',
        'chat_lieu',
        'gia_nhap',
        'gia_ban',
        'so_luong_ton',
        'tinh_trang',
    ];
}

