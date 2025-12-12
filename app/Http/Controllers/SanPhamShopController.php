<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequestCreate;
use App\Models\BienTheSanPham;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SanPhamShopController extends Controller
{
    /**
     * Tạo sản phẩm mới
     */
    public function store(SanPhamRequestCreate $request)
    {
        try {
            // Lấy nhân viên từ token
            $user = Auth::guard('sanctum')->user();

            if (!$user || !$user instanceof \App\Models\NhanVien) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không xác thực được nhân viên. Vui lòng đăng nhập lại!',
                ], 403);
            }

            // Parse biến thể từ JSON
            $bienTheList = json_decode($request->bien_the, true);

            if (!is_array($bienTheList) || empty($bienTheList)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng thêm ít nhất một biến thể sản phẩm!',
                ], 400);
            }

            // Validate biến thể
            foreach ($bienTheList as $index => $bienThe) {
                if (empty($bienThe['size']) && empty($bienThe['mau_sac'])) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " phải có ít nhất size hoặc màu sắc!",
                    ], 400);
                }
                if (!isset($bienThe['so_luong']) || $bienThe['so_luong'] < 0) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " có số lượng không hợp lệ!",
                    ], 400);
                }
                if (!isset($bienThe['gia']) || $bienThe['gia'] < 0) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " có giá không hợp lệ!",
                    ], 400);
                }
            }

            // Tính giá cơ bản (giá thấp nhất trong các biến thể)
            $giaCoBan = min(array_column($bienTheList, 'gia'));

            // Tạo slug từ tên sản phẩm
            $slug = $this->createSlug($request->ten_san_pham, $request->slug_san_pham ?? null);

            // Tạo sản phẩm
            $sanPham = SanPham::create([
                'ten_san_pham' => $request->ten_san_pham,
                'slug_san_pham' => $slug,
                'mo_ta' => $request->mo_ta ?? '',
                'id_danh_muc' => $request->id_danh_muc,
                'id_nhan_vien' => $user->id,
                'gia_co_ban' => $giaCoBan,
                'tinh_trang' => $request->tinh_trang ?? 1,
                'trang_thai' => 1,
                'ngay_dang' => now(),
            ]);

            // Thêm các biến thể
            foreach ($bienTheList as $bienThe) {
                BienTheSanPham::create([
                    'id_san_pham' => $sanPham->id,
                    'size' => $bienThe['size'] ?? null,
                    'mau_sac' => $bienThe['mau_sac'] ?? null,
                    'so_luong' => $bienThe['so_luong'] ?? 0,
                    'gia' => $bienThe['gia'] ?? 0,
                ]);
            }

            // Lưu hình ảnh từ URLs
            if ($request->has('hinh_anh_urls')) {
                $imageUrls = json_decode($request->hinh_anh_urls, true);
                
                if (is_array($imageUrls) && !empty($imageUrls)) {
                    foreach ($imageUrls as $url) {
                        if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
                            HinhAnhSanPham::create([
                                'id_san_pham' => $sanPham->id,
                                'url' => $url,
                            ]);
                        }
                    }
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Thêm mới sản phẩm "' . $sanPham->ten_san_pham . '" thành công!',
                'data' => [
                    'id' => $sanPham->id,
                    'ten_san_pham' => $sanPham->ten_san_pham,
                    'id_nhan_vien' => $user->id,
                ],
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi thêm sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy danh sách sản phẩm với đầy đủ thông tin
     */
    public function list()
    {
        try {
            $sanPhams = DB::table('san_phams')
                ->leftJoin('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
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
                    'san_phams.tinh_trang',
                    'san_phams.ngay_dang',
                    'danh_mucs.id as id_danh_muc',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) as tong_so_luong'),
                    DB::raw('COUNT(DISTINCT bien_the_san_phams.id) as so_bien_the'),
                    DB::raw('MIN(bien_the_san_phams.gia) as gia_thap_nhat'),
                    DB::raw('MAX(bien_the_san_phams.gia) as gia_cao_nhat')
                )
                ->groupBy(
                    'san_phams.id',
                    'san_phams.slug_san_pham',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.tinh_trang',
                    'san_phams.ngay_dang',
                    'danh_mucs.id',
                    'danh_mucs.ten_danh_muc',
                    'hinh_anh_san_phams.url'
                )
                ->orderBy('san_phams.ngay_dang', 'desc')
                ->get();

            // Lấy thêm thông tin biến thể và hình ảnh cho mỗi sản phẩm
            foreach ($sanPhams as $sp) {
                // Lấy tất cả hình ảnh
                $hinhAnhs = DB::table('hinh_anh_san_phams')
                    ->where('id_san_pham', $sp->id)
                    ->pluck('url')
                    ->toArray();
                $sp->danh_sach_hinh_anh = $hinhAnhs;

                // Lấy các biến thể
                $bienThes = DB::table('bien_the_san_phams')
                    ->where('id_san_pham', $sp->id)
                    ->select('id', 'size', 'mau_sac', 'so_luong', 'gia')
                    ->get();
                $sp->bien_the = $bienThes;
            }

            return response()->json([
                'status' => true,
                'data' => $sanPhams
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy danh sách sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Xóa sản phẩm
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            
            if (!$id) {
                return response()->json([
                    'status' => false,
                    'message' => 'ID sản phẩm không hợp lệ!',
                ], 400);
            }

            // Xóa hình ảnh
            HinhAnhSanPham::where('id_san_pham', $id)->delete();
            
            // Xóa biến thể
            BienTheSanPham::where('id_san_pham', $id)->delete();
            
            // Xóa sản phẩm
            SanPham::where('id', $id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa sản phẩm thành công!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi xóa sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy dữ liệu sản phẩm (cho các chức năng khác)
     */
    public function getData(Request $request)
    {
        // Method này có thể được sử dụng cho các chức năng khác
        return $this->list();
    }

    /**
     * Tìm kiếm sản phẩm
     */
    public function search(Request $request)
    {
        try {
            $keyword = $request->noi_dung ?? '';
            
            $query = DB::table('san_phams')
                ->leftJoin('danh_mucs', 'danh_mucs.id', '=', 'san_phams.id_danh_muc')
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
                    'san_phams.tinh_trang',
                    'san_phams.ngay_dang',
                    'danh_mucs.id as id_danh_muc',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) as tong_so_luong'),
                    DB::raw('COUNT(DISTINCT bien_the_san_phams.id) as so_bien_the'),
                    DB::raw('MIN(bien_the_san_phams.gia) as gia_thap_nhat'),
                    DB::raw('MAX(bien_the_san_phams.gia) as gia_cao_nhat')
                )
                ->where(function($q) use ($keyword) {
                    $q->where('san_phams.ten_san_pham', 'like', '%' . $keyword . '%')
                      ->orWhere('danh_mucs.ten_danh_muc', 'like', '%' . $keyword . '%')
                      ->orWhere('san_phams.mo_ta', 'like', '%' . $keyword . '%');
                })
                ->groupBy(
                    'san_phams.id',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.tinh_trang',
                    'san_phams.ngay_dang',
                    'danh_mucs.id',
                    'danh_mucs.ten_danh_muc',
                    'hinh_anh_san_phams.url'
                )
                ->orderBy('san_phams.ngay_dang', 'desc')
                ->get();

            // Lấy thêm thông tin biến thể và hình ảnh
            foreach ($query as $sp) {
                $hinhAnhs = DB::table('hinh_anh_san_phams')
                    ->where('id_san_pham', $sp->id)
                    ->pluck('url')
                    ->toArray();
                $sp->danh_sach_hinh_anh = $hinhAnhs;

                $bienThes = DB::table('bien_the_san_phams')
                    ->where('id_san_pham', $sp->id)
                    ->select('id', 'size', 'mau_sac', 'so_luong', 'gia')
                    ->get();
                $sp->bien_the = $bienThes;
            }

            return response()->json([
                'status' => true,
                'data' => $query
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi tìm kiếm sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Cập nhật sản phẩm
     */
    public function update(Request $request)
    {
        try {
            // Lấy nhân viên từ token
            $user = Auth::guard('sanctum')->user();

            if (!$user || !$user instanceof \App\Models\NhanVien) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không xác thực được nhân viên. Vui lòng đăng nhập lại!',
                ], 403);
            }

            $id = $request->id;
            if (!$id) {
                return response()->json([
                    'status' => false,
                    'message' => 'ID sản phẩm không hợp lệ!',
                ], 400);
            }

            $sanPham = SanPham::find($id);
            if (!$sanPham) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sản phẩm không tồn tại!',
                ], 404);
            }

            // Parse biến thể từ JSON
            $bienTheList = json_decode($request->bien_the, true);

            if (!is_array($bienTheList) || empty($bienTheList)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng thêm ít nhất một biến thể sản phẩm!',
                ], 400);
            }

            // Validate biến thể
            foreach ($bienTheList as $index => $bienThe) {
                if (empty($bienThe['size']) && empty($bienThe['mau_sac'])) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " phải có ít nhất size hoặc màu sắc!",
                    ], 400);
                }
                if (!isset($bienThe['so_luong']) || $bienThe['so_luong'] < 0) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " có số lượng không hợp lệ!",
                    ], 400);
                }
                if (!isset($bienThe['gia']) || $bienThe['gia'] < 0) {
                    return response()->json([
                        'status' => false,
                        'message' => "Biến thể thứ " . ($index + 1) . " có giá không hợp lệ!",
                    ], 400);
                }
            }

            // Tính giá cơ bản (giá thấp nhất trong các biến thể)
            $giaCoBan = min(array_column($bienTheList, 'gia'));

            // Tạo slug mới nếu tên sản phẩm thay đổi hoặc có slug mới
            $slug = $sanPham->slug_san_pham;
            if ($request->ten_san_pham !== $sanPham->ten_san_pham || ($request->has('slug_san_pham') && $request->slug_san_pham)) {
                $slug = $this->createSlug($request->ten_san_pham, $request->slug_san_pham ?? null, $sanPham->id);
            }

            // Cập nhật thông tin sản phẩm
            $sanPham->update([
                'ten_san_pham' => $request->ten_san_pham,
                'slug_san_pham' => $slug,
                'mo_ta' => $request->mo_ta ?? '',
                'id_danh_muc' => $request->id_danh_muc,
                'gia_co_ban' => $giaCoBan,
                'tinh_trang' => $request->tinh_trang ?? $sanPham->tinh_trang,
            ]);

            // Xóa tất cả biến thể cũ và tạo lại
            BienTheSanPham::where('id_san_pham', $id)->delete();
            foreach ($bienTheList as $bienThe) {
                BienTheSanPham::create([
                    'id_san_pham' => $sanPham->id,
                    'size' => $bienThe['size'] ?? null,
                    'mau_sac' => $bienThe['mau_sac'] ?? null,
                    'so_luong' => $bienThe['so_luong'] ?? 0,
                    'gia' => $bienThe['gia'] ?? 0,
                ]);
            }

            // Xử lý hình ảnh từ URLs
            if ($request->has('hinh_anh_urls')) {
                $imageUrls = json_decode($request->hinh_anh_urls, true);
                
                if (is_array($imageUrls) && !empty($imageUrls)) {
                    // Xóa tất cả hình ảnh cũ
                    HinhAnhSanPham::where('id_san_pham', $id)->delete();
                    
                    // Thêm hình ảnh mới từ URLs
                    foreach ($imageUrls as $url) {
                        if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
                            HinhAnhSanPham::create([
                                'id_san_pham' => $sanPham->id,
                                'url' => $url,
                            ]);
                        }
                    }
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật sản phẩm "' . $sanPham->ten_san_pham . '" thành công!',
                'data' => [
                    'id' => $sanPham->id,
                    'ten_san_pham' => $sanPham->ten_san_pham,
                ],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Thay đổi trạng thái sản phẩm
     */
    public function changeStatus(Request $request)
    {
        try {
            $id = $request->id;
            $tinhTrang = $request->tinh_trang ?? 1;

            SanPham::where('id', $id)->update(['tinh_trang' => $tinhTrang]);

            return response()->json([
                'status' => true,
                'message' => 'Thay đổi trạng thái sản phẩm thành công!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi thay đổi trạng thái: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy dữ liệu sản phẩm mở (cho client)
     */
    public function getOpenData()
    {
        try {
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
                ->get();

            return response()->json([
                'status' => true,
                'data' => $sanPhams
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy sản phẩm bán chạy nhất (public API)
     */
    public function getBestSellingProducts(Request $request)
    {
        try {
            $limit = $request->input('limit', 6);
            
            $products = DB::table('don_hangs')
                ->join('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
                ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
                ->leftJoin('hinh_anh_san_phams', function($join) {
                    $join->on('hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
                         ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
                })
                ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.id_san_pham', '=', 'san_phams.id')
                ->where('don_hangs.trang_thai', '>=', 1)
                ->where('san_phams.tinh_trang', 1)
                ->where('san_phams.trang_thai', 1)
                ->select(
                    'san_phams.id',
                    'san_phams.slug_san_pham',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.id_danh_muc',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('COALESCE(SUM(bien_the_san_phams.so_luong), 0) as tong_sl_ton'),
                    DB::raw('SUM(don_hangs.so_luong) as tong_so_luong_ban')
                )
                ->groupBy(
                    'san_phams.id',
                    'san_phams.slug_san_pham',
                    'san_phams.ten_san_pham',
                    'san_phams.mo_ta',
                    'san_phams.gia_co_ban',
                    'san_phams.id_danh_muc',
                    'danh_mucs.ten_danh_muc',
                    'hinh_anh_san_phams.url'
                )
                ->orderBy('tong_so_luong_ban', 'desc')
                ->limit($limit)
                ->get();

            return response()->json([
                'status' => true,
                'data' => $products
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy sản phẩm bán chạy: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy hình ảnh sản phẩm
     */
    public function getHinhAnh(Request $request)
    {
        try {
            $hinhAnhs = DB::table('hinh_anh_san_phams')
                ->select('id', 'id_san_pham', 'url')
                ->get();

            return response()->json([
                'status' => true,
                'data' => $hinhAnhs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy hình ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lấy chi tiết hình ảnh
     */
    public function getChiTietHinhAnh(Request $request)
    {
        try {
            $idSanPham = $request->id_san_pham;
            
            $hinhAnhs = DB::table('hinh_anh_san_phams')
                ->where('id_san_pham', $idSanPham)
                ->select('id', 'id_san_pham', 'url')
                ->get();

            return response()->json([
                'status' => true,
                'data' => $hinhAnhs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy chi tiết hình ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Tạo hình ảnh mới
     */
    public function storeHinhAnh(Request $request)
    {
        try {
            if (!$request->hasFile('hinh_anh')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Vui lòng chọn hình ảnh!',
                ], 400);
            }

            $file = $request->file('hinh_anh');
            $path = $file->store('uploads/san_pham', 'public');

            $hinhAnh = HinhAnhSanPham::create([
                'id_san_pham' => $request->id_san_pham,
                'url' => '/storage/' . $path,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thêm hình ảnh thành công!',
                'data' => $hinhAnh
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi thêm hình ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Xóa hình ảnh
     */
    public function destroyHinhAnh(Request $request)
    {
        try {
            $id = $request->id;
            
            HinhAnhSanPham::where('id', $id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa hình ảnh thành công!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi xóa hình ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Tìm kiếm hình ảnh
     */
    public function searchHinhAnh(Request $request)
    {
        try {
            $keyword = $request->noi_dung ?? '';
            
            $hinhAnhs = DB::table('hinh_anh_san_phams')
                ->join('san_phams', 'san_phams.id', '=', 'hinh_anh_san_phams.id_san_pham')
                ->where('san_phams.ten_san_pham', 'like', '%' . $keyword . '%')
                ->select('hinh_anh_san_phams.id', 'hinh_anh_san_phams.id_san_pham', 'hinh_anh_san_phams.url')
                ->get();

            return response()->json([
                'status' => true,
                'data' => $hinhAnhs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi tìm kiếm hình ảnh: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Tạo slug từ tên sản phẩm
     */
    private function createSlug($tenSanPham, $slugCustom = null, $excludeId = null)
    {
        // Nếu có slug custom, sử dụng nó
        if ($slugCustom && !empty(trim($slugCustom))) {
            $slug = Str::slug(trim($slugCustom));
        } else {
            // Tạo slug từ tên sản phẩm
            $slug = Str::slug($tenSanPham);
        }

        // Kiểm tra slug trùng lặp
        $query = SanPham::where('slug_san_pham', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        
        $count = $query->count();
        
        // Nếu slug đã tồn tại, thêm số vào cuối
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        return $slug;
    }
}

