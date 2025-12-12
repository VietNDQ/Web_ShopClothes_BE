<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HinhAnhSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hinh_anh_san_phams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $images = [];

        // Hàm helper để tạo hình ảnh cho sản phẩm
        $createImages = function($productId, $imageUrls) use (&$images, $startDate, $endDate) {
            foreach ($imageUrls as $url) {
                $images[] = [
                    'id_san_pham' => $productId,
                    'url' => $url,
                    'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                    'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                ];
            }
        };

        // ÁO THUN (Sản phẩm 1-15)
        $aoThunImageSets = [
            ['https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100.jpg', 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100-2.jpg'],
            ['https://product.hstatic.net/200000690765/product/vn-11134207-7r98o-lp3d6wvqsi1n73_154a9696b063472e9e8f76e264ec364f_master.jpeg', 'https://vanauthentic.com/thumbs/500x500x2/upload/product/502c88c7855e4e65ababe28ef656f0e9_5466.jpeg'],
            ['https://golfgroup.com.vn/wp-content/uploads/2022/09/hinh-anh-ao-coc-tay-golf-adidas-hc5353-5-1-445x445.jpg', 'https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg'],
            ['https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg'],
            ['https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg'],
        ];
        
        for ($i = 1; $i <= 15; $i++) {
            $imageSet = $aoThunImageSets[($i - 1) % count($aoThunImageSets)];
            $createImages($i, $imageSet);
        }

        // ÁO SƠ MI (Sản phẩm 16-25)
        $aoSoMiImageSets = [
            ['https://static.zara.net/assets/public/63da/7bab/a0144e79880c/95bbb8a71d53/04470433400-p/04470433400-p.jpg?ts=1742912166181&w=352&f=auto'],
            ['https://static.zara.net/assets/public/5e5b/fbfb/387342848a7c/e7bd628a576e/07200401251-p/07200401251-p.jpg?ts=1738760590844&w=426&f=auto'],
            ['https://static.zara.net/assets/public/889e/9432/fb7f477ebf50/c4512e9786f7/01063322527-p/01063322527-p.jpg?ts=1740674655940&w=744&f=auto'],
        ];
        
        for ($i = 16; $i <= 25; $i++) {
            $imageSet = $aoSoMiImageSets[($i - 16) % count($aoSoMiImageSets)];
            $createImages($i, $imageSet);
        }

        // ÁO KHOÁC (Sản phẩm 26-33)
        $aoKhoacImageSets = [
            ['https://im.uniqlo.com/global-cms/spa/res6aec0946d5c3218cb243717f27f6041afr.jpg'],
            ['https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/uniqlo-ultra-light-down-jacket-449631-09-01.jpg'],
            ['https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m26uhtaysb0461'],
        ];
        
        for ($i = 26; $i <= 33; $i++) {
            $imageSet = $aoKhoacImageSets[($i - 26) % count($aoKhoacImageSets)];
            $createImages($i, $imageSet);
        }

        // QUẦN JEANS (Sản phẩm 34-41)
        $quanJeansImageSets = [
            ['https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP'],
            ['https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg'],
            ['https://im.uniqlo.com/global-cms/spa/res25bd74e53bdb1e0881d782f85ba5b9f6fr.jpg'],
        ];
        
        for ($i = 34; $i <= 41; $i++) {
            $imageSet = $quanJeansImageSets[($i - 34) % count($quanJeansImageSets)];
            $createImages($i, $imageSet);
        }

        // QUẦN KAKI (Sản phẩm 42-46)
        $quanKakiImageSets = [
            ['https://im.uniqlo.com/global-cms/spa/res25bd74e53bdb1e0881d782f85ba5b9f6fr.jpg'],
            ['https://static.zara.net/assets/public/ad2b/4e92/894a446c8dd9/c1554d336a66/04583823485-000-a1/04583823485-000-a1.jpg?ts=1743158013010&w=352&f=auto'],
        ];
        
        for ($i = 42; $i <= 46; $i++) {
            $imageSet = $quanKakiImageSets[($i - 42) % count($quanKakiImageSets)];
            $createImages($i, $imageSet);
        }

        // QUẦN SHORT (Sản phẩm 47-51)
        $quanShortImageSets = [
            ['https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg'],
            ['https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg'],
        ];
        
        for ($i = 47; $i <= 51; $i++) {
            $imageSet = $quanShortImageSets[($i - 47) % count($quanShortImageSets)];
            $createImages($i, $imageSet);
        }

        // VÁY & ĐẦM (Sản phẩm 52-57)
        $vayDamImageSets = [
            ['https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png'],
            ['https://pubcdn.ivymoda.com/files/news/2022/03/16/8f7c4bd0b7cd0f598f9f81b4e5e3d4ed.png'],
            ['https://pubcdn.ivymoda.com/files/news/2022/03/16/4e887dffa9af0cc1c62ffc97ed96bbd7.png'],
        ];
        
        for ($i = 52; $i <= 57; $i++) {
            $imageSet = $vayDamImageSets[($i - 52) % count($vayDamImageSets)];
            $createImages($i, $imageSet);
        }

        // GIÀY THỂ THAO (Sản phẩm 58-65)
        $giayTheThaoImageSets = [
            ['https://supersports.com.vn/cdn/shop/files/FN2799-478-1_1200x1200.jpg?v=1726563551', 'https://supersports.com.vn/cdn/shop/files/FN2799-478-2_1024x1024.jpg?v=1726563551'],
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmm2JGm4n3ErBm-Eco6y3RENzmVxoP65fzZNmtcShi7NaK0hn_V0hmNVSIbRAKK7bOziw&usqp=CAU'],
            ['https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg'],
            ['https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP'],
        ];
        
        for ($i = 58; $i <= 65; $i++) {
            $imageSet = $giayTheThaoImageSets[($i - 58) % count($giayTheThaoImageSets)];
            $createImages($i, $imageSet);
        }

        // GIÀY SNEAKER (Sản phẩm 66-70)
        $giaySneakerImageSets = [
            ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2awdoSV92D3WT0vTJQrI4icS03uTN5qH4X8NkntEkn6mqDIxAKx3QGS0ZruN1y5ov0Ng&usqp=CAU'],
            ['https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg'],
            ['https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP'],
        ];
        
        for ($i = 66; $i <= 70; $i++) {
            $imageSet = $giaySneakerImageSets[($i - 66) % count($giaySneakerImageSets)];
            $createImages($i, $imageSet);
        }

        // GIÀY TÂY (Sản phẩm 71-74)
        $giayTayImageSets = [
            ['https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg'],
            ['https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg'],
        ];
        
        for ($i = 71; $i <= 74; $i++) {
            $imageSet = $giayTayImageSets[($i - 71) % count($giayTayImageSets)];
            $createImages($i, $imageSet);
        }

        // GIÀY CAO GÓT (Sản phẩm 75-78)
        $giayCaoGotImageSets = [
            ['https://pubcdn.ivymoda.com/files/news/2022/03/16/4d56c75d277db5a0042cf840d54040f1.png'],
            ['https://pubcdn.ivymoda.com/files/news/2022/03/16/4e887dffa9af0cc1c62ffc97ed96bbd7.png'],
        ];
        
        for ($i = 75; $i <= 78; $i++) {
            $imageSet = $giayCaoGotImageSets[($i - 75) % count($giayCaoGotImageSets)];
            $createImages($i, $imageSet);
        }

        // DÉP & SANDAL (Sản phẩm 79-82)
        $depSandalImageSets = [
            ['https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqghiicxs0fr1e'],
            ['https://im.uniqlo.com/global-cms/spa/res6aec0946d5c3218cb243717f27f6041afr.jpg'],
        ];
        
        for ($i = 79; $i <= 82; $i++) {
            $imageSet = $depSandalImageSets[($i - 79) % count($depSandalImageSets)];
            $createImages($i, $imageSet);
        }

        // MŨ & NÓN (Sản phẩm 83-87)
        $muNonImageSets = [
            ['https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg'],
            ['https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg'],
        ];
        
        for ($i = 83; $i <= 87; $i++) {
            $imageSet = $muNonImageSets[($i - 83) % count($muNonImageSets)];
            $createImages($i, $imageSet);
        }

        // DÉP & SANDAL BỔ SUNG (Sản phẩm 88-89)
        for ($i = 88; $i <= 89; $i++) {
            $imageSet = $depSandalImageSets[($i - 88) % count($depSandalImageSets)];
            $createImages($i, $imageSet);
        }

        // MŨ & NÓN BỔ SUNG (Sản phẩm 90-91)
        for ($i = 90; $i <= 91; $i++) {
            $imageSet = $muNonImageSets[($i - 90) % count($muNonImageSets)];
            $createImages($i, $imageSet);
        }

        DB::table('hinh_anh_san_phams')->insert($images);
    }
}
