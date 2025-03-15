<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienTheSanPhamRequestCreate;
use App\Models\BienTheSanPham;
use Illuminate\Http\Request;

class BienTheSanPhamController extends Controller
{
    public function changeStatus(Request $request)
    {
        $bienTheSanPham = BienTheSanPham::where('id', $request->id)->first();
        if (!$bienTheSanPham) {
            return response()->json([
                'status' => false,
                'message' => 'Sản phẩm không tồn tại.'
            ]);
        }

        if ($bienTheSanPham->tinh_trang == 1) {
            $bienTheSanPham->tinh_trang = 0;
        } else {
            $bienTheSanPham->tinh_trang = 1;
        }
        $bienTheSanPham->save();

        return response()->json([
            'status'  => true,
            'message' => 'Bạn đã cập nhật sản phẩm ' . $request->ten_san_pham . ' thành công'
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = BienTheSanPham::where('kich_thuoc', 'like', $noi_dung)
                                ->orWhere('mau_sac', 'like', $noi_dung)
                                ->orWhere('chat_lieu', 'like', $noi_dung)
                                ->get();

        return response()->json([
            'data' => $data
        ]);

    }
    public function destroy(Request $request)
    {
        BienTheSanPham::where('id', $request->id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa biến thể sản phẩm ' . $request->id . ' thành công.'
        ]);
    }

    public function store(BienTheSanPhamRequestCreate $request)
    {
        BienTheSanPham::create([
            'id_san_pham'       => $request->id_san_pham,
            'kich_thuoc'        => $request->kich_thuoc,
            'mau_sac'           => $request->mau_sac,
            'chat_lieu'         => $request->chat_lieu,
            'gia_nhap'          => $request->gia_nhap,
            'gia_ban'           => $request->gia_ban,
            'so_luong_ton'      => $request->so_luong_ton,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => 1,
            'message' => "Thêm mới thành công."
        ]);
    }

    public function update(BienTheSanPhamRequestCreate $request)
    {
        BienTheSanPham::where('id', $request->id)->update([
            'id_san_pham'       => $request->id_san_pham,
            'kich_thuoc'        => $request->kich_thuoc,
            'mau_sac'           => $request->mau_sac,
            'chat_lieu'         => $request->chat_lieu,
            'gia_nhap'          => $request->gia_nhap,
            'gia_ban'           => $request->gia_ban,
            'so_luong_ton'      => $request->so_luong_ton,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => 1,
            'message' => "Caap thành công."
        ]);
    }

    public function getData()
    {
        $data = BienTheSanPham::get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
