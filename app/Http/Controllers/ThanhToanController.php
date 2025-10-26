<?php

namespace App\Http\Controllers;

use App\Http\Requests\XacNhanDatHangRequest;
use App\Models\DonHang;
use App\Models\ThanhToan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThanhToanController extends Controller
{
    public function xacNhanDatHang(XacNhanDatHangRequest $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang || !($khachHang instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn chưa đăng nhập.'
            ], 401);
        }

        $donHangs = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->get();

        if ($donHangs->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Giỏ hàng trống, vui lòng thêm sản phẩm'
            ], 422);
        }

        $tong_tien = $donHangs->sum(function ($item) {
            return $item->so_luong * $item->don_gia;
        });

        $ma_don_hang = 'DH - ' . strtoupper(Str::random(8));

        DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->update([
                'ma_don_hang' => $ma_don_hang,
                'tong_tien' => $tong_tien,
                'trang_thai' => 1, // Đã đặt, chờ xác nhận
            ]);

        ThanhToan::create([
            'ma_don_hang' => $ma_don_hang,
            'id_khach_hang' => $khachHang->id,
            'id_don_hang' => $donHangs->first()->id,
            'id_dia_chi_giao_hang' => $request->id_dia_chi_giao_hang,
            'tong_tien' => $tong_tien,
            'ghi_chu' => $request->ghi_chu ?? null,
            'phuong_thuc_thanh_toan' => $request->phuong_thuc_thanh_toan,
            'is_thanh_toan' => $request->phuong_thuc_thanh_toan == 1 ? 0 : 1, // COD: Chờ thanh toán, Chuyển khoản: Đã thanh toán
            'ngay_thanh_toan' => now(), // COD: null, Chuyển khoản: thời gian hiện tại
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đặt hàng thành công'
        ], 200);
    }
}
