<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = 'thanh_toans';

    protected $fillable = [
        'ma_don_hang',
        'id_khach_hang',
        'id_don_hang',
        'id_dia_chi_giao_hang',
        'tong_tien',
        'phuong_thuc_thanh_toan', // '1: COD', '2: Chuyển khoản'
        'ghi_chu',
        'hash_thanh_toan',
        'is_thanh_toan', // 0: Chờ thanh toán, 1: Đã thanh toán, 2: Đã hủy
        'ngay_thanh_toan',
    ];
}
