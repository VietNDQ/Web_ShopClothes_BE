<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequestCreate;
use App\Models\BienTheSanPham;
use App\Models\HinhAnhSanPham;
use App\Models\PhanQuyen;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SanPhamShopController extends Controller
{
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 44;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $sanPham = SanPham::where('id', $request->id)->first();

        if (!$sanPham) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không tồn tại.'
            ]);
        }
        $soLuongBienThe = BienTheSanPham::where('id_san_pham', $sanPham->id)->count();
        if ($soLuongBienThe == 0) {
            return response()->json([
                'status'  => false,
                'message' => 'Sản phẩm không có biến thể. Không thể đổi trạng thái.'
            ]);
        }
        $sanPham->tinh_trang = $sanPham->tinh_trang == 1 ? 0 : 1;
        $sanPham->save();

        return response()->json([
            'status'  => true,
            'message' => 'Đã đổi trạng thái sản phẩm ' . $sanPham->ten_san_pham . ' thành công.'
        ]);
    }


    public function store(Request $request)
    {
        $id_chuc_nang = 39;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $sanPham = SanPham::create([
            'id_thuong_hieu' => $request->id_thuong_hieu,
            'id_danh_muc' => $request->id_danh_muc,
            'ten_san_pham' => $request->ten_san_pham,
            'slug_san_pham' => $request->slug_san_pham,
            'gia_goc' => $request->gia_goc,
            'mo_ta' => $request->mo_ta,
            'tinh_trang' => $request->tinh_trang,
        ]);


        return response()->json([
            'status'  => true,
            'message' => 'Thêm mới sản phẩm ' . $sanPham->ten_san_pham . ' thành công.'
        ]);
    }


    public function getOpenData()
    {
        $data = DB::table('san_phams')
            ->join('thuong_hieus', 'thuong_hieus.id', '=', 'san_phams.id_thuong_hieu')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('hinh_anh_san_phams', 'hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->where('san_phams.tinh_trang', 1)
            ->select(
                'san_phams.id',
                'san_phams.id_thuong_hieu',
                'san_phams.id_danh_muc',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                DB::raw('MIN(hinh_anh_san_phams.hinh_anh) AS hinh_anh'),
                'san_phams.giam_gia',
                'san_phams.mo_ta',
                'san_phams.gia_goc',
                DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong_ton), 0) AS tong_sl_ton'),
                DB::raw('(CASE WHEN COALESCE(SUM(bien_the_san_phams.so_luong_ton), 0) = 0 THEN 0 ELSE san_phams.tinh_trang END) AS tinh_trang'),
                DB::raw('san_phams.gia_goc - (san_phams.gia_goc * san_phams.giam_gia / 100) AS gia_ban')
            )
            ->groupBy(
                'san_phams.id',
                'san_phams.id_thuong_hieu',
                'san_phams.id_danh_muc',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.mo_ta',
                'san_phams.tinh_trang',
                'san_phams.gia_goc',
                'san_phams.giam_gia'
            )
            ->inRandomOrder()
            ->get();

        // Thêm logic lấy kích thước và màu sắc distinct
        foreach ($data as $item) {
            $variants = DB::table('bien_the_san_phams')
                ->where('id_san_pham', $item->id)
                ->select('kich_thuoc', 'mau_sac')
                ->get();

            $item->kich_thuoc_distinct = $variants->pluck('kich_thuoc')->unique()->values()->all();
            $item->mau_sac_distinct = $variants->pluck('mau_sac')->unique()->values()->all();
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function getData(Request $request)
    {
        $id_chuc_nang = 40;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = DB::table('san_phams')
            ->join('thuong_hieus', 'thuong_hieus.id', '=', 'san_phams.id_thuong_hieu')
            ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
            ->leftJoin('hinh_anh_san_phams', 'hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
            ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
            ->select(
                'san_phams.id',
                'san_phams.id_thuong_hieu',
                'san_phams.id_danh_muc',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                DB::raw('MIN(hinh_anh_san_phams.hinh_anh) AS hinh_anh'),
                'san_phams.giam_gia',
                'san_phams.mo_ta',
                'san_phams.gia_goc',
                DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong_ton), 0) AS TONG_SL_TON'),
                DB::raw('(CASE WHEN COALESCE(SUM(bien_the_san_phams.so_luong_ton), 0) = 0 THEN 0 ELSE san_phams.tinh_trang END) AS tinh_trang'),
                DB::raw('san_phams.gia_goc - (san_phams.gia_goc * san_phams.giam_gia / 100) AS gia_ban')
            )
            ->groupBy(
                'san_phams.id',
                'san_phams.id_thuong_hieu',
                'san_phams.id_danh_muc',
                'thuong_hieus.ten_thuong_hieu',
                'danh_mucs.ten_danh_muc',
                'san_phams.ten_san_pham',
                'san_phams.slug_san_pham',
                'san_phams.mo_ta',
                'san_phams.tinh_trang',
                'san_phams.gia_goc',
                'san_phams.giam_gia'
            )
            ->get();


        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }


    public function update(Request $request)
    {
        $id_chuc_nang = 41;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SanPham::where('id', $request->id)->update([
            'id_thuong_hieu' => $request->id_thuong_hieu,
            'id_danh_muc'    => $request->id_danh_muc,
            'ten_san_pham'   => $request->ten_san_pham,
            'slug_san_pham'  => $request->slug_san_pham,
            'gia_goc'        => $request->gia_goc,
            'giam_gia'       => $request->giam_gia,
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
        $id_chuc_nang = 42;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SanPham::where('id', $request->id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa sản phẩm ' . $request->ten_san_pham . ' thành công.'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 43;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
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

    public function storeHinhAnh(Request $request)
    {
        $id_chuc_nang = 53;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        HinhAnhSanPham::create([
            'id_san_pham' => $request->id,
            'hinh_anh'    => $request->hinh_anh,
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Thêm mới hình ảnh sản phẩm ' . $request->ten_san_pham . ' thành công.'
        ]);
    }
    public function getHinhAnh()
    {
        $id_chuc_nang = 51;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $check = SanPham::where('tinh_trang', 1);
        $data = SanPham::select('san_phams.id', 'san_phams.ten_san_pham')
            ->groupBy('san_phams.id', 'san_phams.ten_san_pham')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function searchHinhAnh(Request $request)
    {
        $id_chuc_nang = 55;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = SanPham::where('ten_san_pham', 'like', $noi_dung)
            ->select('ten_san_pham')
            ->get();

        return response()->json([
            'status' => 1,
            'data'   => $data
        ]);
    }

    public function getChiTietHinhAnh(Request $request)
    {
        $id_chuc_nang = 52;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $id = $request->id;
        $data = HinhAnhSanPham::where('id_san_pham', $id)->get();
        if ($data->isEmpty()) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không có hình ảnh nào cho sản phẩm này.'
            ]);
        }
        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }
    public function destroyHinhAnh(Request $request)
    {
        $id_chuc_nang = 54;
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $id = $request->id;
        HinhAnhSanPham::where('id', $id)->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Xóa hình ảnh sản phẩm thành công.'
        ]);
    }
}
