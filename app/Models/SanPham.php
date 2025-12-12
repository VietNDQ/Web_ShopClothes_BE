<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_phams';
    protected $fillable = [
        'id_danh_muc',
        'id_nhan_vien',
        'ten_san_pham',
        'slug_san_pham',
        'mo_ta',
        'gia_co_ban',
        'tinh_trang',
        'trang_thai',
        'ngay_dang'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'id_danh_muc');
    }

    public function bienThe()
    {
        return $this->hasMany(BienTheSanPham::class, 'id_san_pham');
    }

    public function hinhAnh()
    {
        return $this->hasMany(HinhAnhSanPham::class, 'id_san_pham');
    }
}
