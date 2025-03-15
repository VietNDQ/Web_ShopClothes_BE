<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('san_phams')->delete();
        DB::table('san_phams')->truncate();
        DB::table('san_phams')->insert([
            [
                'id_thuong_hieu' => 1, // Nike
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Nike Classic',
                'slug_san_pham'  => 'ao-thun-nike-classic',
                'gia_ban'        => 500000,
                'so_luong_ton'   => 50,
                'hinh_anh'       => 'https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg',
                'mo_ta'          => 'Áo thun Nike Classic với chất liệu thoáng mát, phù hợp cho mọi hoạt động thể thao.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 2, // Quần Jeans
                'ten_san_pham'   => 'Quần Jeans Adidas Slim Fit',
                'slug_san_pham'  => 'quan-jeans-adidas-slim-fit',
                'gia_ban'        => 750000,
                'so_luong_ton'   => 30,
                'hinh_anh'       => 'https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg',
                'mo_ta'          => 'Quần jeans Adidas với thiết kế slim fit, phù hợp cho các hoạt động hàng ngày.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 3, // Zara
                'id_danh_muc'    => 3, // Áo Sơ Mi
                'ten_san_pham'   => 'Áo Sơ Mi Zara Casual',
                'slug_san_pham'  => 'ao-so-mi-zara-casual',
                'gia_ban'        => 600000,
                'so_luong_ton'   => 20,
                'hinh_anh'       => 'https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg',
                'mo_ta'          => 'Áo sơ mi Zara với phong cách đơn giản, dễ dàng kết hợp với nhiều trang phục khác.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 4, // H&M
                'id_danh_muc'    => 4, // Váy Dự Tiệc
                'ten_san_pham'   => 'Váy Dự Tiệc H&M Elegant',
                'slug_san_pham'  => 'vay-du-tiec-hm-elegant',
                'gia_ban'        => 1200000,
                'so_luong_ton'   => 10,
                'hinh_anh'       => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg',
                'mo_ta'          => 'Váy dự tiệc H&M thiết kế thanh lịch, phù hợp cho các sự kiện đặc biệt.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 5, // Uniqlo
                'id_danh_muc'    => 5, // Áo Khoác
                'ten_san_pham'   => 'Áo Khoác Uniqlo Ultralight',
                'slug_san_pham'  => 'ao-khoac-uniqlo-ultralight',
                'gia_ban'        => 800000,
                'so_luong_ton'   => 40,
                'hinh_anh'       => 'https://www.uniqlo.com/jp/ja/contents/feature/masterpiece/common/img/product/item_02_kv.jpg?240112',
                'mo_ta'          => 'Áo khoác Uniqlo ultralight giúp giữ ấm mà vẫn nhẹ nhàng, dễ dàng mang theo trong mùa đông.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 1, // Nike
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Nike Nữ Classic',
                'slug_san_pham'  => 'ao-thun-nike-nu-classic',
                'gia_ban'        => 450000,
                'so_luong_ton'   => 60,
                'hinh_anh'       => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rbmd-m60lbrkk324gb1_tn.webp',
                'mo_ta'          => 'Áo thun Nike nữ, thiết kế thể thao với chất liệu vải thoáng mát, thích hợp cho các buổi tập luyện.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 2, // Quần Jeans
                'ten_san_pham'   => 'Quần Jeans Adidas Nữ Slim Fit',
                'slug_san_pham'  => 'quan-jeans-adidas-nu-slim-fit',
                'gia_ban'        => 800000,
                'so_luong_ton'   => 25,
                'hinh_anh'       => 'https://product.hstatic.net/200000477321/product/tai_xuong_-_2024-12-30t152010.402_9846875e1a8240a6ae2c36e545777326_grande.png',
                'mo_ta'          => 'Quần jeans Adidas nữ với thiết kế slim fit, phù hợp với phong cách năng động và thoải mái.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 3, // Zara
                'id_danh_muc'    => 3, // Áo Sơ Mi
                'ten_san_pham'   => 'Áo Sơ Mi Zara Nữ Elegant',
                'slug_san_pham'  => 'ao-so-mi-zara-nu-elegant',
                'gia_ban'        => 700000,
                'so_luong_ton'   => 15,
                'hinh_anh'       => 'https://afamilycdn.com/150157425591193600/2024/3/24/3126790734943657494124488092687009583134168n-17112769556931965872660.jpg',
                'mo_ta'          => 'Áo sơ mi Zara nữ thanh lịch, phù hợp cho công sở và các buổi họp mặt, kết hợp dễ dàng với quần jeans hoặc chân váy.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 4, // H&M
                'id_danh_muc'    => 4, // Váy Dự Tiệc
                'ten_san_pham'   => 'Váy Dự Tiệc H&M Nữ Glamour',
                'slug_san_pham'  => 'vay-du-tiec-hm-nu-glamour',
                'gia_ban'        => 1500000,
                'so_luong_ton'   => 8,
                'hinh_anh'       => 'https://bizweb.dktcdn.net/100/368/426/products/dam-xoe-du-tiec-cuoi-9-jpeg.jpg?v=1708837012277',
                'mo_ta'          => 'Váy dự tiệc H&M thiết kế sang trọng, giúp bạn nổi bật trong các sự kiện đặc biệt như tiệc cưới, lễ hội.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 5, // Uniqlo
                'id_danh_muc'    => 5, // Áo Khoác
                'ten_san_pham'   => 'Áo Khoác Uniqlo Nữ Ultralight',
                'slug_san_pham'  => 'ao-khoac-uniqlo-nu-ultralight',
                'gia_ban'        => 900000,
                'so_luong_ton'   => 35,
                'hinh_anh'       => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRURDbG6btQK8Q1DV33RDKeDkCon-vNlIY8Fw&s',
                'mo_ta'          => 'Áo khoác Uniqlo nữ ultralight giúp giữ ấm nhưng vẫn nhẹ nhàng, phù hợp cho những ngày đông lạnh.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ]

        ]);
    }
}
