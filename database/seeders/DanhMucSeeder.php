<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $startDate  = Carbon::create(2024, 10, 1);
    $endDate    = Carbon::create(2024, 12, 1);
    DB::table('danh_mucs')->delete();
    DB::table('danh_mucs')->truncate();
    DB::table('danh_mucs')->insert([
        [
            'ten_danh_muc' => 'Áo Thun',
            'mo_ta'        => 'Các loại áo thun có thiết kế đơn giản, thoải mái, phù hợp cho các hoạt động thể thao và đời thường.',
            'tinh_trang'      => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Quần Jeans',
            'mo_ta'        => 'Quần jeans với các kiểu dáng từ ôm sát đến rộng rãi, phù hợp cho cả nam và nữ, với chất liệu bền bỉ.',
            'tinh_trang'      => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Áo Sơ Mi',
            'mo_ta'        => 'Áo sơ mi cho cả nam và nữ, thích hợp cho các dịp công sở hay trang phục hàng ngày.',
            'tinh_trang'      => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Váy Dự Tiệc',
            'mo_ta'        => 'Váy thời trang, sang trọng, thích hợp cho các dịp tiệc tùng, sự kiện đặc biệt.',
            'tinh_trang'      => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Áo Khoác',
            'mo_ta'        => 'Áo khoác mùa đông, áo khoác ngoài giúp giữ ấm và bảo vệ cơ thể khỏi thời tiết lạnh.',
            'tinh_trang'      => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Giày Thể Thao',
            'mo_ta'        => 'Các loại giày thể thao với thiết kế thời trang, êm ái, phù hợp cho vận động và đi chơi hàng ngày.',
            'tinh_trang'   => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Túi Xách',
            'mo_ta'        => 'Túi xách thời trang, từ túi đeo chéo đến túi cầm tay, phù hợp với nhiều phong cách khác nhau.',
            'tinh_trang'   => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
        [
            'ten_danh_muc' => 'Phụ Kiện Thời Trang',
            'mo_ta'        => 'Các phụ kiện như đồng hồ, kính mát, nón, dây chuyền giúp hoàn thiện phong cách thời trang.',
            'tinh_trang'   => 1,
            'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
        ],
    ]);
}

}
