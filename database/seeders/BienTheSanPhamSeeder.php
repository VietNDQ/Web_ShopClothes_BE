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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('bien_the_san_phams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $variants = [];

        // Hàm helper để tạo biến thể cho áo/quần
        $createClothingVariants = function($productId, $basePrice, $sizes, $colors, $quantities = [50, 50, 50, 50]) use (&$variants) {
            foreach ($sizes as $sizeIndex => $size) {
                foreach ($colors as $colorIndex => $color) {
                    $qty = $quantities[$sizeIndex % count($quantities)] ?? 50;
                    $variants[] = [
                        'id_san_pham' => $productId,
                        'size' => $size,
                        'mau_sac' => $color,
                        'so_luong' => $qty,
                        'gia' => $basePrice,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        };

        // Hàm helper để tạo biến thể cho giày
        $createShoeVariants = function($productId, $basePrice, $sizes, $colors, $quantities = [30, 30, 30, 30, 30, 30]) use (&$variants) {
            foreach ($sizes as $sizeIndex => $size) {
                foreach ($colors as $colorIndex => $color) {
                    $qty = $quantities[$sizeIndex % count($quantities)] ?? 30;
                    $variants[] = [
                        'id_san_pham' => $productId,
                        'size' => $size,
                        'mau_sac' => $color,
                        'so_luong' => $qty,
                        'gia' => $basePrice,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        };

        // Hàm helper để tạo biến thể cho mũ (free size)
        $createHatVariants = function($productId, $basePrice, $colors) use (&$variants) {
            foreach ($colors as $color) {
                $variants[] = [
                    'id_san_pham' => $productId,
                    'size' => 'Free Size',
                    'mau_sac' => $color,
                    'so_luong' => 50,
                    'gia' => $basePrice,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        };

        // ÁO THUN (Sản phẩm 1-15)
        $aoThunSizes = ['S', 'M', 'L', 'XL'];
        $aoThunColors = ['Đen', 'Trắng', 'Xanh', 'Xám'];
        
        for ($i = 1; $i <= 15; $i++) {
            $basePrice = [500000, 450000, 680000, 380000, 350000, 420000, 550000, 750000, 620000, 480000, 440000, 1200000, 1100000, 1500000, 950000][$i - 1];
            $createClothingVariants($i, $basePrice, $aoThunSizes, $aoThunColors);
        }

        // ÁO SƠ MI (Sản phẩm 16-25)
        $aoSoMiSizes = ['S', 'M', 'L', 'XL'];
        $aoSoMiColors = ['Trắng', 'Xanh', 'Xám', 'Hồng'];
        
        for ($i = 16; $i <= 25; $i++) {
            $basePrice = [650000, 580000, 720000, 1800000, 550000, 520000, 1500000, 1300000, 480000, 590000][$i - 16];
            $createClothingVariants($i, $basePrice, $aoSoMiSizes, $aoSoMiColors);
        }

        // ÁO KHOÁC (Sản phẩm 26-33)
        $aoKhoacSizes = ['S', 'M', 'L', 'XL'];
        $aoKhoacColors = ['Đen', 'Xám', 'Xanh', 'Nâu'];
        
        for ($i = 26; $i <= 33; $i++) {
            $basePrice = [2200000, 1800000, 8500000, 3200000, 1500000, 2800000, 1200000, 1900000][$i - 26];
            $createClothingVariants($i, $basePrice, $aoKhoacSizes, $aoKhoacColors, [25, 25, 25, 25]);
        }

        // QUẦN JEANS (Sản phẩm 34-41)
        $quanJeansSizes = ['28', '30', '32', '34'];
        $quanJeansColors = ['Xanh', 'Đen', 'Xám'];
        
        for ($i = 34; $i <= 41; $i++) {
            $basePrice = [2500000, 1800000, 1200000, 950000, 1100000, 980000, 1500000, 850000][$i - 34];
            $createClothingVariants($i, $basePrice, $quanJeansSizes, $quanJeansColors, [30, 30, 30, 30]);
        }

        // QUẦN KAKI (Sản phẩm 42-46)
        $quanKakiSizes = ['28', '30', '32', '34'];
        $quanKakiColors = ['Be', 'Xám', 'Xanh'];
        
        for ($i = 42; $i <= 46; $i++) {
            $basePrice = [890000, 750000, 1100000, 1300000, 680000][$i - 42];
            $createClothingVariants($i, $basePrice, $quanKakiSizes, $quanKakiColors, [35, 35, 35, 35]);
        }

        // QUẦN SHORT (Sản phẩm 47-51)
        $quanShortSizes = ['S', 'M', 'L', 'XL'];
        $quanShortColors = ['Đen', 'Xám', 'Xanh'];
        
        for ($i = 47; $i <= 51; $i++) {
            $basePrice = [650000, 580000, 450000, 420000, 550000][$i - 47];
            $createClothingVariants($i, $basePrice, $quanShortSizes, $quanShortColors, [40, 40, 40, 40]);
        }

        // VÁY & ĐẦM (Sản phẩm 52-57)
        $vayDamSizes = ['S', 'M', 'L'];
        $vayDamColors = ['Đen', 'Trắng', 'Đỏ', 'Hồng'];
        
        for ($i = 52; $i <= 57; $i++) {
            $basePrice = [850000, 1200000, 1800000, 2200000, 1500000, 3500000][$i - 52];
            $createClothingVariants($i, $basePrice, $vayDamSizes, $vayDamColors, [20, 20, 20]);
        }

        // GIÀY THỂ THAO (Sản phẩm 58-65)
        $giayTheThaoSizes = ['38', '39', '40', '41', '42', '43'];
        $giayTheThaoColors = ['Đen', 'Trắng', 'Xanh'];
        
        for ($i = 58; $i <= 65; $i++) {
            $basePrice = [3500000, 4200000, 2800000, 2500000, 2200000, 1800000, 1500000, 3200000][$i - 58];
            $createShoeVariants($i, $basePrice, $giayTheThaoSizes, $giayTheThaoColors, [25, 25, 25, 25, 25, 25]);
        }

        // GIÀY SNEAKER (Sản phẩm 66-70)
        $giaySneakerSizes = ['38', '39', '40', '41', '42', '43'];
        $giaySneakerColors = ['Đen', 'Trắng', 'Xám'];
        
        for ($i = 66; $i <= 70; $i++) {
            $basePrice = [3800000, 2500000, 2200000, 2800000, 3000000][$i - 66];
            $createShoeVariants($i, $basePrice, $giaySneakerSizes, $giaySneakerColors, [30, 30, 30, 30, 30, 30]);
        }

        // GIÀY TÂY (Sản phẩm 71-74)
        $giayTaySizes = ['39', '40', '41', '42', '43'];
        $giayTayColors = ['Đen', 'Nâu'];
        
        for ($i = 71; $i <= 74; $i++) {
            $basePrice = [2800000, 4500000, 3800000, 1200000][$i - 71];
            $createShoeVariants($i, $basePrice, $giayTaySizes, $giayTayColors, [20, 20, 20, 20, 20]);
        }

        // GIÀY CAO GÓT (Sản phẩm 75-78)
        $giayCaoGotSizes = ['36', '37', '38', '39'];
        $giayCaoGotColors = ['Đen', 'Nâu', 'Đỏ'];
        
        for ($i = 75; $i <= 78; $i++) {
            $basePrice = [1500000, 2200000, 980000, 3500000][$i - 75];
            $createShoeVariants($i, $basePrice, $giayCaoGotSizes, $giayCaoGotColors, [15, 15, 15, 15]);
        }

        // DÉP & SANDAL (Sản phẩm 79-82)
        $depSandalSizes = ['38', '39', '40', '41', '42'];
        $depSandalColors = ['Đen', 'Nâu', 'Xanh'];
        
        for ($i = 79; $i <= 82; $i++) {
            $basePrice = [650000, 580000, 2800000, 1800000][$i - 79];
            $createShoeVariants($i, $basePrice, $depSandalSizes, $depSandalColors, [40, 40, 40, 40, 40]);
        }

        // MŨ & NÓN (Sản phẩm 83-87)
        $muNonColors = ['Đen', 'Trắng', 'Xanh', 'Xám'];
        
        for ($i = 83; $i <= 87; $i++) {
            $basePrice = [450000, 420000, 1200000, 550000, 480000][$i - 83];
            $createHatVariants($i, $basePrice, $muNonColors);
        }

        DB::table('bien_the_san_phams')->insert($variants);
    }
}
