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
            'message' => 'Bạn đã đổi trạng thái biến ' . $request->ten_san_pham . ' thành công'
        ]);
    }
    public function search(Request $request)
    {
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
        //         SELECT san_phams.ten_san_pham, bien_the_san_phams.kich_thuoc, bien_the_san_phams.mau_sac, bien_the_san_phams.chat_lieu, bien_the_san_phams.so_luong_ton, bien_the_san_phams.tinh_trang
        // FROM bien_the_san_phams
        // JOIN san_phams ON bien_the_san_phams.id_san_pham = san_phams.id
        $data = BienTheSanPham::join('san_phams', 'bien_the_san_phams.id_san_pham', 'san_phams.id')
                                ->select('bien_the_san_phams.id','bien_the_san_phams.id_san_pham','san_phams.ten_san_pham', 'bien_the_san_phams.kich_thuoc', 'bien_the_san_phams.mau_sac',
                                'bien_the_san_phams.chat_lieu', 'bien_the_san_phams.so_luong_ton', 'bien_the_san_phams.tinh_trang')
                                ->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
