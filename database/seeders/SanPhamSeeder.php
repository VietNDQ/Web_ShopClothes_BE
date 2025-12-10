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
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1, // Nhân viên mặc định
                'ten_san_pham'   => 'Áo Thun Nike Classic',
                'mo_ta'          => 'Áo thun Nike Classic với chất liệu thoáng mát, phù hợp cho mọi hoạt động thể thao.',
                'gia_co_ban'     => 500000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 11, // Quần Jeans
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Quần Jeans Adidas Slim Fit',
                'mo_ta'          => 'Quần jeans Adidas với thiết kế slim fit, phù hợp cho các hoạt động hàng ngày.',
                'gia_co_ban'     => 750000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 2, // Áo Sơ Mi
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Sơ Mi Zara Casual',
                'mo_ta'          => 'Áo sơ mi Zara với phong cách đơn giản, dễ dàng kết hợp với nhiều trang phục khác.',
                'gia_co_ban'     => 600000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 19, // Đầm
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Váy Dự Tiệc H&M Elegant',
                'mo_ta'          => 'Váy dự tiệc H&M thiết kế thanh lịch, phù hợp cho các sự kiện đặc biệt.',
                'gia_co_ban'     => 1200000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 4, // Áo Khoác
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Khoác Uniqlo Ultralight',
                'mo_ta'          => 'Áo khoác Uniqlo ultralight giúp giữ ấm mà vẫn nhẹ nhàng, dễ dàng mang theo trong mùa đông.',
                'gia_co_ban'     => 800000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Nike Pro Dri-FIT',
                'mo_ta'          => 'Áo thun Nike Pro Dri-FIT với công nghệ thấm hút mồ hôi, giúp cơ thể luôn khô ráo.',
                'gia_co_ban'     => 550000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Adidas Aeroready',
                'mo_ta'          => 'Áo thun Adidas Aeroready thoáng khí, nhẹ nhàng và phù hợp với các hoạt động thể thao.',
                'gia_co_ban'     => 480000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 2, // Áo Sơ Mi
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Sơ Mi Zara Slim Fit',
                'mo_ta'          => 'Áo sơ mi Zara Slim Fit thanh lịch, sang trọng, phù hợp cho các buổi gặp mặt quan trọng.',
                'gia_co_ban'     => 700000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 4, // Áo Khoác
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Khoác H&M Bomber',
                'mo_ta'          => 'Áo khoác bomber H&M phong cách trẻ trung, giữ ấm tốt và dễ phối đồ.',
                'gia_co_ban'     => 1200000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 11, // Quần Jeans
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Quần Jeans Uniqlo Stretch',
                'mo_ta'          => 'Quần jeans Uniqlo Stretch với chất liệu co giãn thoải mái, thiết kế thời trang.',
                'gia_co_ban'     => 900000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Adidas Essentials',
                'mo_ta'          => 'Áo thun Adidas Essentials chất liệu thoáng mát, dễ phối hợp với trang phục hàng ngày.',
                'gia_co_ban'     => 420000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Adidas Superstar',
                'mo_ta'          => 'Áo thun Adidas Superstar mang đến vẻ ngoài thể thao năng động, phù hợp cho mọi hoạt động.',
                'gia_co_ban'     => 470000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Adidas ID',
                'mo_ta'          => 'Áo thun Adidas ID với thiết kế đơn giản nhưng mạnh mẽ, lý tưởng cho các hoạt động thể thao.',
                'gia_co_ban'     => 460000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_danh_muc'    => 1, // Áo Thun
                'id_nhan_vien'   => 1,
                'ten_san_pham'   => 'Áo Thun Adidas Ultimate',
                'mo_ta'          => 'Áo thun Adidas Ultimate dành cho những ai yêu thích sự năng động và thoải mái trong mọi hoạt động.',
                'gia_co_ban'     => 490000,
                'tinh_trang'     => 1,
                'trang_thai'     => 1,
                'ngay_dang'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'created_at'     => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],

        ]);
    }
}
