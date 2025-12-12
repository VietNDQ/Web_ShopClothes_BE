<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhuongXaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Ghi chú: Do dữ liệu phường/xã rất lớn (3.321 đơn vị), seeder này chỉ chứa 
     * một số phường/xã mẫu chính của các quận/huyện. Bạn cần bổ sung thêm dữ liệu
     * chi tiết từ nguồn chính thức.
     */
    public function run(): void
    {
        DB::table('phuong_xas')->delete();
        DB::table('phuong_xas')->truncate();

        /**
         * Danh sách phường/xã của 34 tỉnh thành mới (từ 01/07/2025)
         * Ghi chú: Đây là danh sách mẫu, cần bổ sung thêm dữ liệu chi tiết
         */
        DB::table('phuong_xas')->insert([
            // Thành phố Hà Nội - Quận Ba Đình (id_quan_huyen = 1)
            ['ten_phuong_xa' => 'Phường Phúc Xá', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trúc Bạch', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vĩnh Phúc', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cống Vị', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Liễu Giai', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Nguyễn Trung Trực', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Quán Thánh', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Ngọc Hà', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Điện Biên', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đội Cấn', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Ngọc Khánh', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Kim Mã', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Giảng Võ', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thành Công', 'id_quan_huyen' => 1, 'tinh_trang' => '1'],

            // Thành phố Hà Nội - Quận Hoàn Kiếm (id_quan_huyen = 2)
            ['ten_phuong_xa' => 'Phường Phúc Tân', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đồng Xuân', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Mã', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Buồm', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Đào', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Bồ', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cửa Đông', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Lý Thái Tổ', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Bạc', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Gai', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Chương Dương Độ', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Trống', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cửa Nam', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Bông', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Tràng Tiền', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trần Hưng Đạo', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phan Chu Trinh', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Bài', 'id_quan_huyen' => 2, 'tinh_trang' => '1'],

            // Thành phố Hồ Chí Minh - Quận 1 (id_quan_huyen = 44)
            ['ten_phuong_xa' => 'Phường Bến Nghé', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đa Kao', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Bến Thành', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Nguyễn Thái Bình', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phạm Ngũ Lão', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cầu Ông Lãnh', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cô Giang', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Nguyễn Cư Trinh', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cầu Kho', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Tân Định', 'id_quan_huyen' => 44, 'tinh_trang' => '1'],

            // Thành phố Hồ Chí Minh - Quận 2 (id_quan_huyen = 45)
            ['ten_phuong_xa' => 'Phường An Phú', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Khánh', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Bình Trưng Đông', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Bình Trưng Tây', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cát Lái', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thạnh Mỹ Lợi', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Lợi Đông', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thủ Thiêm', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Bình An', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Bình Khánh', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thảo Điền', 'id_quan_huyen' => 45, 'tinh_trang' => '1'],

            // Thành phố Hải Phòng - Quận Hồng Bàng (id_quan_huyen = 73)
            ['ten_phuong_xa' => 'Phường Minh Khai', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trại Chuối', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hoàng Văn Thụ', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phan Bội Châu', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Máy Chai', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Máy Tơ', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vạn Mỹ', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cầu Tre', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Lạch Tray', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đổng Quốc Bình', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Cát Dài', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Biên', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Lam Sơn', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Dương', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trần Nguyên Hãn', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hồ Nam', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trại Cau', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Dư Hàng', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hàng Kênh', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đông Hải', 'id_quan_huyen' => 73, 'tinh_trang' => '1'],

            // Thành phố Đà Nẵng - Quận Hải Châu (id_quan_huyen = 92)
            ['ten_phuong_xa' => 'Phường Thạch Thang', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hải Châu I', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hải Châu II', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Nam Dương', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thạch Gián', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thanh Bình', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thuận Phước', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hải Châu', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phước Ninh', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hòa Thuận Tây', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hòa Thuận Đông', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Khuê Trung', 'id_quan_huyen' => 92, 'tinh_trang' => '1'],

            // Thành phố Cần Thơ - Quận Ninh Kiều (id_quan_huyen = 101)
            ['ten_phuong_xa' => 'Phường Cái Khế', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Hòa', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thới Bình', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Nghiệp', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Cư', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Tân An', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Phú', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Xuân Khánh', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hưng Lợi', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Khánh', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Bình', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Châu Văn Liêm', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thới Hòa', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thới Long', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Long Hưng', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thới An', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phước Thới', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Trường Lạc', 'id_quan_huyen' => 101, 'tinh_trang' => '1'],

            // Thành phố Huế - Thành phố Huế (id_quan_huyen = 113)
            ['ten_phuong_xa' => 'Phường Phú Thuận', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Bình', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Tây Lộc', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thuận Lộc', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Hiệp', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Hậu', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thuận Hòa', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thuận Thành', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Hội', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Nhuận', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Diễn', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Mỹ', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vĩnh Ninh', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Hải', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Thượng', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thủy Vân', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thủy Biều', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Hương Long', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Thủy Xuân', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Đông', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường An Tây', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vĩ Dạ', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phường Đúc', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vĩnh Ninh', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Thuận', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Bình', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Đúc', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Vĩ Dạ', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],
            ['ten_phuong_xa' => 'Phường Phú Hội', 'id_quan_huyen' => 113, 'tinh_trang' => '1'],

            // Ghi chú: Do dữ liệu phường/xã rất lớn (hơn 3.000 đơn vị), 
            // seeder này chỉ chứa mẫu phường/xã của một số quận/huyện chính.
            // Bạn cần bổ sung thêm dữ liệu chi tiết cho tất cả các quận/huyện
            // từ nguồn dữ liệu chính thức của Bộ Nội vụ hoặc UBND các tỉnh/thành phố.
            
            // Các quận/huyện và phường/xã còn lại cần được bổ sung theo cấu trúc tương tự
            // với id_quan_huyen tương ứng từ bảng quan_huyens
        ]);
    }
}
