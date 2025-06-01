<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DonHangController extends Controller
{
    public function themGioHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        if (!$khachHang) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!'
            ], 401);
        }

        $sanPham = SanPham::find($request->id_san_pham);
        if (!$sanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại!'
            ], 404);
        }

        if ($request->so_luong <= 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Số lượng sản phẩm không hợp lệ!'
            ], 400);
        }

        // Tìm xem sản phẩm đã có trong giỏ hàng chưa (trang_thai = 0)
        $donHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('id_san_pham', $request->id_san_pham)
            ->where('trang_thai', 0)
            ->first();

        if ($donHang) {
            // Cập nhật số lượng và tổng tiền
            $donHang->so_luong += $request->so_luong;
            $donHang->tong_tien = $donHang->so_luong * $sanPham->gia_ban;
            $donHang->save();

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật số lượng sản phẩm trong giỏ hàng thành công'
            ]);
        }

        // Nếu chưa có thì thêm mới
        DonHang::create([
            'ma_don_hang' => strtoupper(substr((string) Str::uuid(), 0, 10)),
            'id_khach_hang' => $khachHang->id,
            'id_san_pham'   => $request->id_san_pham,
            'so_luong'      => $request->so_luong,
            'tong_tien'     => $sanPham->gia_ban * $request->so_luong,
            'tinh_trang'    => 0,
            'trang_thai'    => 0,
            'ghi_chu'       => null,
            'ngay_dat'      => null,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm sản phẩm vào giỏ hàng thành công'
        ]);
    }
    public function layGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();
        $gioHang = DonHang::where('id_khach_hang', $khachHang->id)
            ->where('trang_thai', 0)
            ->with('sanPham')
            ->get();

        return response()->json([
            'status'  => true,
            'data'    => $gioHang
        ]);
    }
}
