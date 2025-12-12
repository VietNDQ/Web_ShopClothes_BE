<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\ThanhToan;
use App\Models\SanPham;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    /**
     * Lấy tổng quan thống kê (dashboard)
     */
    public function getTongQuan(Request $request)
    {
        $id_chuc_nang = 71; // Xem thống kê tổng quan
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $today = Carbon::today();
            $thisMonth = Carbon::now()->startOfMonth();
            $lastMonth = Carbon::now()->subMonth()->startOfMonth();
            $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
            $thisYear = Carbon::now()->startOfYear();

            // Tổng doanh thu
            $tongDoanhThu = ThanhToan::where('is_thanh_toan', 1)
                ->where('thanh_toans.created_at', '>=', $thisYear)
                ->sum('tong_tien');

            // Doanh thu hôm nay
            $doanhThuHomNay = ThanhToan::where('is_thanh_toan', 1)
                ->whereDate('thanh_toans.created_at', $today)
                ->sum('tong_tien');

            // Doanh thu tháng này
            $doanhThuThangNay = ThanhToan::where('is_thanh_toan', 1)
                ->where('thanh_toans.created_at', '>=', $thisMonth)
                ->sum('tong_tien');

            // Doanh thu tháng trước
            $doanhThuThangTruoc = ThanhToan::where('is_thanh_toan', 1)
                ->whereBetween('thanh_toans.created_at', [$lastMonth, $lastMonthEnd])
                ->sum('tong_tien');

            // Tổng số đơn hàng
            $tongDonHang = DonHang::where('trang_thai', '>=', 1)
                ->where('created_at', '>=', $thisYear)
                ->distinct('ma_don_hang')
                ->count(DB::raw('DISTINCT ma_don_hang'));

            // Đơn hàng hôm nay
            $donHangHomNay = DonHang::where('trang_thai', '>=', 1)
                ->whereDate('created_at', $today)
                ->distinct('ma_don_hang')
                ->count(DB::raw('DISTINCT ma_don_hang'));

            // Đơn hàng tháng này
            $donHangThangNay = DonHang::where('trang_thai', '>=', 1)
                ->where('created_at', '>=', $thisMonth)
                ->distinct('ma_don_hang')
                ->count(DB::raw('DISTINCT ma_don_hang'));

            // Tổng số khách hàng
            $tongKhachHang = KhachHang::where('created_at', '>=', $thisYear)->count();

            // Khách hàng mới hôm nay
            $khachHangHomNay = KhachHang::whereDate('created_at', $today)->count();

            // Khách hàng mới tháng này
            $khachHangThangNay = KhachHang::where('created_at', '>=', $thisMonth)->count();

            // Tổng số sản phẩm
            $tongSanPham = SanPham::where('trang_thai', 1)->count();

            // Sản phẩm đã bán (tổng số lượng)
            $sanPhamDaBan = DonHang::where('trang_thai', '>=', 1)
                ->where('created_at', '>=', $thisYear)
                ->sum('so_luong');

            // Tính phần trăm tăng trưởng
            $tangTruongDoanhThu = $doanhThuThangTruoc > 0 
                ? round((($doanhThuThangNay - $doanhThuThangTruoc) / $doanhThuThangTruoc) * 100, 2)
                : ($doanhThuThangNay > 0 ? 100 : 0);

            $tangTruongDonHang = DonHang::where('trang_thai', '>=', 1)
                ->whereBetween('created_at', [$lastMonth, $lastMonthEnd])
                ->distinct('ma_don_hang')
                ->count(DB::raw('DISTINCT ma_don_hang'));
            
            $tangTruongDonHangPercent = $tangTruongDonHang > 0
                ? round((($donHangThangNay - $tangTruongDonHang) / $tangTruongDonHang) * 100, 2)
                : ($donHangThangNay > 0 ? 100 : 0);

            return response()->json([
                'status' => true,
                'data' => [
                    'doanh_thu' => [
                        'tong' => (float)$tongDoanhThu,
                        'hom_nay' => (float)$doanhThuHomNay,
                        'thang_nay' => (float)$doanhThuThangNay,
                        'thang_truoc' => (float)$doanhThuThangTruoc,
                        'tang_truong' => $tangTruongDoanhThu,
                    ],
                    'don_hang' => [
                        'tong' => $tongDonHang,
                        'hom_nay' => $donHangHomNay,
                        'thang_nay' => $donHangThangNay,
                        'tang_truong' => $tangTruongDonHangPercent,
                    ],
                    'khach_hang' => [
                        'tong' => $tongKhachHang,
                        'hom_nay' => $khachHangHomNay,
                        'thang_nay' => $khachHangThangNay,
                    ],
                    'san_pham' => [
                        'tong' => $tongSanPham,
                        'da_ban' => (int)$sanPhamDaBan,
                    ],
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu thống kê: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Thống kê doanh thu theo thời gian
     */
    public function getDoanhThuTheoThoiGian(Request $request)
    {
        $id_chuc_nang = 72; // Xem thống kê doanh thu
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $type = $request->input('type', 'month'); // day, week, month, year
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = ThanhToan::where('is_thanh_toan', 1);

            if ($startDate && $endDate) {
                $query->whereBetween('thanh_toans.created_at', [$startDate, $endDate]);
            } else {
                // Mặc định: 12 tháng gần nhất
                $query->where('thanh_toans.created_at', '>=', Carbon::now()->subMonths(12));
            }

            $data = [];
            
            if ($type === 'day') {
                // Theo ngày (30 ngày gần nhất)
                $start = Carbon::now()->subDays(30);
                $query->where('thanh_toans.created_at', '>=', $start);
                
                for ($i = 0; $i < 30; $i++) {
                    $date = $start->copy()->addDays($i);
                    $doanhThu = ThanhToan::where('is_thanh_toan', 1)
                        ->whereDate('thanh_toans.created_at', $date)
                        ->sum('tong_tien');
                    
                    $data[] = [
                        'label' => $date->format('d/m'),
                        'value' => (float)$doanhThu,
                        'date' => $date->format('Y-m-d'),
                    ];
                }
            } elseif ($type === 'week') {
                // Theo tuần (12 tuần gần nhất)
                for ($i = 11; $i >= 0; $i--) {
                    $weekStart = Carbon::now()->subWeeks($i)->startOfWeek();
                    $weekEnd = Carbon::now()->subWeeks($i)->endOfWeek();
                    
                    $doanhThu = ThanhToan::where('is_thanh_toan', 1)
                        ->whereBetween('thanh_toans.created_at', [$weekStart, $weekEnd])
                        ->sum('tong_tien');
                    
                    $data[] = [
                        'label' => 'Tuần ' . $weekStart->format('d/m'),
                        'value' => (float)$doanhThu,
                        'start_date' => $weekStart->format('Y-m-d'),
                        'end_date' => $weekEnd->format('Y-m-d'),
                    ];
                }
            } elseif ($type === 'month') {
                // Theo tháng (12 tháng gần nhất)
                for ($i = 11; $i >= 0; $i--) {
                    $month = Carbon::now()->subMonths($i);
                    $monthStart = $month->copy()->startOfMonth();
                    $monthEnd = $month->copy()->endOfMonth();
                    
                    $doanhThu = ThanhToan::where('is_thanh_toan', 1)
                        ->whereBetween('thanh_toans.created_at', [$monthStart, $monthEnd])
                        ->sum('tong_tien');
                    
                    $data[] = [
                        'label' => $month->format('m/Y'),
                        'value' => (float)$doanhThu,
                        'month' => $month->format('Y-m'),
                    ];
                }
            } elseif ($type === 'year') {
                // Theo năm (5 năm gần nhất)
                for ($i = 4; $i >= 0; $i--) {
                    $year = Carbon::now()->subYears($i)->year;
                    $yearStart = Carbon::create($year, 1, 1)->startOfYear();
                    $yearEnd = Carbon::create($year, 12, 31)->endOfYear();
                    
                    $doanhThu = ThanhToan::where('is_thanh_toan', 1)
                        ->whereBetween('thanh_toans.created_at', [$yearStart, $yearEnd])
                        ->sum('tong_tien');
                    
                    $data[] = [
                        'label' => $year,
                        'value' => (float)$doanhThu,
                        'year' => $year,
                    ];
                }
            }

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu doanh thu: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Thống kê đơn hàng theo trạng thái
     */
    public function getDonHangTheoTrangThai()
    {
        $id_chuc_nang = 73; // Xem thống kê đơn hàng
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $data = [];
            
            // Đếm đơn hàng theo từng trạng thái
            for ($i = 1; $i <= 5; $i++) {
                $count = DonHang::where('trang_thai', $i)
                    ->distinct('ma_don_hang')
                    ->count(DB::raw('DISTINCT ma_don_hang'));
                
                $trangThaiLabels = [
                    1 => 'Chờ xác nhận',
                    2 => 'Đã chuẩn bị hàng',
                    3 => 'Đang giao hàng',
                    4 => 'Giao hàng thành công',
                    5 => 'Giao hàng thất bại',
                ];
                
                $data[] = [
                    'trang_thai' => $i,
                    'ten_trang_thai' => $trangThaiLabels[$i] ?? 'Không xác định',
                    'so_luong' => $count,
                ];
            }

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu đơn hàng: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Top sản phẩm bán chạy
     */
    public function getTopSanPhamBanChay(Request $request)
    {
        $id_chuc_nang = 74; // Xem thống kê sản phẩm bán chạy
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $limit = $request->input('limit', 10);
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = DonHang::join('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
                ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
                ->leftJoin('hinh_anh_san_phams', function($join) {
                    $join->on('hinh_anh_san_phams.id_san_pham', '=', 'san_phams.id')
                         ->whereRaw('hinh_anh_san_phams.id = (SELECT MIN(id) FROM hinh_anh_san_phams WHERE id_san_pham = san_phams.id)');
                })
                ->where('don_hangs.trang_thai', '>=', 1)
                ->select(
                    'san_phams.id',
                    'san_phams.ten_san_pham',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COALESCE(hinh_anh_san_phams.url, "") as hinh_anh'),
                    DB::raw('SUM(don_hangs.so_luong) as tong_so_luong_ban'),
                    DB::raw('SUM(don_hangs.tong_tien) as tong_doanh_thu')
                )
                ->groupBy(
                    'san_phams.id',
                    'san_phams.ten_san_pham',
                    'danh_mucs.ten_danh_muc',
                    'hinh_anh_san_phams.url'
                )
                ->orderBy('tong_so_luong_ban', 'desc');

            if ($startDate && $endDate) {
                $query->whereBetween('don_hangs.created_at', [$startDate, $endDate]);
            } else {
                // Mặc định: 30 ngày gần nhất
                $query->where('don_hangs.created_at', '>=', Carbon::now()->subDays(30));
            }

            $data = $query->limit($limit)->get();

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu sản phẩm bán chạy: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Thống kê khách hàng mới theo thời gian
     */
    public function getKhachHangMoiTheoThoiGian(Request $request)
    {
        $id_chuc_nang = 75; // Xem thống kê khách hàng
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $type = $request->input('type', 'month'); // day, week, month
            
            $data = [];
            
            if ($type === 'day') {
                // 30 ngày gần nhất
                $start = Carbon::now()->subDays(30);
                for ($i = 0; $i < 30; $i++) {
                    $date = $start->copy()->addDays($i);
                    $count = KhachHang::whereDate('created_at', $date)->count();
                    
                    $data[] = [
                        'label' => $date->format('d/m'),
                        'value' => $count,
                        'date' => $date->format('Y-m-d'),
                    ];
                }
            } elseif ($type === 'week') {
                // 12 tuần gần nhất
                for ($i = 11; $i >= 0; $i--) {
                    $weekStart = Carbon::now()->subWeeks($i)->startOfWeek();
                    $weekEnd = Carbon::now()->subWeeks($i)->endOfWeek();
                    
                    $count = KhachHang::whereBetween('created_at', [$weekStart, $weekEnd])->count();
                    
                    $data[] = [
                        'label' => 'Tuần ' . $weekStart->format('d/m'),
                        'value' => $count,
                        'start_date' => $weekStart->format('Y-m-d'),
                        'end_date' => $weekEnd->format('Y-m-d'),
                    ];
                }
            } else {
                // 12 tháng gần nhất
                for ($i = 11; $i >= 0; $i--) {
                    $month = Carbon::now()->subMonths($i);
                    $monthStart = $month->copy()->startOfMonth();
                    $monthEnd = $month->copy()->endOfMonth();
                    
                    $count = KhachHang::whereBetween('created_at', [$monthStart, $monthEnd])->count();
                    
                    $data[] = [
                        'label' => $month->format('m/Y'),
                        'value' => $count,
                        'month' => $month->format('Y-m'),
                    ];
                }
            }

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu khách hàng: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Thống kê theo danh mục sản phẩm
     */
    public function getThongKeTheoDanhMuc(Request $request)
    {
        $id_chuc_nang = 76; // Xem thống kê theo danh mục
        $chuc_vu = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check = PhanQuyen::where('id_chuc_vu', $chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền thực hiện chức năng này!'
            ], 403);
        }

        try {
            $limit = $request->input('limit', 10);
            
            $query = DB::table('don_hangs')
                ->join('san_phams', 'don_hangs.id_san_pham', '=', 'san_phams.id')
                ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
                ->where('don_hangs.trang_thai', '>=', 1)
                ->select(
                    'danh_mucs.id',
                    'danh_mucs.ten_danh_muc',
                    DB::raw('COUNT(DISTINCT don_hangs.ma_don_hang) as so_don_hang'),
                    DB::raw('SUM(don_hangs.so_luong) as tong_so_luong_ban'),
                    DB::raw('SUM(don_hangs.tong_tien) as tong_doanh_thu')
                )
                ->groupBy('danh_mucs.id', 'danh_mucs.ten_danh_muc')
                ->orderBy('tong_doanh_thu', 'desc');
            
            if ($limit > 0) {
                $query->limit($limit);
            }
            
            $data = $query->get();

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lỗi khi lấy dữ liệu thống kê danh mục: ' . $e->getMessage()
            ], 500);
        }
    }
}
