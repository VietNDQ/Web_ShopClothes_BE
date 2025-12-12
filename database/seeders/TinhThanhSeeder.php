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

        /**
         * Danh sách 34 tỉnh thành mới sau sáp nhập (từ 01/07/2025)
         * Tổng số: 34 đơn vị hành chính cấp tỉnh
         * - 6 Thành phố trực thuộc Trung ương
         * - 28 Tỉnh
         * 
         * Ghi chú: Các tỉnh thành đã được sáp nhập theo quyết định mới nhất
         */
        DB::table('tinh_thanhs')->insert([
            // Thành phố trực thuộc Trung ương
            ['ten_tinh_thanh' => 'Thành phố Hà Nội', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Thành phố Hồ Chí Minh', 'tinh_trang' => '1'], // Sáp nhập Bình Dương, TP.HCM và Bà Rịa - Vũng Tàu
            ['ten_tinh_thanh' => 'Thành phố Hải Phòng', 'tinh_trang' => '1'], // Sáp nhập Hải Dương và TP. Hải Phòng
            ['ten_tinh_thanh' => 'Thành phố Đà Nẵng', 'tinh_trang' => '1'], // Sáp nhập Quảng Nam và TP. Đà Nẵng
            ['ten_tinh_thanh' => 'Thành phố Cần Thơ', 'tinh_trang' => '1'], // Sáp nhập Sóc Trăng, Hậu Giang và TP. Cần Thơ
            ['ten_tinh_thanh' => 'Thành phố Huế', 'tinh_trang' => '1'],
            
            // Các tỉnh
            ['ten_tinh_thanh' => 'Tuyên Quang', 'tinh_trang' => '1'], // Sáp nhập Hà Giang và Tuyên Quang
            ['ten_tinh_thanh' => 'Lào Cai', 'tinh_trang' => '1'], // Sáp nhập Lào Cai và Yên Bái
            ['ten_tinh_thanh' => 'Lai Châu', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Điện Biên', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Lạng Sơn', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Cao Bằng', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Sơn La', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Thái Nguyên', 'tinh_trang' => '1'], // Sáp nhập Bắc Kạn và Thái Nguyên
            ['ten_tinh_thanh' => 'Phú Thọ', 'tinh_trang' => '1'], // Sáp nhập Hòa Bình, Vĩnh Phúc và Phú Thọ
            ['ten_tinh_thanh' => 'Quảng Ninh', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Bắc Ninh', 'tinh_trang' => '1'], // Sáp nhập Bắc Giang và Bắc Ninh
            ['ten_tinh_thanh' => 'Hưng Yên', 'tinh_trang' => '1'], // Sáp nhập Thái Bình và Hưng Yên
            ['ten_tinh_thanh' => 'Ninh Bình', 'tinh_trang' => '1'], // Sáp nhập Hà Nam, Ninh Bình và Nam Định
            ['ten_tinh_thanh' => 'Thanh Hóa', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Nghệ An', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Hà Tĩnh', 'tinh_trang' => '1'],
            ['ten_tinh_thanh' => 'Quảng Trị', 'tinh_trang' => '1'], // Sáp nhập Quảng Bình và Quảng Trị
            ['ten_tinh_thanh' => 'Quảng Ngãi', 'tinh_trang' => '1'], // Sáp nhập Quảng Ngãi và Kon Tum
            ['ten_tinh_thanh' => 'Gia Lai', 'tinh_trang' => '1'], // Sáp nhập Gia Lai và Bình Định
            ['ten_tinh_thanh' => 'Khánh Hòa', 'tinh_trang' => '1'], // Sáp nhập Khánh Hòa và Ninh Thuận
            ['ten_tinh_thanh' => 'Lâm Đồng', 'tinh_trang' => '1'], // Sáp nhập Đắk Nông, Lâm Đồng và Bình Thuận
            ['ten_tinh_thanh' => 'Đắk Lắk', 'tinh_trang' => '1'], // Sáp nhập Phú Yên và Đắk Lắk
            ['ten_tinh_thanh' => 'Đồng Nai', 'tinh_trang' => '1'], // Sáp nhập Bình Phước và Đồng Nai
            ['ten_tinh_thanh' => 'Tây Ninh', 'tinh_trang' => '1'], // Sáp nhập Long An và Tây Ninh
            ['ten_tinh_thanh' => 'Vĩnh Long', 'tinh_trang' => '1'], // Sáp nhập Bến Tre, Vĩnh Long và Trà Vinh
            ['ten_tinh_thanh' => 'Đồng Tháp', 'tinh_trang' => '1'], // Sáp nhập Tiền Giang và Đồng Tháp
            ['ten_tinh_thanh' => 'Cà Mau', 'tinh_trang' => '1'], // Sáp nhập Bạc Liêu và Cà Mau
            ['ten_tinh_thanh' => 'An Giang', 'tinh_trang' => '1'], // Sáp nhập Kiên Giang và An Giang
        ]);
    }
}
