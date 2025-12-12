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
        
        // Tắt foreign key checks để có thể truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('san_phams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
            // Thêm 77 sản phẩm mới
            // ÁO THUN (15 sản phẩm)
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Nike Air Max', 'mo_ta' => 'Áo thun Nike Air Max với thiết kế thể thao hiện đại, chất liệu cotton mềm mại.', 'gia_co_ban' => 520000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Puma Classic', 'mo_ta' => 'Áo thun Puma Classic phong cách cổ điển, dễ phối hợp với nhiều trang phục.', 'gia_co_ban' => 450000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Under Armour HeatGear', 'mo_ta' => 'Áo thun Under Armour HeatGear công nghệ làm mát, thấm hút mồ hôi tốt.', 'gia_co_ban' => 680000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Vans Authentic', 'mo_ta' => 'Áo thun Vans Authentic phong cách streetwear, chất liệu cotton 100%.', 'gia_co_ban' => 380000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Converse All Star', 'mo_ta' => 'Áo thun Converse All Star thiết kế đơn giản, phù hợp mọi lứa tuổi.', 'gia_co_ban' => 350000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Reebok Classic', 'mo_ta' => 'Áo thun Reebok Classic với logo cổ điển, chất liệu thoáng mát.', 'gia_co_ban' => 420000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Champion Reverse Weave', 'mo_ta' => 'Áo thun Champion Reverse Weave chất liệu dày dặn, bền đẹp theo thời gian.', 'gia_co_ban' => 550000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun The North Face', 'mo_ta' => 'Áo thun The North Face chống tia UV, phù hợp hoạt động ngoài trời.', 'gia_co_ban' => 750000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Columbia Sportswear', 'mo_ta' => 'Áo thun Columbia Sportswear công nghệ Omni-Wick, khô nhanh.', 'gia_co_ban' => 620000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Fila Heritage', 'mo_ta' => 'Áo thun Fila Heritage phong cách retro, chất liệu cotton mềm mại.', 'gia_co_ban' => 480000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun New Balance Essentials', 'mo_ta' => 'Áo thun New Balance Essentials thiết kế tối giản, chất lượng cao.', 'gia_co_ban' => 440000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Lacoste Classic', 'mo_ta' => 'Áo thun Lacoste Classic với logo cá sấu nổi tiếng, sang trọng.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Tommy Hilfiger', 'mo_ta' => 'Áo thun Tommy Hilfiger phong cách preppy, chất liệu pima cotton cao cấp.', 'gia_co_ban' => 1100000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Ralph Lauren Polo', 'mo_ta' => 'Áo thun Ralph Lauren Polo với logo polo nổi tiếng, đẳng cấp.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 1, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Thun Calvin Klein', 'mo_ta' => 'Áo thun Calvin Klein thiết kế tối giản, chất liệu organic cotton.', 'gia_co_ban' => 950000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // ÁO SƠ MI (10 sản phẩm)
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi H&M Premium', 'mo_ta' => 'Áo sơ mi H&M Premium chất liệu cotton nhập khẩu, form dáng chuẩn.', 'gia_co_ban' => 650000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Uniqlo Oxford', 'mo_ta' => 'Áo sơ mi Uniqlo Oxford chất liệu oxford bền đẹp, dễ giặt.', 'gia_co_ban' => 580000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Mango Business', 'mo_ta' => 'Áo sơ mi Mango Business phù hợp công sở, thiết kế thanh lịch.', 'gia_co_ban' => 720000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Massimo Dutti', 'mo_ta' => 'Áo sơ mi Massimo Dutti chất liệu cao cấp, form dáng châu Âu.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Pull & Bear', 'mo_ta' => 'Áo sơ mi Pull & Bear phong cách trẻ trung, giá cả hợp lý.', 'gia_co_ban' => 550000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Bershka', 'mo_ta' => 'Áo sơ mi Bershka thiết kế hiện đại, phù hợp giới trẻ.', 'gia_co_ban' => 520000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi COS', 'mo_ta' => 'Áo sơ mi COS thiết kế tối giản, chất liệu linen tự nhiên.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi & Other Stories', 'mo_ta' => 'Áo sơ mi & Other Stories thiết kế độc đáo, chất liệu cao cấp.', 'gia_co_ban' => 1300000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Reserved', 'mo_ta' => 'Áo sơ mi Reserved form dáng chuẩn, giá cả phải chăng.', 'gia_co_ban' => 480000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 2, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Sơ Mi Stradivarius', 'mo_ta' => 'Áo sơ mi Stradivarius phong cách thời trang, chất liệu mềm mại.', 'gia_co_ban' => 590000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // ÁO KHOÁC (8 sản phẩm)
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Nike Windrunner', 'mo_ta' => 'Áo khoác Nike Windrunner chống gió, nhẹ nhàng, phù hợp thể thao.', 'gia_co_ban' => 2200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Adidas Trefoil', 'mo_ta' => 'Áo khoác Adidas Trefoil với logo cổ điển, chất liệu polyester bền.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác The North Face Nuptse', 'mo_ta' => 'Áo khoác The North Face Nuptse giữ ấm tốt, chống nước.', 'gia_co_ban' => 8500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Columbia Omni-Heat', 'mo_ta' => 'Áo khoác Columbia Omni-Heat công nghệ giữ nhiệt tiên tiến.', 'gia_co_ban' => 3200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Zara Basic', 'mo_ta' => 'Áo khoác Zara Basic thiết kế đơn giản, dễ phối đồ.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Mango Wool', 'mo_ta' => 'Áo khoác Mango Wool chất liệu len cao cấp, giữ ấm tốt.', 'gia_co_ban' => 2800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác Uniqlo Ultra Light', 'mo_ta' => 'Áo khoác Uniqlo Ultra Light siêu nhẹ, có thể gấp nhỏ gọn.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 4, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Áo Khoác H&M Parka', 'mo_ta' => 'Áo khoác H&M Parka phong cách quân đội, chống nước tốt.', 'gia_co_ban' => 1900000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // QUẦN JEANS (8 sản phẩm)
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Levi\'s 501', 'mo_ta' => 'Quần jeans Levi\'s 501 cổ điển, form dáng straight fit.', 'gia_co_ban' => 2500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Wrangler', 'mo_ta' => 'Quần jeans Wrangler chất liệu denim bền, phong cách cowboy.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Zara Slim', 'mo_ta' => 'Quần jeans Zara Slim form dáng ôm, phù hợp giới trẻ.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans H&M Regular', 'mo_ta' => 'Quần jeans H&M Regular form dáng chuẩn, giá cả hợp lý.', 'gia_co_ban' => 950000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Pull & Bear', 'mo_ta' => 'Quần jeans Pull & Bear phong cách streetwear, chất liệu stretch.', 'gia_co_ban' => 1100000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Bershka', 'mo_ta' => 'Quần jeans Bershka thiết kế trẻ trung, nhiều màu sắc.', 'gia_co_ban' => 980000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Mango', 'mo_ta' => 'Quần jeans Mango chất liệu cao cấp, form dáng châu Âu.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 11, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Jeans Reserved', 'mo_ta' => 'Quần jeans Reserved giá cả phải chăng, chất lượng tốt.', 'gia_co_ban' => 850000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // QUẦN KAKI (5 sản phẩm)
            ['id_danh_muc' => 12, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Kaki Uniqlo', 'mo_ta' => 'Quần kaki Uniqlo chất liệu chinos, dễ phối đồ.', 'gia_co_ban' => 890000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 12, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Kaki H&M', 'mo_ta' => 'Quần kaki H&M form dáng chuẩn, phù hợp công sở.', 'gia_co_ban' => 750000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 12, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Kaki Zara', 'mo_ta' => 'Quần kaki Zara thiết kế thanh lịch, chất liệu cao cấp.', 'gia_co_ban' => 1100000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 12, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Kaki Mango', 'mo_ta' => 'Quần kaki Mango phù hợp công sở, form dáng châu Âu.', 'gia_co_ban' => 1300000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 12, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Kaki Reserved', 'mo_ta' => 'Quần kaki Reserved giá cả hợp lý, chất lượng tốt.', 'gia_co_ban' => 680000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // QUẦN SHORT (5 sản phẩm)
            ['id_danh_muc' => 13, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Short Nike Dri-FIT', 'mo_ta' => 'Quần short Nike Dri-FIT thấm hút mồ hôi, phù hợp thể thao.', 'gia_co_ban' => 650000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 13, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Short Adidas', 'mo_ta' => 'Quần short Adidas thiết kế thể thao, chất liệu thoáng mát.', 'gia_co_ban' => 580000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 13, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Short Uniqlo', 'mo_ta' => 'Quần short Uniqlo phong cách casual, dễ phối đồ.', 'gia_co_ban' => 450000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 13, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Short H&M', 'mo_ta' => 'Quần short H&M thiết kế đơn giản, giá cả hợp lý.', 'gia_co_ban' => 420000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 13, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Quần Short Zara', 'mo_ta' => 'Quần short Zara phong cách thời trang, chất liệu tốt.', 'gia_co_ban' => 550000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // VÁY & ĐẦM (6 sản phẩm)
            ['id_danh_muc' => 16, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Váy Ngắn Zara', 'mo_ta' => 'Váy ngắn Zara thiết kế trẻ trung, phù hợp mùa hè.', 'gia_co_ban' => 850000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 17, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Váy Dài H&M', 'mo_ta' => 'Váy dài H&M phong cách bohemian, chất liệu mềm mại.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 19, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Đầm Mango', 'mo_ta' => 'Đầm Mango thiết kế thanh lịch, phù hợp công sở.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 20, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Đầm Maxi Zara', 'mo_ta' => 'Đầm maxi Zara dài đến mắt cá, phong cách sang trọng.', 'gia_co_ban' => 2200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 21, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Đầm Ôm H&M', 'mo_ta' => 'Đầm ôm H&M tôn dáng, phù hợp các dịp đặc biệt.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 48, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Váy Dự Tiệc Mango', 'mo_ta' => 'Váy dự tiệc Mango thiết kế sang trọng, phù hợp sự kiện.', 'gia_co_ban' => 3500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // GIÀY THỂ THAO (8 sản phẩm)
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Nike Air Max 270', 'mo_ta' => 'Giày thể thao Nike Air Max 270 công nghệ đệm khí, êm ái.', 'gia_co_ban' => 3500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Adidas Ultraboost', 'mo_ta' => 'Giày thể thao Adidas Ultraboost công nghệ boost, đàn hồi tốt.', 'gia_co_ban' => 4200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Puma RS-X', 'mo_ta' => 'Giày thể thao Puma RS-X thiết kế retro, phong cách độc đáo.', 'gia_co_ban' => 2800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao New Balance 574', 'mo_ta' => 'Giày thể thao New Balance 574 cổ điển, êm ái và bền.', 'gia_co_ban' => 2500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Reebok Classic', 'mo_ta' => 'Giày thể thao Reebok Classic phong cách cổ điển, giá cả hợp lý.', 'gia_co_ban' => 2200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Vans Old Skool', 'mo_ta' => 'Giày thể thao Vans Old Skool phong cách skateboard, bền đẹp.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Converse Chuck Taylor', 'mo_ta' => 'Giày thể thao Converse Chuck Taylor cổ điển, dễ phối đồ.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 60, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Thể Thao Under Armour', 'mo_ta' => 'Giày thể thao Under Armour công nghệ cao, phù hợp chạy bộ.', 'gia_co_ban' => 3200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // GIÀY SNEAKER (5 sản phẩm)
            ['id_danh_muc' => 67, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Sneaker Nike Dunk', 'mo_ta' => 'Giày sneaker Nike Dunk phong cách streetwear, nhiều màu sắc.', 'gia_co_ban' => 3800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 67, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Sneaker Adidas Stan Smith', 'mo_ta' => 'Giày sneaker Adidas Stan Smith cổ điển, thiết kế tối giản.', 'gia_co_ban' => 2500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 67, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Sneaker Puma Suede', 'mo_ta' => 'Giày sneaker Puma Suede chất liệu da mềm, phong cách retro.', 'gia_co_ban' => 2200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 67, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Sneaker Fila Disruptor', 'mo_ta' => 'Giày sneaker Fila Disruptor thiết kế độc đáo, phong cách chunky.', 'gia_co_ban' => 2800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 67, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Sneaker New Balance 327', 'mo_ta' => 'Giày sneaker New Balance 327 thiết kế hiện đại, êm ái.', 'gia_co_ban' => 3000000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // GIÀY TÂY (4 sản phẩm)
            ['id_danh_muc' => 61, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Tây Clarks', 'mo_ta' => 'Giày tây Clarks chất liệu da thật, phù hợp công sở.', 'gia_co_ban' => 2800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 61, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Tây ECCO', 'mo_ta' => 'Giày tây ECCO công nghệ comfort, êm ái cả ngày.', 'gia_co_ban' => 4500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 61, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Tây Geox', 'mo_ta' => 'Giày tây Geox công nghệ thở, chống mùi hôi.', 'gia_co_ban' => 3800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 61, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Tây Bata', 'mo_ta' => 'Giày tây Bata giá cả hợp lý, chất lượng tốt.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // GIÀY CAO GÓT (4 sản phẩm)
            ['id_danh_muc' => 62, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Cao Gót Zara', 'mo_ta' => 'Giày cao gót Zara thiết kế thanh lịch, phù hợp công sở.', 'gia_co_ban' => 1500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 62, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Cao Gót Mango', 'mo_ta' => 'Giày cao gót Mango chất liệu da cao cấp, êm chân.', 'gia_co_ban' => 2200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 62, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Cao Gót H&M', 'mo_ta' => 'Giày cao gót H&M giá cả hợp lý, nhiều kiểu dáng.', 'gia_co_ban' => 980000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 62, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Giày Cao Gót Massimo Dutti', 'mo_ta' => 'Giày cao gót Massimo Dutti sang trọng, chất liệu cao cấp.', 'gia_co_ban' => 3500000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // DÉP & SANDAL (4 sản phẩm)
            ['id_danh_muc' => 64, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Dép Adidas Adilette', 'mo_ta' => 'Dép Adidas Adilette thoáng mát, phù hợp mùa hè.', 'gia_co_ban' => 650000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 64, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Dép Nike Benassi', 'mo_ta' => 'Dép Nike Benassi êm ái, thiết kế đơn giản.', 'gia_co_ban' => 580000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 65, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Sandal Birkenstock', 'mo_ta' => 'Sandal Birkenstock công nghệ nắn chỉnh, tốt cho sức khỏe.', 'gia_co_ban' => 2800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 65, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Sandal Teva', 'mo_ta' => 'Sandal Teva chống nước, phù hợp hoạt động ngoài trời.', 'gia_co_ban' => 1800000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            
            // MŨ & NÓN (5 sản phẩm)
            ['id_danh_muc' => 74, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Nón Nike', 'mo_ta' => 'Nón Nike chống nắng tốt, thiết kế thể thao.', 'gia_co_ban' => 450000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 74, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Nón Adidas', 'mo_ta' => 'Nón Adidas phong cách streetwear, nhiều màu sắc.', 'gia_co_ban' => 420000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 75, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Mũ Lưỡi Trai New Era', 'mo_ta' => 'Mũ lưỡi trai New Era chất liệu cao cấp, logo nổi tiếng.', 'gia_co_ban' => 1200000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 75, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Mũ Lưỡi Trai Nike', 'mo_ta' => 'Mũ lưỡi trai Nike thiết kế thể thao, chống nắng tốt.', 'gia_co_ban' => 550000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],
            ['id_danh_muc' => 75, 'id_nhan_vien' => 1, 'ten_san_pham' => 'Mũ Lưỡi Trai Adidas', 'mo_ta' => 'Mũ lưỡi trai Adidas phong cách streetwear, giá cả hợp lý.', 'gia_co_ban' => 480000, 'tinh_trang' => 1, 'trang_thai' => 1, 'ngay_dang' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)), 'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))],

        ]);
    }
}
