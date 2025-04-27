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
                'gia_goc'        => 500000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Áo thun Nike Classic với chất liệu thoáng mát, phù hợp cho mọi hoạt động thể thao.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 2, // Quần Jeans
                'ten_san_pham'   => 'Quần Jeans Adidas Slim Fit',
                'slug_san_pham'  => 'quan-jeans-adidas-slim-fit',
                'gia_goc'        => 750000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Quần jeans Adidas với thiết kế slim fit, phù hợp cho các hoạt động hàng ngày.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 3, // Zara
                'id_danh_muc'    => 3, // Áo Sơ Mi
                'ten_san_pham'   => 'Áo Sơ Mi Zara Casual',
                'slug_san_pham'  => 'ao-so-mi-zara-casual',
                'gia_goc'        => 600000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Áo sơ mi Zara với phong cách đơn giản, dễ dàng kết hợp với nhiều trang phục khác.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 4, // H&M
                'id_danh_muc'    => 4, // Váy Dự Tiệc
                'ten_san_pham'   => 'Váy Dự Tiệc H&M Elegant',
                'slug_san_pham'  => 'vay-du-tiec-hm-elegant',
                'gia_goc'        => 1200000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Váy dự tiệc H&M thiết kế thanh lịch, phù hợp cho các sự kiện đặc biệt.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 5, // Uniqlo
                'id_danh_muc'    => 5, // Áo Khoác
                'ten_san_pham'   => 'Áo Khoác Uniqlo Ultralight',
                'slug_san_pham'  => 'ao-khoac-uniqlo-ultralight',
                'gia_goc'        => 800000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Áo khoác Uniqlo ultralight giúp giữ ấm mà vẫn nhẹ nhàng, dễ dàng mang theo trong mùa đông.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 1, // Nike
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Nike Pro Dri-FIT',
                'slug_san_pham'  => 'ao-thun-nike-pro-dri-fit',
                'gia_goc'        => 550000,
                'giam_gia'       => '25',
                'mo_ta'          => 'Áo thun Nike Pro Dri-FIT với công nghệ thấm hút mồ hôi, giúp cơ thể luôn khô ráo.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Adidas Aeroready',
                'slug_san_pham'  => 'ao-thun-adidas-aeroready',
                'gia_goc'        => 480000,
                'giam_gia'       => '20',
                'mo_ta'          => 'Áo thun Adidas Aeroready thoáng khí, nhẹ nhàng và phù hợp với các hoạt động thể thao.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 3, // Zara
                'id_danh_muc'    => 3, // Áo Sơ Mi
                'ten_san_pham'   => 'Áo Sơ Mi Zara Slim Fit',
                'slug_san_pham'  => 'ao-so-mi-zara-slim-fit',
                'gia_goc'        => 700000,
                'giam_gia'       => '15',
                'mo_ta'          => 'Áo sơ mi Zara Slim Fit thanh lịch, sang trọng, phù hợp cho các buổi gặp mặt quan trọng.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 4, // H&M
                'id_danh_muc'    => 5, // Áo Khoác
                'ten_san_pham'   => 'Áo Khoác H&M Bomber',
                'slug_san_pham'  => 'ao-khoac-hm-bomber',
                'gia_goc'        => 1200000,
                'giam_gia'       => '40',
                'mo_ta'          => 'Áo khoác bomber H&M phong cách trẻ trung, giữ ấm tốt và dễ phối đồ.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 5, // Uniqlo
                'id_danh_muc'    => 2, // Quần Jeans
                'ten_san_pham'   => 'Quần Jeans Uniqlo Stretch',
                'slug_san_pham'  => 'quan-jeans-uniqlo-stretch',
                'gia_goc'        => 900000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Quần jeans Uniqlo Stretch với chất liệu co giãn thoải mái, thiết kế thời trang.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Adidas Essentials',
                'slug_san_pham'  => 'ao-thun-adidas-essentials',
                'gia_goc'        => 420000,
                'giam_gia'       => '10',
                'mo_ta'          => 'Áo thun Adidas Essentials chất liệu thoáng mát, dễ phối hợp với trang phục hàng ngày.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Adidas Superstar',
                'slug_san_pham'  => 'ao-thun-adidas-superstar',
                'gia_goc'        => 470000,
                'giam_gia'       => '25',
                'mo_ta'          => 'Áo thun Adidas Superstar mang đến vẻ ngoài thể thao năng động, phù hợp cho mọi hoạt động.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Adidas ID',
                'slug_san_pham'  => 'ao-thun-adidas-id',
                'gia_goc'        => 460000,
                'giam_gia'       => '30',
                'mo_ta'          => 'Áo thun Adidas ID với thiết kế đơn giản nhưng mạnh mẽ, lý tưởng cho các hoạt động thể thao.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_thuong_hieu' => 2, // Adidas
                'id_danh_muc'    => 1, // Áo Thun
                'ten_san_pham'   => 'Áo Thun Adidas Ultimate',
                'slug_san_pham'  => 'ao-thun-adidas-ultimate',
                'gia_goc'        => 490000,
                'giam_gia'       => '18',
                'mo_ta'          => 'Áo thun Adidas Ultimate dành cho những ai yêu thích sự năng động và thoải mái trong mọi hoạt động.',
                'tinh_trang'     => 1,
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],

        ]);
    }
}
