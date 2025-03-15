<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequestCreate;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function changeStatus(Request $request)
    {
        $sanPham = SanPham::where('id', $request->id)->first();
        if (!$sanPham) {
            return response()->json([
                'status' => false,
                'message' => 'Sản phẩm không tồn tại.'
            ]);
        }

        if ($sanPham->tinh_trang == 1) {
            $sanPham->tinh_trang = 0;
        } else {
            $sanPham->tinh_trang = 1;
        }
        $sanPham->save();

        return response()->json([
            'status'  => true,
            'message' => 'Bạn đã cập nhật sản phẩm ' . $sanPham->ten_san_pham . ' thành công'
        ]);
    }


    public function store(SanPhamRequestCreate $request)
    {
        SanPham::create([
            'id_thuong_hieu' => $request->id_thuong_hieu,
            'id_danh_muc'    => $request->id_danh_muc,
            'ten_san_pham'   => $request->ten_san_pham,
            'slug_san_pham'  => $request->slug_san_pham,
            'gia_ban'        => $request->gia_ban,
            'so_luong_ton'   => $request->so_luong_ton,
            'hinh_anh'       => $request->hinh_anh,
            'mo_ta'          => $request->mo_ta,
            'tinh_trang'     => $request->tinh_trang,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Thêm mới sản phẩm ' . $request->ten_san_pham . ' thành công.'
        ]);
    }

    public function getData(Request $request)
    {
        $data = DB::table('san_phams')
            ->join('thuong_hieus', 'thuong_hieus.id', '=', 'san_phams.id_thuong_hieu')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.hinh_anh',
                'san_phams.mo_ta',
                'san_phams.tinh_trang',
                DB::raw('SUM(COALESCE(bien_the_san_phams.so_luong_ton, 0)) AS TONG_SL_TON'),
                DB::raw('MAX(COALESCE(bien_the_san_phams.gia_ban, 0)) AS gia_ban')
            )
            ->groupBy(
                'san_phams.id',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.hinh_anh',
                'san_phams.mo_ta',
                'san_phams.tinh_trang'
            )
            ->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        SanPham::where('id', $request->id)->update([
            'id_thuong_hieu' => $request->id_thuong_hieu,
            'id_danh_muc'    => $request->id_danh_muc,
            'ten_san_pham'   => $request->ten_san_pham,
            'slug_san_pham'  => $request->slug_san_pham,
            'gia_ban'        => $request->gia_ban,
            'so_luong_ton'   => $request->so_luong_ton,
            'hinh_anh'       => $request->hinh_anh,
            'mo_ta'          => $request->mo_ta,
            'tinh_trang'     => $request->tinh_trang,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật sản phẩm ' . $request->ten_san_pham . ' thành công.'
        ]);
    }

    public function destroy(Request $request)
    {
        SanPham::where('id', $request->id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa sản phẩm ' . $request->ten_san_pham . ' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = DB::table('san_phams')
            ->join('thuong_hieus', 'thuong_hieus.id', '=', 'san_phams.id_thuong_hieu')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->where('san_phams.ten_san_pham', 'like', $noi_dung)
            ->orWhere('thuong_hieus.ten_thuong_hieu', 'like', $noi_dung)
            ->orWhere('danh_mucs.ten_danh_muc', 'like', $noi_dung)
            ->select('san_phams.*', 'thuong_hieus.ten_thuong_hieu', 'danh_mucs.ten_danh_muc')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
