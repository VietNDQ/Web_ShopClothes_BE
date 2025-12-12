<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonHangThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách khách hàng và sản phẩm
        $khachHangs = DB::table('khach_hangs')->pluck('id')->toArray();
        $sanPhams = DB::table('san_phams')->pluck('id')->toArray();
        $diaChis = DB::table('dia_chis')->pluck('id')->toArray();

        if (empty($khachHangs) || empty($sanPhams)) {
            $this->command->warn('Không có khách hàng hoặc sản phẩm để tạo đơn hàng!');
            return;
        }

        $trangThaiLabels = [
            1 => 'Chờ xác nhận',
            2 => 'Đã chuẩn bị hàng',
            3 => 'Đang giao hàng',
            4 => 'Giao hàng thành công',
            5 => 'Giao hàng thất bại',
        ];

        $phuongThucThanhToan = [0, 1]; // 0: COD, 1: Chuyển khoản

        // Xóa dữ liệu cũ nếu có (tùy chọn - comment nếu muốn giữ lại)
        // DB::table('thanh_toans')->where('ma_don_hang', 'LIKE', 'DH-%')->delete();
        // DB::table('don_hangs')->where('ma_don_hang', 'LIKE', 'DH-%')->delete();
        
        // Tạo đơn hàng cho 12 tháng gần nhất
        for ($month = 11; $month >= 0; $month--) {
            $monthDate = Carbon::now()->subMonths($month);
            $daysInMonth = $monthDate->daysInMonth;
            
            // Mỗi tháng tạo 30-80 đơn hàng (tăng số lượng để có nhiều dữ liệu thống kê hơn)
            $soDonHangTrongThang = rand(30, 80);
            
            for ($i = 0; $i < $soDonHangTrongThang; $i++) {
                // Chọn ngày ngẫu nhiên trong tháng
                $ngayTrongThang = rand(1, $daysInMonth);
                $createdAt = $monthDate->copy()->day($ngayTrongThang)
                    ->hour(rand(8, 20))
                    ->minute(rand(0, 59))
                    ->second(rand(0, 59));

                // Chọn khách hàng ngẫu nhiên
                $idKhachHang = $khachHangs[array_rand($khachHangs)];
                
                // Chọn địa chỉ của khách hàng hoặc tạo mới
                $diaChiKhachHang = DB::table('dia_chis')
                    ->where('id_khach_hang', $idKhachHang)
                    ->pluck('id')
                    ->toArray();
                
                $idDiaChi = !empty($diaChiKhachHang) 
                    ? $diaChiKhachHang[array_rand($diaChiKhachHang)]
                    : (!empty($diaChis) ? $diaChis[array_rand($diaChis)] : null);

                // Tạo mã đơn hàng
                $maDonHang = 'DH-' . strtoupper(Str::random(8)) . '-' . $createdAt->format('Ymd');

                // Chọn trạng thái đơn hàng (tỷ lệ: nhiều đơn thành công hơn)
                $trangThai = $this->getRandomTrangThai();

                // Tạo 1-5 sản phẩm cho mỗi đơn hàng
                $soSanPhamTrongDon = rand(1, 5);
                $tongTien = 0;
                $idDonHangDau = null;

                for ($j = 0; $j < $soSanPhamTrongDon; $j++) {
                    // Chọn sản phẩm ngẫu nhiên
                    $idSanPham = $sanPhams[array_rand($sanPhams)];
                    
                    // Lấy biến thể của sản phẩm
                    $bienThe = DB::table('bien_the_san_phams')
                        ->where('id_san_pham', $idSanPham)
                        ->where('so_luong', '>', 0)
                        ->inRandomOrder()
                        ->first();

                    if (!$bienThe) {
                        continue; // Bỏ qua nếu không có biến thể
                    }

                    $soLuong = rand(1, min(3, $bienThe->so_luong));
                    $donGia = $bienThe->gia;
                    $tongTienSanPham = $soLuong * $donGia;
                    $tongTien += $tongTienSanPham;

                    // Tạo đơn hàng
                    $donHangId = DB::table('don_hangs')->insertGetId([
                        'id_khach_hang' => $idKhachHang,
                        'ma_don_hang' => $maDonHang,
                        'id_san_pham' => $idSanPham,
                        'so_luong' => $soLuong,
                        'don_gia' => $donGia,
                        'tong_tien' => $tongTienSanPham,
                        'kich_thuoc' => $bienThe->size ?? 'Không có',
                        'mau_sac' => $bienThe->mau_sac ?? 'Không có',
                        'ghi_chu' => rand(0, 10) > 8 ? 'Giao hàng nhanh' : null,
                        'trang_thai' => $trangThai,
                        'id_nhan_vien' => null,
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt,
                    ]);

                    if ($j === 0) {
                        $idDonHangDau = $donHangId;
                    }

                    // Cập nhật số lượng tồn kho (giảm đi)
                    DB::table('bien_the_san_phams')
                        ->where('id', $bienThe->id)
                        ->decrement('so_luong', $soLuong);
                }

                // Tạo thanh toán nếu có đơn hàng
                if ($idDonHangDau && $tongTien > 0) {
                    $phuongThuc = $phuongThucThanhToan[array_rand($phuongThucThanhToan)];
                    
                    // Nếu đơn hàng thành công (trạng thái 4) thì đã thanh toán
                    $isThanhToan = ($trangThai == 4) ? 1 : ($phuongThuc == 1 ? 1 : 0);
                    
                    // Ngày thanh toán: nếu đã thanh toán thì sau ngày tạo đơn 1-3 ngày
                    $ngayThanhToan = $isThanhToan 
                        ? $createdAt->copy()->addDays(rand(1, 3))
                        : null;

                    DB::table('thanh_toans')->insert([
                        'ma_don_hang' => $maDonHang,
                        'id_khach_hang' => $idKhachHang,
                        'id_don_hang' => $idDonHangDau,
                        'id_dia_chi_giao_hang' => $idDiaChi,
                        'tong_tien' => $tongTien,
                        'phuong_thuc_thanh_toan' => $phuongThuc,
                        'ghi_chu' => rand(0, 10) > 7 ? 'Giao hàng tận nơi' : null,
                        'hash_thanh_toan' => null,
                        'is_thanh_toan' => $isThanhToan,
                        'ngay_thanh_toan' => $ngayThanhToan,
                        'created_at' => $createdAt,
                        'updated_at' => $ngayThanhToan ?? $createdAt,
                    ]);
                }
            }
        }

        $this->command->info('Đã tạo dữ liệu đơn hàng và thanh toán thành công!');
    }

    /**
     * Lấy trạng thái ngẫu nhiên với tỷ lệ hợp lý
     */
    private function getRandomTrangThai()
    {
        $weights = [
            1 => 10, // Chờ xác nhận
            2 => 5,  // Đã chuẩn bị hàng
            3 => 5,  // Đang giao hàng
            4 => 70, // Giao hàng thành công (nhiều nhất)
            5 => 10, // Giao hàng thất bại
        ];

        $totalWeight = array_sum($weights);
        $random = rand(1, $totalWeight);
        $current = 0;

        foreach ($weights as $trangThai => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $trangThai;
            }
        }

        return 4; // Mặc định thành công
    }
}
