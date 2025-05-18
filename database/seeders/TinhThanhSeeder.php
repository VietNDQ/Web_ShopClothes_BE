<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TinhThanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinh_thanhs')->delete();
        DB::table('tinh_thanhs')->truncate();

        DB::table('tinh_thanhs')->insert([
            ['ten_tinh_thanh' => 'Chưa có thông tin'],
            ['ten_tinh_thanh' => 'An Giang'],
            ['ten_tinh_thanh' => 'Bà Rịa-Vũng Tàu'],
            ['ten_tinh_thanh' => 'Bạc Liêu'],
            ['ten_tinh_thanh' => 'Bắc Kạn'],
            ['ten_tinh_thanh' => 'Bắc Giang'],
            ['ten_tinh_thanh' => 'Bắc Ninh'],
            ['ten_tinh_thanh' => 'Bến Tre'],
            ['ten_tinh_thanh' => 'Bình Dương'],
            ['ten_tinh_thanh' => 'Bình Định'],
            ['ten_tinh_thanh' => 'Bình Phước'],
            ['ten_tinh_thanh' => 'Bình Thuận'],
            ['ten_tinh_thanh' => 'Cà Mau'],
            ['ten_tinh_thanh' => 'Cao Bằng'],
            ['ten_tinh_thanh' => 'Cần Thơ (TP)'],
            ['ten_tinh_thanh' => 'Đà Nẵng (TP)'],
            ['ten_tinh_thanh' => 'Đắk Lắk'],
            ['ten_tinh_thanh' => 'Đắk Nông'],
            ['ten_tinh_thanh' => 'Điện Biên'],
            ['ten_tinh_thanh' => 'Đồng Nai'],
            ['ten_tinh_thanh' => 'Đồng Tháp'],
            ['ten_tinh_thanh' => 'Gia Lai'],
            ['ten_tinh_thanh' => 'Hà Giang'],
            ['ten_tinh_thanh' => 'Hà Nam'],
            ['ten_tinh_thanh' => 'Hà Nội (TP)'],
            ['ten_tinh_thanh' => 'Hà Tây'],
            ['ten_tinh_thanh' => 'Hà Tĩnh'],
            ['ten_tinh_thanh' => 'Hải Dương'],
            ['ten_tinh_thanh' => 'Hải Phòng (TP)'],
            ['ten_tinh_thanh' => 'Hòa Bình'],
            ['ten_tinh_thanh' => 'Hồ Chí Minh (TP)'],
            ['ten_tinh_thanh' => 'Hậu Giang'],
            ['ten_tinh_thanh' => 'Hưng Yên'],
            ['ten_tinh_thanh' => 'Khánh Hòa'],
            ['ten_tinh_thanh' => 'Kiên Giang'],
            ['ten_tinh_thanh' => 'Kon Tum'],
            ['ten_tinh_thanh' => 'Lai Châu'],
            ['ten_tinh_thanh' => 'Lào Cai'],
            ['ten_tinh_thanh' => 'Lạng Sơn'],
            ['ten_tinh_thanh' => 'Lâm Đồng'],
            ['ten_tinh_thanh' => 'Long An'],
            ['ten_tinh_thanh' => 'Nam Định'],
            ['ten_tinh_thanh' => 'Nghệ An'],
            ['ten_tinh_thanh' => 'Ninh Bình'],
            ['ten_tinh_thanh' => 'Ninh Thuận'],
            ['ten_tinh_thanh' => 'Phú Thọ'],
            ['ten_tinh_thanh' => 'Phú Yên'],
            ['ten_tinh_thanh' => 'Quảng Bình'],
            ['ten_tinh_thanh' => 'Quảng Nam'],
            ['ten_tinh_thanh' => 'Quảng Ngãi'],
            ['ten_tinh_thanh' => 'Quảng Ninh'],
            ['ten_tinh_thanh' => 'Quảng Trị'],
            ['ten_tinh_thanh' => 'Sóc Trăng'],
            ['ten_tinh_thanh' => 'Sơn La'],
            ['ten_tinh_thanh' => 'Tây Ninh'],
            ['ten_tinh_thanh' => 'Thái Bình'],
            ['ten_tinh_thanh' => 'Thái Nguyên'],
            ['ten_tinh_thanh' => 'Thanh Hóa'],
            ['ten_tinh_thanh' => 'Thừa Thiên - Huế'],
            ['ten_tinh_thanh' => 'Tiền Giang'],
            ['ten_tinh_thanh' => 'Trà Vinh'],
            ['ten_tinh_thanh' => 'Tuyên Quang'],
            ['ten_tinh_thanh' => 'Vĩnh Long'],
            ['ten_tinh_thanh' => 'Vĩnh Phúc'],
            ['ten_tinh_thanh' => 'Yên Bái'],
        ]);
    }
}
