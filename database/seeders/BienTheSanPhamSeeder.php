<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BienTheSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bien_the_san_phams')->delete();
        DB::table('bien_the_san_phams')->truncate();

        // Tạo biến thể cho các sản phẩm (id_san_pham từ 1-14)
        $variants = [
            // Sản phẩm 1: Áo Thun Nike Classic
            ['id_san_pham' => 1, 'size' => 'S', 'mau_sac' => 'Đen', 'so_luong' => 50, 'gia' => 500000],
            ['id_san_pham' => 1, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 50, 'gia' => 500000],
            ['id_san_pham' => 1, 'size' => 'L', 'mau_sac' => 'Đen', 'so_luong' => 50, 'gia' => 500000],
            ['id_san_pham' => 1, 'size' => 'S', 'mau_sac' => 'Trắng', 'so_luong' => 50, 'gia' => 500000],
            ['id_san_pham' => 1, 'size' => 'M', 'mau_sac' => 'Trắng', 'so_luong' => 50, 'gia' => 500000],
            
            // Sản phẩm 2: Quần Jeans Adidas Slim Fit
            ['id_san_pham' => 2, 'size' => '28', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 750000],
            ['id_san_pham' => 2, 'size' => '30', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 750000],
            ['id_san_pham' => 2, 'size' => '32', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 750000],
            ['id_san_pham' => 2, 'size' => '28', 'mau_sac' => 'Đen', 'so_luong' => 30, 'gia' => 750000],
            
            // Sản phẩm 3: Áo Sơ Mi Zara Casual
            ['id_san_pham' => 3, 'size' => 'S', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 600000],
            ['id_san_pham' => 3, 'size' => 'M', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 600000],
            ['id_san_pham' => 3, 'size' => 'L', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 600000],
            ['id_san_pham' => 3, 'size' => 'M', 'mau_sac' => 'Xanh', 'so_luong' => 40, 'gia' => 600000],
            
            // Sản phẩm 4: Váy Dự Tiệc H&M Elegant
            ['id_san_pham' => 4, 'size' => 'S', 'mau_sac' => 'Đen', 'so_luong' => 20, 'gia' => 1200000],
            ['id_san_pham' => 4, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 20, 'gia' => 1200000],
            ['id_san_pham' => 4, 'size' => 'L', 'mau_sac' => 'Đen', 'so_luong' => 20, 'gia' => 1200000],
            ['id_san_pham' => 4, 'size' => 'M', 'mau_sac' => 'Đỏ', 'so_luong' => 15, 'gia' => 1200000],
            
            // Sản phẩm 5: Áo Khoác Uniqlo Ultralight
            ['id_san_pham' => 5, 'size' => 'S', 'mau_sac' => 'Xám', 'so_luong' => 35, 'gia' => 800000],
            ['id_san_pham' => 5, 'size' => 'M', 'mau_sac' => 'Xám', 'so_luong' => 35, 'gia' => 800000],
            ['id_san_pham' => 5, 'size' => 'L', 'mau_sac' => 'Xám', 'so_luong' => 35, 'gia' => 800000],
            ['id_san_pham' => 5, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 35, 'gia' => 800000],
            
            // Sản phẩm 6: Áo Thun Nike Pro Dri-FIT
            ['id_san_pham' => 6, 'size' => 'S', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 550000],
            ['id_san_pham' => 6, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 550000],
            ['id_san_pham' => 6, 'size' => 'L', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 550000],
            
            // Sản phẩm 7: Áo Thun Adidas Aeroready
            ['id_san_pham' => 7, 'size' => 'S', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 480000],
            ['id_san_pham' => 7, 'size' => 'M', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 480000],
            ['id_san_pham' => 7, 'size' => 'L', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 480000],
            
            // Sản phẩm 8: Áo Sơ Mi Zara Slim Fit
            ['id_san_pham' => 8, 'size' => 'S', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 700000],
            ['id_san_pham' => 8, 'size' => 'M', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 700000],
            ['id_san_pham' => 8, 'size' => 'L', 'mau_sac' => 'Trắng', 'so_luong' => 40, 'gia' => 700000],
            
            // Sản phẩm 9: Áo Khoác H&M Bomber
            ['id_san_pham' => 9, 'size' => 'S', 'mau_sac' => 'Đen', 'so_luong' => 25, 'gia' => 1200000],
            ['id_san_pham' => 9, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 25, 'gia' => 1200000],
            ['id_san_pham' => 9, 'size' => 'L', 'mau_sac' => 'Đen', 'so_luong' => 25, 'gia' => 1200000],
            
            // Sản phẩm 10: Quần Jeans Uniqlo Stretch
            ['id_san_pham' => 10, 'size' => '28', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 900000],
            ['id_san_pham' => 10, 'size' => '30', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 900000],
            ['id_san_pham' => 10, 'size' => '32', 'mau_sac' => 'Xanh', 'so_luong' => 30, 'gia' => 900000],
            
            // Sản phẩm 11: Áo Thun Adidas Essentials
            ['id_san_pham' => 11, 'size' => 'S', 'mau_sac' => 'Trắng', 'so_luong' => 50, 'gia' => 420000],
            ['id_san_pham' => 11, 'size' => 'M', 'mau_sac' => 'Trắng', 'so_luong' => 50, 'gia' => 420000],
            ['id_san_pham' => 11, 'size' => 'L', 'mau_sac' => 'Trắng', 'so_luong' => 50, 'gia' => 420000],
            
            // Sản phẩm 12: Áo Thun Adidas Superstar
            ['id_san_pham' => 12, 'size' => 'S', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 470000],
            ['id_san_pham' => 12, 'size' => 'M', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 470000],
            ['id_san_pham' => 12, 'size' => 'L', 'mau_sac' => 'Đen', 'so_luong' => 45, 'gia' => 470000],
            
            // Sản phẩm 13: Áo Thun Adidas ID
            ['id_san_pham' => 13, 'size' => 'S', 'mau_sac' => 'Xám', 'so_luong' => 40, 'gia' => 460000],
            ['id_san_pham' => 13, 'size' => 'M', 'mau_sac' => 'Xám', 'so_luong' => 40, 'gia' => 460000],
            ['id_san_pham' => 13, 'size' => 'L', 'mau_sac' => 'Xám', 'so_luong' => 40, 'gia' => 460000],
            
            // Sản phẩm 14: Áo Thun Adidas Ultimate
            ['id_san_pham' => 14, 'size' => 'S', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 490000],
            ['id_san_pham' => 14, 'size' => 'M', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 490000],
            ['id_san_pham' => 14, 'size' => 'L', 'mau_sac' => 'Xanh', 'so_luong' => 50, 'gia' => 490000],
        ];

        DB::table('bien_the_san_phams')->insert($variants);
    }
}

