<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietSanPhamController extends Controller
{
    public function chiTietSanPham($slug)
    {
        // Tìm sản phẩm theo slug hoặc ID (để tương thích ngược)
        $sanPham = DB::table('san_phams')
            ->where(function($query) use ($slug) {
                $query->where('slug_san_pham', $slug)
                      ->orWhere('id', $slug);
            })
            ->where('tinh_trang', 1)
            ->where('trang_thai', 1)
            ->first();

        if (!$sanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại hoặc không có sẵn.'
            ], 404);
        }

        $id = $sanPham->id;

        $data = DB::table('san_phams')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'san_phams.slug_san_pham',
                'danh_mucs.id as id_danh_muc',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_co_ban',
                DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) AS tong_sl_ton'),
                DB::raw('MIN(bien_the_san_phams.gia) as gia_thap_nhat'),
                DB::raw('MAX(bien_the_san_phams.gia) as gia_cao_nhat')
            )
            ->where('san_phams.id', $id)
            ->where('san_phams.tinh_trang', 1)
            ->where('san_phams.trang_thai', 1)
            ->groupBy(
                'san_phams.id',
                'san_phams.slug_san_pham',
                'danh_mucs.id',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_co_ban'
            )
            ->first();

        // Nếu không có sản phẩm
        if (!$data) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại hoặc không có sẵn.'
            ], 404);
        }

        // 2. Lấy danh sách ảnh
        $images = DB::table('hinh_anh_san_phams')
            ->where('id_san_pham', $id)
            ->pluck('url')
            ->toArray();

        $data->hinh_anh = $images;

        // 3. Lấy các biến thể (distinct tổ hợp size & màu sắc)
        $variants = DB::table('bien_the_san_phams')
            ->where('id_san_pham', $id)
            ->select('bien_the_san_phams.id', 'bien_the_san_phams.size', 'bien_the_san_phams.mau_sac', 'bien_the_san_phams.so_luong', 'bien_the_san_phams.gia')
            ->get();

        $sizeDistinct = $variants->pluck('size')->filter()->unique()->values()->all();
        $mauSacDistinct = $variants->pluck('mau_sac')->filter()->unique()->values()->all();

        $data->kich_thuoc_distinct = $sizeDistinct;
        $data->mau_sac_distinct = $mauSacDistinct;
        $data->bien_the = $variants;
        
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
            ->leftJoin('hinh_anh_san_phams', function($join) {
                $join->on('hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
                     ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
            })
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_co_ban',
                DB::raw('COALESCE(hinh_anh_san_phams.url, "") AS hinh_anh'),
                DB::raw('MIN(bien_the_san_phams.gia) as gia_thap_nhat'),
                DB::raw('MAX(bien_the_san_phams.gia) as gia_cao_nhat')
            )
            ->where('danh_mucs.id', $request->id_danh_muc)
            ->where('san_phams.tinh_trang', 1)
            ->where('san_phams.trang_thai', 1);

        if ($request->has('id_san_pham')) {
            $query->where('san_phams.id', '!=', $request->id_san_pham);
        }

        $data = $query->groupBy(
            'san_phams.id',
            'san_phams.slug_san_pham',
            'danh_mucs.ten_danh_muc',
            'san_phams.ten_san_pham',
            'san_phams.mo_ta',
            'san_phams.gia_co_ban',
            'hinh_anh_san_phams.url'
        )
        ->orderBy('san_phams.ngay_dang', 'desc')
        ->limit(8)
        ->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
