<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $fillable = [
        'ma_voucher',
        'ten_voucher',
        'mo_ta',
        'loai_giam_gia',
        'gia_tri_giam',
        'gia_tri_toi_thieu',
        'gia_tri_toi_da',
        'so_luong',
        'so_luong_da_su_dung',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
        'id_nhan_vien',
    ];

    protected $casts = [
        'ngay_bat_dau' => 'datetime',
        'ngay_ket_thuc' => 'datetime',
        'gia_tri_giam' => 'decimal:2',
        'gia_tri_toi_thieu' => 'decimal:2',
        'gia_tri_toi_da' => 'decimal:2',
    ];
}
