<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';

    protected $fillable = [
        'id_thuong_hieu',
        'id_danh_muc',
        'ten_san_pham',
        'slug_san_pham',
        'gia_goc',
        'giam_gia',
        'so_luong_ton',
        'mo_ta',
        'tinh_trang',
    ];
}
