<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienTheSanPhamRequestCreate;
use App\Models\BienTheSanPham;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BienTheSanPhamController extends Controller
{
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 50;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $bienTheSanPham = BienTheSanPham::where('id', $request->id)->first();

        if (!$bienTheSanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Biến thể không tồn tại.'
            ]);
        }
        if ($bienTheSanPham->so_luong_ton == 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Không thể đổi trạng thái vì biến thể này đã hết hàng.'
            ]);
        }
        $bienTheSanPham->tinh_trang = $bienTheSanPham->tinh_trang == 1 ? 0 : 1;
        $bienTheSanPham->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái biến thể thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 49;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = BienTheSanPham::join('san_phams', 'bien_the_san_phams.id_san_pham', 'san_phams.id')
            ->where('kich_thuoc', 'like', $noi_dung)
            ->orWhere('mau_sac', 'like', $noi_dung)
            ->orWhere('chat_lieu', 'like', $noi_dung)
            ->orWhere('san_phams.ten_san_pham', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy(Request $request)
    {
        $id_chuc_nang = 48;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BienTheSanPham::where('id', $request->id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa biến thể sản phẩm ' . $request->id . ' thành công.'
        ]);
    }

    public function store(BienTheSanPhamRequestCreate $request)
    {
        $id_chuc_nang = 45;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BienTheSanPham::create([
            'id_san_pham'       => $request->id_san_pham,
            'kich_thuoc'        => $request->kich_thuoc,
            'mau_sac'           => $request->mau_sac,
            'chat_lieu'         => $request->chat_lieu,
            'so_luong_ton'      => $request->so_luong_ton,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => 1,
            'message' => "Thêm mới biến thể " . $request->ten_san_pham . " thành công."
        ]);
    }

    public function update(BienTheSanPhamRequestCreate $request)
    {
        $id_chuc_nang = 47;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BienTheSanPham::where('id', $request->id)->update([
            'id_san_pham'       => $request->id_san_pham,
            'kich_thuoc'        => $request->kich_thuoc,
            'mau_sac'           => $request->mau_sac,
            'chat_lieu'         => $request->chat_lieu,
            'so_luong_ton'      => $request->so_luong_ton,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => 1,
            'message' => "Cập nhập biển thể " . $request->ten_san_pham . " thành công."
        ]);
    }

    public function getData()
    {
        $id_chuc_nang = 46;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        BienTheSanPham::where('so_luong_ton', 0)
            ->where('tinh_trang', '!=', 0)
            ->update(['tinh_trang' => 0]);

        $data = BienTheSanPham::join('san_phams', 'bien_the_san_phams.id_san_pham', 'san_phams.id')
            ->select(
                'bien_the_san_phams.id',
                'bien_the_san_phams.id_san_pham',
                'san_phams.ten_san_pham',
                'bien_the_san_phams.kich_thuoc',
                'bien_the_san_phams.mau_sac',
                'bien_the_san_phams.chat_lieu',
                'bien_the_san_phams.so_luong_ton',
                'bien_the_san_phams.tinh_trang'
            )
            ->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
