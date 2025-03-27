<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function changeStatus(Request $request)
    {
        $khachHang = KhachHang::where('id', $request->id)->first();
        if (!$khachHang) {
            return response()->json([
                'status' => false,
                'message' => 'Khách Hàng không tồn tại.'
            ]);
        }

        if ($khachHang->is_block == 1) {
            $khachHang->is_block = 0;
        } else {
            $khachHang->is_block = 1;
        }
        $khachHang->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái Khách Hàng ' . $request->ten_khach_hang . ' thành công'
        ]);
    }
    public function store(Request $request)
    {
        KhachHang::create([
            'ho_va_ten'         =>$request->ho_va_ten,
            'email'             =>$request->email,
            'password'          =>$request->password,
            'so_dien_thoai'     =>$request->so_dien_thoai,
            'ngay_sinh'         =>$request->ngay_sinh,
            'hash_active'       =>$request->hash_active,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản  ' . $request->email . '  Thành Công'
        ]);
    }
    public function getData()
    {
        $data = KhachHang::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function update(Request $request)
    {
        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'         =>$request->ho_va_ten,
            'email'             =>$request->email,
            'password'          =>$request->password,
            'so_dien_thoai'     =>$request->so_dien_thoai,
            'ngay_sinh'         =>$request->ngay_sinh,
            'hash_active'       =>$request->hash_active,
        ]);

        return response()->json([
            'status' => 1,
            'message'=> 'Cập nhập Khách Hàng '.$request->ho_va_ten.' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        KhachHang::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  1,
             'message'=> 'Xóa Khách Hàng '.$request->ho_va_ten.' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = KhachHang::where('ho_va_ten', 'like', $noi_dung)
                            ->orwhere('email', 'like', $noi_dung)
                            ->orwhere('so_dien_thoai', 'like', $noi_dung)
                            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
