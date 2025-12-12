<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Tìm kiếm sản phẩm theo từ khóa
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProducts(Request $request)
    {
        try {
            $keyword = $request->input('keyword', '');
            $limit = $request->input('limit', 10); // Giới hạn số lượng kết quả gợi ý
            
            // Validate keyword
            if (empty(trim($keyword))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng nhập từ khóa tìm kiếm!',
                    'data' => []
                ], 400);
            }

            $searchTerm = trim($keyword);
            
            // Query tìm kiếm sản phẩm
            $sanPhams = DB::table('san_phams')
                ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
                ->leftJoin('hinh_anh_san_phams', function($join) {
                    $join->on('hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
                         ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
                })
                ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
                ->select(
                    'san_phams.id',
                    'san_phams.slug_san_pham',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.id_danh_muc',
                    'san_phams.tinh_trang',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) as tong_sl_ton')
                )
                ->where('san_phams.tinh_trang', 1)
                ->where('san_phams.trang_thai', 1)
                ->where(function($query) use ($searchTerm) {
                    $query->where('san_phams.ten_san_pham', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('san_phams.mo_ta', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('danh_mucs.ten_danh_muc', 'LIKE', '%' . $searchTerm . '%');
                })
                ->groupBy(
                    'san_phams.id',
                    'san_phams.slug_san_pham',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.id_danh_muc',
                    'san_phams.tinh_trang',
                    'danh_mucs.ten_danh_muc',
                    'hinh_anh_san_phams.url'
                )
                ->orderBy('san_phams.ngay_dang', 'desc')
                ->limit($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Tìm kiếm thành công!',
                'data' => $sanPhams,
                'total' => count($sanPhams),
                'keyword' => $searchTerm
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi tìm kiếm sản phẩm: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
     * Tìm kiếm sản phẩm với phân trang (cho trang sản phẩm)
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProductsPaginated(Request $request)
    {
        try {
            $keyword = $request->input('keyword', '');
            $page = $request->input('page', 1);
            $perPage = $request->input('per_page', 12);
            $categoryId = $request->input('danh_muc', null); // Filter theo danh mục nếu có
            
            // Validate
            $page = max(1, (int)$page);
            $perPage = max(1, min(100, (int)$perPage)); // Giới hạn tối đa 100 items/page
            
            $query = DB::table('san_phams')
                ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
                ->leftJoin('hinh_anh_san_phams', function($join) {
                    $join->on('hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
                         ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
                })
                ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
                ->select(
                    'san_phams.id',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.id_danh_muc',
                    'san_phams.tinh_trang',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) as tong_sl_ton')
                )
                ->where('san_phams.tinh_trang', 1)
                ->where('san_phams.trang_thai', 1);
            
            // Filter theo danh mục nếu có
            if ($categoryId) {
                $query->where('san_phams.id_danh_muc', $categoryId);
            }
            
            // Tìm kiếm theo từ khóa nếu có
            if (!empty(trim($keyword))) {
                $searchTerm = trim($keyword);
                $query->where(function($q) use ($searchTerm) {
                    $q->where('san_phams.ten_san_pham', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('san_phams.mo_ta', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('danh_mucs.ten_danh_muc', 'LIKE', '%' . $searchTerm . '%');
                });
            }
            
            // Đếm tổng số kết quả
            $totalQuery = clone $query;
            $total = $totalQuery->groupBy(
                'san_phams.id',
                'san_phams.slug_san_pham',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_co_ban',
                'san_phams.id_danh_muc',
                'san_phams.tinh_trang',
                'danh_mucs.ten_danh_muc',
                'hinh_anh_san_phams.url'
            )->get()->count();
            
            // Lấy dữ liệu với phân trang
            $sanPhams = $query->groupBy(
                'san_phams.id',
                'san_phams.slug_san_pham',
                'san_phams.ten_san_pham',
                'san_phams.mo_ta',
                'san_phams.gia_co_ban',
                'san_phams.id_danh_muc',
                'san_phams.tinh_trang',
                'danh_mucs.ten_danh_muc',
                'hinh_anh_san_phams.url'
            )
            ->orderBy('san_phams.ngay_dang', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();
            
            $totalPages = ceil($total / $perPage);
            
            return response()->json([
                'status' => true,
                'message' => 'Tìm kiếm thành công!',
                'data' => $sanPhams,
                'pagination' => [
                    'current_page' => $page,
                    'per_page' => $perPage,
                    'total' => $total,
                    'total_pages' => $totalPages,
                    'has_next' => $page < $totalPages,
                    'has_prev' => $page > 1
                ],
                'keyword' => $keyword ? trim($keyword) : null,
                'category_id' => $categoryId
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi tìm kiếm sản phẩm: ' . $e->getMessage(),
                'data' => [],
                'pagination' => [
                    'current_page' => 1,
                    'per_page' => $perPage ?? 12,
                    'total' => 0,
                    'total_pages' => 0,
                    'has_next' => false,
                    'has_prev' => false
                ]
            ], 500);
        }
    }
}

