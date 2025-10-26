<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietSanPhamController extends Controller
{
    public function chiTietSanPham($id)
    {
        $data = DB::table('san_phams')
            ->join('thuong_hieus', 'thuong_hieus.id', '=', 'san_phams.id_thuong_hieu')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.id as id_danh_muc',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.giam_gia',
                'san_phams.mo_ta',
                'san_phams.gia_goc',
                DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong_ton), 0) AS tong_sl_ton'),
                DB::raw('(san_phams.gia_goc - (san_phams.gia_goc * san_phams.giam_gia / 100)) AS gia_ban')
            )
            ->where('san_phams.id', $id)
            ->where('san_phams.tinh_trang', 1)
            ->groupBy(
                'san_phams.id',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.id',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_goc',
                'san_phams.giam_gia'
            )
            ->first();

        // Nếu không có sản phẩm
        if (!$data) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại hoặc không có sẵn.'
            ]);
        }

        // 2. Lấy danh sách ảnh
        $images = DB::table('hinh_anh_san_phams')
            ->where('id_san_pham', $id)
            ->pluck('hinh_anh')
            ->toArray();

        $data->hinh_anh = $images;

        // 3. Lấy các biến thể (distinct tổ hợp kích thước & màu sắc)
        $variants = DB::table('bien_the_san_phams')
            ->where('id_san_pham', $id)
            ->select('bien_the_san_phams.id', 'bien_the_san_phams.kich_thuoc', 'bien_the_san_phams.mau_sac')
            // ->distinct()
            ->get();

        $kichThuoc = $variants->pluck('kich_thuoc')->unique()->values()->all();
        $mauSac = $variants->pluck('mau_sac')->unique()->values()->all();

        $data->kich_thuoc_distinct = $kichThuoc;
        $data->mau_sac_distinct = $mauSac;
        // 4. Trả về dữ liệu
        return response()->json([
            'status' => true,
            'data' => $data,

        ]);
    }

    public function cungDanhMuc(Request $request)
    {
        $query = DB::table('san_phams')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('hinh_anh_san_phams', 'hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'san_phams.slug_san_pham',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                DB::raw('MIN(hinh_anh_san_phams.hinh_anh) AS hinh_anh'),
                DB::raw('san_phams.gia_goc - (san_phams.gia_goc * san_phams.giam_gia / 100) AS gia_ban'),
                'san_phams.gia_goc',
                'san_phams.giam_gia'
            )
            ->where('danh_mucs.id', $request->id_danh_muc)
            ->where('san_phams.tinh_trang', 1);

        if ($request->has('id_san_pham')) {
            $query->where('san_phams.id', '!=', $request->id_san_pham);
        }

        $data = $query->groupBy(
            'san_phams.id',
            'danh_mucs.ten_danh_muc',
            'san_phams.ten_san_pham',
            'san_phams.slug_san_pham',
            'san_phams.gia_goc',
            'san_phams.giam_gia'
        )->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
