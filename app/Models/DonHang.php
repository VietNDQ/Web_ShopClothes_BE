<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hangs';

    protected $fillable = [
        'id_khach_hang',
        'ma_don_hang',
        'id_san_pham',
        'so_luong',
        'don_gia',
        'tong_tien',
        'kich_thuoc',
        'mau_sac',
        'ghi_chu',
        'trang_thai',
        'id_nhan_vien', // Nhân viên xử lý đơn hàng
        // 0: giỏ hàng chưa đặt
        //   1: { admin: "Chờ xác nhận", customer: "Chờ xác nhận" },
        //   2: { admin: "Đã chuẩn bị hàng", customer: "Chờ shipper lấy hàng" },
        //   3: { admin: "Đang giao hàng", customer: "Đang giao hàng" },
        //   4: { admin: "Giao hàng thành công", customer: "Đã nhận hàng" },
        //   5: { admin: "Giao hàng thất bại", customer: "Giao hàng thất bại" }

    ];
}
