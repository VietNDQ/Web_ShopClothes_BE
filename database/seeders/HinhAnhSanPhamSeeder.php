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
        DB::table('hinh_anh_san_phams')->delete();
        DB::table('hinh_anh_san_phams')->truncate();
        DB::table('hinh_anh_san_phams')->insert([
            ['id_san_pham' => 1, 'url' => 'https://supersports.com.vn/cdn/shop/files/FN2799-478-1_1200x1200.jpg?v=1726563551', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 1, 'url' => 'https://supersports.com.vn/cdn/shop/files/FN2799-478-2_1024x1024.jpg?v=1726563551', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 1, 'url' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 1, 'url' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100-2.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 1, 'url' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100-2.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

            ['id_san_pham' => 2, 'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmm2JGm4n3ErBm-Eco6y3RENzmVxoP65fzZNmtcShi7NaK0hn_V0hmNVSIbRAKK7bOziw&usqp=CAU', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 2, 'url' => 'https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 2, 'url' => 'https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 2, 'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2awdoSV92D3WT0vTJQrI4icS03uTN5qH4X8NkntEkn6mqDIxAKx3QGS0ZruN1y5ov0Ng&usqp=CAU', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

            ['id_san_pham' => 3, 'url' => 'https://static.zara.net/assets/public/63da/7bab/a0144e79880c/95bbb8a71d53/04470433400-p/04470433400-p.jpg?ts=1742912166181&w=352&f=auto', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 3, 'url' => 'https://static.zara.net/assets/public/5e5b/fbfb/387342848a7c/e7bd628a576e/07200401251-p/07200401251-p.jpg?ts=1738760590844&w=426&f=auto', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 3, 'url' => 'https://static.zara.net/assets/public/889e/9432/fb7f477ebf50/c4512e9786f7/01063322527-p/01063322527-p.jpg?ts=1740674655940&w=744&f=auto', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 3, 'url' => 'https://static.zara.net/assets/public/ad2b/4e92/894a446c8dd9/c1554d336a66/04583823485-000-a1/04583823485-000-a1.jpg?ts=1743158013010&w=352&f=auto', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

            ['id_san_pham' => 4, 'url' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 4, 'url' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/8f7c4bd0b7cd0f598f9f81b4e5e3d4ed.png', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 4, 'url' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4e887dffa9af0cc1c62ffc97ed96bbd7.png', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 4, 'url' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4d56c75d277db5a0042cf840d54040f1.png', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

            ['id_san_pham' => 5, 'url' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m26uhtaysb0461', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 5, 'url' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/uniqlo-ultra-light-down-jacket-449631-09-01.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 5, 'url' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqghiicxs0fr1e', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 5, 'url' => 'https://im.uniqlo.com/global-cms/spa/res6aec0946d5c3218cb243717f27f6041afr.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

            ['id_san_pham' => 6, 'url' => 'https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 7, 'url' => 'https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 8, 'url' => 'https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 9, 'url' => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 10, 'url' => 'https://im.uniqlo.com/global-cms/spa/res25bd74e53bdb1e0881d782f85ba5b9f6fr.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 11, 'url' => 'https://product.hstatic.net/200000690765/product/vn-11134207-7r98o-lp3d6wvqsi1n73_154a9696b063472e9e8f76e264ec364f_master.jpeg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 12, 'url' => 'https://vanauthentic.com/thumbs/500x500x2/upload/product/502c88c7855e4e65ababe28ef656f0e9_5466.jpeg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 13, 'url' => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_san_pham' => 14, 'url' => 'https://golfgroup.com.vn/wp-content/uploads/2022/09/hinh-anh-ao-coc-tay-golf-adidas-hc5353-5-1-445x445.jpg', 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],



        ]);
    }
}
