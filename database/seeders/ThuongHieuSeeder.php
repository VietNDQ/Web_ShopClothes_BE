<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ThuongHieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('thuong_hieus')->delete();
        DB::table('thuong_hieus')->truncate();
        DB::table('thuong_hieus')->insert([
            [
                'ten_thuong_hieu' => 'Nike',
                'mo_ta'           => 'Thương hiệu thể thao nổi tiếng chuyên cung cấp các sản phẩm giày, quần áo và phụ kiện thể thao.',
                'tinh_trang'      => 1,
                'created_at'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_thuong_hieu' => 'Adidas',
                'mo_ta'           => 'Một trong những thương hiệu thể thao hàng đầu, nổi bật với các sản phẩm giày, trang phục và dụng cụ thể thao.',
                'tinh_trang'      => 1,
                'created_at'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_thuong_hieu' => 'Zara',
                'mo_ta'           => 'Thương hiệu thời trang quốc tế với các bộ sưu tập mùa mới, thiết kế sang trọng và giá cả hợp lý.',
                'tinh_trang'      => 1,
                'created_at'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_thuong_hieu' => 'H&M',
                'mo_ta'           => 'H&M cung cấp các sản phẩm thời trang theo xu hướng, từ quần áo cho đến phụ kiện với giá cả phải chăng.',
                'tinh_trang'      => 1,
                'created_at'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_thuong_hieu' => 'Uniqlo',
                'mo_ta'           => 'Thương hiệu thời trang đến từ Nhật Bản, nổi tiếng với các thiết kế đơn giản, chất liệu thoải mái và dễ kết hợp.',
                'tinh_trang'      => 1,
                'created_at'      => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ]
        ]);

    }
}
