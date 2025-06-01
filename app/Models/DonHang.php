<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hangs';

    protected $fillable = [
        'ma_don_hang',
        'id_khach_hang',
        'id_san_pham',
        'so_luong',
        'tong_tien',
        'ghi_chu',
        'tinh_trang', // 1: đã thanh toán, 0: chưa thanh toán
        'ngay_dat',
        'trang_thai',

        //0: chờ xác nhận 1:đã xác nhận 2:Đang giao hàng 3:Giao hàng thành công 4:giao hàng thất bại hiển thị bên admin
        //0: chờ xác nhận 1:đã chuẩn bị hàng 2:Đang giao hàng 3:Đã nhận hàng 4:giao hàng thất bại hiển thị bên khách hàng

    ];
}
