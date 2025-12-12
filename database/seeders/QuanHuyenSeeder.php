<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuanHuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quan_huyens')->delete();
        DB::table('quan_huyens')->truncate();

        /**
         * Danh sách quận/huyện của 34 tỉnh thành mới (từ 01/07/2025)
         * Ghi chú: Đây là danh sách các quận/huyện chính, có thể bổ sung thêm
         */
        DB::table('quan_huyens')->insert([
            // 1. Thành phố Hà Nội (id_tinh_thanh = 1)
            ['ten_quan_huyen' => 'Ba Đình', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoàn Kiếm', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tây Hồ', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Biên', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cầu Giấy', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đống Đa', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hai Bà Trưng', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoàng Mai', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Xuân', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sóc Sơn', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đông Anh', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gia Lâm', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nam Từ Liêm', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bắc Từ Liêm', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mê Linh', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hà Đông', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sơn Tây', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ba Vì', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phúc Thọ', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đan Phượng', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoài Đức', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quốc Oai', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thạch Thất', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Chương Mỹ', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Oai', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thường Tín', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Xuyên', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ứng Hòa', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mỹ Đức', 'id_tinh_thanh' => 1, 'tinh_trang' => '1'],

            // 2. Thành phố Hồ Chí Minh (id_tinh_thanh = 2) - Sáp nhập TP.HCM, Bình Dương, Bà Rịa-Vũng Tàu
            ['ten_quan_huyen' => 'Quận 1', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 2', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 3', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 4', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 5', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 6', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 7', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 8', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 9', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 10', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 11', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quận 12', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Thạnh', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Bình', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Phú', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gò Vấp', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Nhuận', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Tân', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Củ Chi', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hóc Môn', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nhà Bè', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cần Giờ', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            // Từ Bình Dương
            ['ten_quan_huyen' => 'Thủ Dầu Một', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Dĩ An', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thuận An', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Uyên', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bến Cát', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            // Từ Bà Rịa - Vũng Tàu
            ['ten_quan_huyen' => 'Vũng Tàu', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bà Rịa', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Điền', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Thành', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Châu Đức', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Xuyên Mộc', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đất Đỏ', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Côn Đảo', 'id_tinh_thanh' => 2, 'tinh_trang' => '1'],

            // 3. Thành phố Hải Phòng (id_tinh_thanh = 3) - Sáp nhập Hải Phòng và Hải Dương
            ['ten_quan_huyen' => 'Hồng Bàng', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ngô Quyền', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lê Chân', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kiến An', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đồ Sơn', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Dương Kinh', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'An Dương', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'An Lão', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cát Hải', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bạch Long Vĩ', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thủy Nguyên', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vĩnh Bảo', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tiên Lãng', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kiến Thụy', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            // Từ Hải Dương
            ['ten_quan_huyen' => 'Hải Dương', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Chí Linh', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kim Thành', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kinh Môn', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nam Sách', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ninh Giang', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Hà', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tứ Kỳ', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gia Lộc', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Giang', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cẩm Giàng', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Miện', 'id_tinh_thanh' => 3, 'tinh_trang' => '1'],

            // 4. Thành phố Đà Nẵng (id_tinh_thanh = 4) - Sáp nhập Đà Nẵng và Quảng Nam
            ['ten_quan_huyen' => 'Hải Châu', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Khê', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Liên Chiểu', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cẩm Lệ', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hòa Vang', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sơn Trà', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ngũ Hành Sơn', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            // Từ Quảng Nam
            ['ten_quan_huyen' => 'Tam Kỳ', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hội An', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Duy Xuyên', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Điện Bàn', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thăng Bình', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quế Sơn', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hiệp Đức', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nông Sơn', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phước Sơn', 'id_tinh_thanh' => 4, 'tinh_trang' => '1'],

            // 5. Thành phố Cần Thơ (id_tinh_thanh = 5) - Sáp nhập Cần Thơ, Sóc Trăng, Hậu Giang
            ['ten_quan_huyen' => 'Ninh Kiều', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Thủy', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cái Răng', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ô Môn', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thốt Nốt', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phong Điền', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cờ Đỏ', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vĩnh Thạnh', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thới Lai', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            // Từ Sóc Trăng
            ['ten_quan_huyen' => 'Sóc Trăng', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kế Sách', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Phú', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mỹ Tú', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            // Từ Hậu Giang
            ['ten_quan_huyen' => 'Vị Thanh', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ngã Bảy', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vị Thủy', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Mỹ', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Châu Thành A', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phụng Hiệp', 'id_tinh_thanh' => 5, 'tinh_trang' => '1'],

            // 6. Thành phố Huế (id_tinh_thanh = 6)
            ['ten_quan_huyen' => 'Huế', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hương Thủy', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hương Trà', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Lộc', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'A Lưới', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quảng Điền', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Vang', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nam Đông', 'id_tinh_thanh' => 6, 'tinh_trang' => '1'],

            // 7. Tuyên Quang (id_tinh_thanh = 7) - Sáp nhập Tuyên Quang và Hà Giang
            ['ten_quan_huyen' => 'Tuyên Quang', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lâm Bình', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nà Hang', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sơn Dương', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Sơn', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hàm Yên', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            // Từ Hà Giang
            ['ten_quan_huyen' => 'Hà Giang', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quản Bạ', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Minh', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vị Xuyên', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bắc Mê', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoàng Su Phì', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mèo Vạc', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đồng Văn', 'id_tinh_thanh' => 7, 'tinh_trang' => '1'],

            // 8. Lào Cai (id_tinh_thanh = 8) - Sáp nhập Lào Cai và Yên Bái
            ['ten_quan_huyen' => 'Lào Cai', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bát Xát', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Khương', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Si Ma Cai', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bảo Thắng', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bảo Yên', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sa Pa', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Bàn', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            // Từ Yên Bái
            ['ten_quan_huyen' => 'Yên Bái', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nghĩa Lộ', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Yên', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lục Yên', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mù Cang Chải', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Trấn Yên', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Trạm Tấu', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Chấn', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Bình', 'id_tinh_thanh' => 8, 'tinh_trang' => '1'],

            // 9. Lai Châu (id_tinh_thanh = 9)
            ['ten_quan_huyen' => 'Lai Châu', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Tè', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sìn Hồ', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tam Đường', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phong Thổ', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Uyên', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nậm Nhùn', 'id_tinh_thanh' => 9, 'tinh_trang' => '1'],

            // 10. Điện Biên (id_tinh_thanh = 10)
            ['ten_quan_huyen' => 'Điện Biên Phủ', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Lay', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Chà', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Nhé', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tủa Chùa', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tuần Giáo', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Điện Biên', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nậm Pồ', 'id_tinh_thanh' => 10, 'tinh_trang' => '1'],

            // Ghi chú: Do dữ liệu quá lớn, chỉ liệt kê các quận/huyện chính của một số tỉnh
            // Các tỉnh còn lại (11-34) cần bổ sung thêm dữ liệu chi tiết
            
            // 11. Lạng Sơn (id_tinh_thanh = 11)
            ['ten_quan_huyen' => 'Lạng Sơn', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cao Lộc', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đình Lập', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hữu Lũng', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lộc Bình', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tràng Định', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Lãng', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Quan', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Gia', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Chi Lăng', 'id_tinh_thanh' => 11, 'tinh_trang' => '1'],

            // 12. Cao Bằng (id_tinh_thanh = 12)
            ['ten_quan_huyen' => 'Cao Bằng', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bảo Lạc', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bảo Lâm', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hạ Lang', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hòa An', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nguyên Bình', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quảng Uyên', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thạch An', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Trùng Khánh', 'id_tinh_thanh' => 12, 'tinh_trang' => '1'],

            // 13. Sơn La (id_tinh_thanh = 13)
            ['ten_quan_huyen' => 'Sơn La', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quỳnh Nhai', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường La', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phù Yên', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mộc Châu', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Châu', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mai Sơn', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sông Mã', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sốp Cộp', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vân Hồ', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Và', 'id_tinh_thanh' => 13, 'tinh_trang' => '1'],

            // 14. Thái Nguyên (id_tinh_thanh = 14) - Sáp nhập Thái Nguyên và Bắc Kạn
            ['ten_quan_huyen' => 'Thái Nguyên', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sông Công', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phổ Yên', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đại Từ', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Võ Nhai', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Lương', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Định Hóa', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            // Từ Bắc Kạn
            ['ten_quan_huyen' => 'Bắc Kạn', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Chợ Mới', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bạch Thông', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Pác Nặm', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Na Rì', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ba Bể', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ngân Sơn', 'id_tinh_thanh' => 14, 'tinh_trang' => '1'],

            // 15. Phú Thọ (id_tinh_thanh = 15) - Sáp nhập Phú Thọ, Hòa Bình, Vĩnh Phúc
            ['ten_quan_huyen' => 'Việt Trì', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Thọ', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phù Ninh', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lâm Thao', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tam Nông', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Sơn', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hạ Hòa', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Lập', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cẩm Khê', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đoan Hùng', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Ba', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            // Từ Hòa Bình
            ['ten_quan_huyen' => 'Hòa Bình', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mai Châu', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Lạc', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kim Bôi', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cao Phong', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lương Sơn', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            // Từ Vĩnh Phúc
            ['ten_quan_huyen' => 'Vĩnh Yên', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phúc Yên', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lập Thạch', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tam Đảo', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sông Lô', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Lạc', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Xuyên', 'id_tinh_thanh' => 15, 'tinh_trang' => '1'],

            // Ghi chú: Các tỉnh còn lại (16-34) cần bổ sung dữ liệu chi tiết
            // Ở đây chỉ liệt kê một số quận/huyện chính để làm mẫu
            
            // 16. Quảng Ninh (id_tinh_thanh = 16)
            ['ten_quan_huyen' => 'Hạ Long', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cẩm Phả', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Móng Cái', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Uông Bí', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Liêu', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tiên Yên', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đầm Hà', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hải Hà', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ba Chẽ', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vân Đồn', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoành Bồ', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đông Triều', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quảng Yên', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cô Tô', 'id_tinh_thanh' => 16, 'tinh_trang' => '1'],

            // 17. Bắc Ninh (id_tinh_thanh = 17) - Sáp nhập Bắc Ninh và Bắc Giang
            ['ten_quan_huyen' => 'Bắc Ninh', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Phong', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quế Võ', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tiên Du', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Từ Sơn', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thuận Thành', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gia Bình', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lương Tài', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            // Từ Bắc Giang
            ['ten_quan_huyen' => 'Bắc Giang', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Thế', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lục Ngạn', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sơn Động', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lục Nam', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lạng Giang', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hiệp Hòa', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Việt Yên', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Yên', 'id_tinh_thanh' => 17, 'tinh_trang' => '1'],

            // 18. Hưng Yên (id_tinh_thanh = 18) - Sáp nhập Hưng Yên và Thái Bình
            ['ten_quan_huyen' => 'Hưng Yên', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Lâm', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Văn Giang', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Mỹ', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mỹ Hào', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ân Thi', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Khoái Châu', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kim Động', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tiên Lữ', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phù Cừ', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            // Từ Thái Bình
            ['ten_quan_huyen' => 'Thái Bình', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quỳnh Phụ', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hưng Hà', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vũ Thư', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kiến Xương', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tiền Hải', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thái Thụy', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đông Hưng', 'id_tinh_thanh' => 18, 'tinh_trang' => '1'],

            // Ghi chú: Các tỉnh từ 19-34 cần bổ sung thêm dữ liệu chi tiết
            // Ở đây chỉ liệt kê một số quận/huyện chính để làm mẫu
            
            // 19. Ninh Bình (id_tinh_thanh = 19) - Sáp nhập Ninh Bình, Hà Nam, Nam Định
            ['ten_quan_huyen' => 'Ninh Bình', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tam Điệp', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gia Viễn', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hoa Lư', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Yên Khánh', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kim Sơn', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nho Quan', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            // Từ Hà Nam
            ['ten_quan_huyen' => 'Phủ Lý', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Duy Tiên', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kim Bảng', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thanh Liêm', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lý Nhân', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            // Từ Nam Định
            ['ten_quan_huyen' => 'Nam Định', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mỹ Lộc', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vụ Bản', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ý Yên', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hải Hậu', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Trực Ninh', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Xuân Trường', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Nghĩa Hưng', 'id_tinh_thanh' => 19, 'tinh_trang' => '1'],

            // Các tỉnh còn lại chỉ liệt kê quận/huyện chính (cần bổ sung thêm)
            // 20-34: Thanh Hóa, Nghệ An, Hà Tĩnh, Quảng Trị, Quảng Ngãi, Gia Lai, Khánh Hòa, Lâm Đồng, Đắk Lắk, Đồng Nai, Tây Ninh, Vĩnh Long, Đồng Tháp, Cà Mau, An Giang
            
            // 20. Thanh Hóa (id_tinh_thanh = 20)
            ['ten_quan_huyen' => 'Thanh Hóa', 'id_tinh_thanh' => 20, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bỉm Sơn', 'id_tinh_thanh' => 20, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sầm Sơn', 'id_tinh_thanh' => 20, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Mường Lát', 'id_tinh_thanh' => 20, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quan Hóa', 'id_tinh_thanh' => 20, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 21. Nghệ An (id_tinh_thanh = 21)
            ['ten_quan_huyen' => 'Vinh', 'id_tinh_thanh' => 21, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cửa Lò', 'id_tinh_thanh' => 21, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Thái Hòa', 'id_tinh_thanh' => 21, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 22. Hà Tĩnh (id_tinh_thanh = 22)
            ['ten_quan_huyen' => 'Hà Tĩnh', 'id_tinh_thanh' => 22, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hồng Lĩnh', 'id_tinh_thanh' => 22, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 23. Quảng Trị (id_tinh_thanh = 23) - Sáp nhập Quảng Bình và Quảng Trị
            ['ten_quan_huyen' => 'Đông Hà', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quảng Trị', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vĩnh Linh', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            // Từ Quảng Bình
            ['ten_quan_huyen' => 'Đồng Hới', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bố Trạch', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Quảng Trạch', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Lệ Thủy', 'id_tinh_thanh' => 23, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 24. Quảng Ngãi (id_tinh_thanh = 24) - Sáp nhập Quảng Ngãi và Kon Tum
            ['ten_quan_huyen' => 'Quảng Ngãi', 'id_tinh_thanh' => 24, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ba Tơ', 'id_tinh_thanh' => 24, 'tinh_trang' => '1'],
            // Từ Kon Tum
            ['ten_quan_huyen' => 'Kon Tum', 'id_tinh_thanh' => 24, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Đắk Glei', 'id_tinh_thanh' => 24, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ngọc Hồi', 'id_tinh_thanh' => 24, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 25. Gia Lai (id_tinh_thanh = 25) - Sáp nhập Gia Lai và Bình Định
            ['ten_quan_huyen' => 'Pleiku', 'id_tinh_thanh' => 25, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'An Khê', 'id_tinh_thanh' => 25, 'tinh_trang' => '1'],
            // Từ Bình Định
            ['ten_quan_huyen' => 'Quy Nhon', 'id_tinh_thanh' => 25, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'An Lão', 'id_tinh_thanh' => 25, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 26. Khánh Hòa (id_tinh_thanh = 26) - Sáp nhập Khánh Hòa và Ninh Thuận
            ['ten_quan_huyen' => 'Nha Trang', 'id_tinh_thanh' => 26, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Cam Ranh', 'id_tinh_thanh' => 26, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Vạn Ninh', 'id_tinh_thanh' => 26, 'tinh_trang' => '1'],
            // Từ Ninh Thuận
            ['ten_quan_huyen' => 'Phan Rang-Tháp Chàm', 'id_tinh_thanh' => 26, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Ninh Hải', 'id_tinh_thanh' => 26, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 27. Lâm Đồng (id_tinh_thanh = 27) - Sáp nhập Lâm Đồng, Đắk Nông, Bình Thuận
            ['ten_quan_huyen' => 'Đà Lạt', 'id_tinh_thanh' => 27, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bảo Lộc', 'id_tinh_thanh' => 27, 'tinh_trang' => '1'],
            // Từ Đắk Nông
            ['ten_quan_huyen' => 'Gia Nghĩa', 'id_tinh_thanh' => 27, 'tinh_trang' => '1'],
            // Từ Bình Thuận
            ['ten_quan_huyen' => 'Phan Thiết', 'id_tinh_thanh' => 27, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'La Gi', 'id_tinh_thanh' => 27, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 28. Đắk Lắk (id_tinh_thanh = 28) - Sáp nhập Đắk Lắk và Phú Yên
            ['ten_quan_huyen' => 'Buôn Ma Thuột', 'id_tinh_thanh' => 28, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Buôn Hồ', 'id_tinh_thanh' => 28, 'tinh_trang' => '1'],
            // Từ Phú Yên
            ['ten_quan_huyen' => 'Tuy Hòa', 'id_tinh_thanh' => 28, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sông Cầu', 'id_tinh_thanh' => 28, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 29. Đồng Nai (id_tinh_thanh = 29) - Sáp nhập Đồng Nai và Bình Phước
            ['ten_quan_huyen' => 'Biên Hòa', 'id_tinh_thanh' => 29, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Khánh', 'id_tinh_thanh' => 29, 'tinh_trang' => '1'],
            // Từ Bình Phước
            ['ten_quan_huyen' => 'Đồng Xoài', 'id_tinh_thanh' => 29, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Bình Long', 'id_tinh_thanh' => 29, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 30. Tây Ninh (id_tinh_thanh = 30) - Sáp nhập Tây Ninh và Long An
            ['ten_quan_huyen' => 'Tây Ninh', 'id_tinh_thanh' => 30, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Tân Biên', 'id_tinh_thanh' => 30, 'tinh_trang' => '1'],
            // Từ Long An
            ['ten_quan_huyen' => 'Tân An', 'id_tinh_thanh' => 30, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Kiến Tường', 'id_tinh_thanh' => 30, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 31. Vĩnh Long (id_tinh_thanh = 31) - Sáp nhập Vĩnh Long, Bến Tre, Trà Vinh
            ['ten_quan_huyen' => 'Vĩnh Long', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Long Hồ', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            // Từ Bến Tre
            ['ten_quan_huyen' => 'Bến Tre', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            // Từ Trà Vinh
            ['ten_quan_huyen' => 'Trà Vinh', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Càng Long', 'id_tinh_thanh' => 31, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 32. Đồng Tháp (id_tinh_thanh = 32) - Sáp nhập Đồng Tháp và Tiền Giang
            ['ten_quan_huyen' => 'Cao Lãnh', 'id_tinh_thanh' => 32, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Sa Đéc', 'id_tinh_thanh' => 32, 'tinh_trang' => '1'],
            // Từ Tiền Giang
            ['ten_quan_huyen' => 'Mỹ Tho', 'id_tinh_thanh' => 32, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Gò Công', 'id_tinh_thanh' => 32, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 33. Cà Mau (id_tinh_thanh = 33) - Sáp nhập Cà Mau và Bạc Liêu
            ['ten_quan_huyen' => 'Cà Mau', 'id_tinh_thanh' => 33, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'U Minh', 'id_tinh_thanh' => 33, 'tinh_trang' => '1'],
            // Từ Bạc Liêu
            ['ten_quan_huyen' => 'Bạc Liêu', 'id_tinh_thanh' => 33, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hồng Dân', 'id_tinh_thanh' => 33, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm

            // 34. An Giang (id_tinh_thanh = 34) - Sáp nhập An Giang và Kiên Giang
            ['ten_quan_huyen' => 'Long Xuyên', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Châu Đốc', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'An Phú', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            // Từ Kiên Giang
            ['ten_quan_huyen' => 'Rạch Giá', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Phú Quốc', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            ['ten_quan_huyen' => 'Hà Tiên', 'id_tinh_thanh' => 34, 'tinh_trang' => '1'],
            // ... cần bổ sung thêm
        ]);
    }
}
