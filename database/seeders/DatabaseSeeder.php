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
            DanhMucSeeder::class,
            ThuongHieuSeeder::class,
            SanPhamSeeder::class,
            BienTheSanPhamSeeder::class,
            KhachHangSeeder::class,
            HinhAnhSanPhamSeeder::class,
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            TinhThanhSeeder::class,
            QuanHuyenSeeder::class,
            PhuongXaSeeder::class,
        ]);

    }
}
