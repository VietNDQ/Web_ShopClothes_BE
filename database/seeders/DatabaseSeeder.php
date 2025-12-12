<?php

namespace Database\Seeders;

use App\Models\ChucVu;
use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
use App\Models\NhanVien;
use App\Models\PhuongXa;
use App\Models\ThuongHieu;
use App\Models\TinhThanh;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1. Các bảng không phụ thuộc
            DanhMucSeeder::class,
            ChucVuSeeder::class,
            ChucNangSeeder::class,
            TinhThanhSeeder::class,
            KhachHangSeeder::class,
            
            // 2. Các bảng phụ thuộc level 1
            NhanVienSeeder::class,        // cần ChucVu
            QuanHuyenSeeder::class,       // cần TinhThanh
            
            // 3. Các bảng phụ thuộc level 2
            PhuongXaSeeder::class,        // cần QuanHuyen
            SanPhamSeeder::class,         // cần DanhMuc và NhanVien
            
            // 4. Các bảng phụ thuộc level 3
            BienTheSanPhamSeeder::class,  // cần SanPham
            HinhAnhSanPhamSeeder::class,  // cần SanPham
            DiaChiSeeder::class,          // cần KhachHang, TinhThanh, QuanHuyen, PhuongXa
            
            // 5. Các bảng phụ thuộc level 4
            DonHangSeeder::class,         // cần KhachHang, SanPham, NhanVien
            
            // 6. Các bảng phụ thuộc level 5
            ThanhToanSeeder::class,        // cần DonHang, KhachHang, DiaChi
            ChiTietPhanQuyenSeeder::class, // cần ChucNang, ChucVu
            
            // 7. Seeder dữ liệu thống kê (tạo đơn hàng và thanh toán cho 12 tháng)
            DonHangThanhToanSeeder::class,
            
            // 8. Seeder voucher
            VoucherSeeder::class
        ]);

    }
}
