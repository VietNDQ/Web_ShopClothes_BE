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

        DB::table('quan_huyens')->insert([
            ['ten_quan_huyen' => 'Châu Đốc', 'id_tinh_thanh' => 2],
            ['ten_quan_huyen' => 'Châu Phú', 'id_tinh_thanh' => 2],
            ['ten_quan_huyen' => 'Long Xuyên', 'id_tinh_thanh' => 2],
            ['ten_quan_huyen' => 'Tân Châu', 'id_tinh_thanh' => 2],
            ['ten_quan_huyen' => 'An Phú', 'id_tinh_thanh' => 2],

            ['ten_quan_huyen' => 'Vũng Tàu', 'id_tinh_thanh' => 3],
            ['ten_quan_huyen' => 'Long Điền', 'id_tinh_thanh' => 3],
            ['ten_quan_huyen' => 'Tân Thành', 'id_tinh_thanh' => 3],
            ['ten_quan_huyen' => 'Châu Đức', 'id_tinh_thanh' => 3],
            ['ten_quan_huyen' => 'Xuyên Mộc', 'id_tinh_thanh' => 3],
            ['ten_quan_huyen' => 'Đất Đỏ', 'id_tinh_thanh' => 3],

            ['ten_quan_huyen' => 'Bạc Liêu', 'id_tinh_thanh' => 4],
            ['ten_quan_huyen' => 'Hòa Bình', 'id_tinh_thanh' => 4],
            ['ten_quan_huyen' => 'Phước Long', 'id_tinh_thanh' => 4],
            ['ten_quan_huyen' => 'Vĩnh Lợi', 'id_tinh_thanh' => 4],
            ['ten_quan_huyen' => 'Hồng Dân', 'id_tinh_thanh' => 4],
            ['ten_quan_huyen' => 'Giá Rai', 'id_tinh_thanh' => 4],

            // Quận huyện của Bắc Kạn (id_tinh_thanh = 5)
            ['ten_quan_huyen' => 'Bắc Kạn', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Chợ Mới', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Bạch Thông', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Pác Nặm', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Na Rì', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Ba Bể', 'id_tinh_thanh' => 5],
            ['ten_quan_huyen' => 'Ngân Sơn', 'id_tinh_thanh' => 5],

            // Quận huyện của Bắc Giang (id_tinh_thanh = 6)
            ['ten_quan_huyen' => 'Bắc Giang', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Lục Nam', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Lạng Giang', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Yên Dũng', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Sơn Động', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Hiệp Hòa', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Tân Yên', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Việt Yên', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Lục Ngạn', 'id_tinh_thanh' => 6],
            ['ten_quan_huyen' => 'Yên Thế', 'id_tinh_thanh' => 6],

            ['ten_quan_huyen' => 'Bắc Ninh', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Gia Bình', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Quế Võ', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Tiên Du', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Thuận Thành', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Yên Phong', 'id_tinh_thanh' => 7],
            ['ten_quan_huyen' => 'Lương Tài', 'id_tinh_thanh' => 7],

            // Quận huyện của Bến Tre (id_tinh_thanh = 8)
            ['ten_quan_huyen' => 'Bến Tre', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Chợ Lách', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Giồng Trôm', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Mỏ Cày Bắc', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Mỏ Cày Nam', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Ba Tri', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Bảo Thạnh', 'id_tinh_thanh' => 8],
            ['ten_quan_huyen' => 'Thạnh Phú', 'id_tinh_thanh' => 8],

            // Quận huyện của Bình Dương (id_tinh_thanh = 9)
            ['ten_quan_huyen' => 'Thủ Dầu Một', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Dĩ An', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Bến Cát', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Thuận An', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Tân Uyên', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Phú Giáo', 'id_tinh_thanh' => 9],
            ['ten_quan_huyen' => 'Bàu Bàng', 'id_tinh_thanh' => 9],

            // Quận huyện của Bình Định (id_tinh_thanh = 10)
            ['ten_quan_huyen' => 'Quy Nhơn', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'An Lão', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Hoài Nhơn', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Phù Mỹ', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Phù Cát', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Tây Sơn', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Vân Canh', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Hoài Ân', 'id_tinh_thanh' => 10],
            ['ten_quan_huyen' => 'Đồng Xuân', 'id_tinh_thanh' => 10],

            // Quận huyện của Bình Phước (id_tinh_thanh = 11)
            ['ten_quan_huyen' => 'Thủ Dầu Một', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Bình Long', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Chơn Thành', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Phước Long', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Bù Gia Mập', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Bù Đăng', 'id_tinh_thanh' => 11],
            ['ten_quan_huyen' => 'Lộc Ninh', 'id_tinh_thanh' => 11],

            ['ten_quan_huyen' => 'Phan Thiết', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'La Gi', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'Tánh Linh', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'Hàm Thuận Bắc', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'Hàm Thuận Nam', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'Đức Linh', 'id_tinh_thanh' => 12],
            ['ten_quan_huyen' => 'Phú Quí', 'id_tinh_thanh' => 12],

            ['ten_quan_huyen' => 'Cà Mau', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'U Minh', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Thới Bình', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Trần Văn Thời', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Cái Nước', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Năm Căn', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Phú Tân', 'id_tinh_thanh' => 13],
            ['ten_quan_huyen' => 'Đầm Dơi', 'id_tinh_thanh' => 13],

            ['ten_quan_huyen' => 'Cao Bằng', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Bảo Lạc', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Bảo Lâm', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Hạ Lang', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Hòa An', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Nguyên Bình', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Quảng Uyên', 'id_tinh_thanh' => 14],
            ['ten_quan_huyen' => 'Thạch An', 'id_tinh_thanh' => 14],

            // Quận huyện của Cần Thơ (TP) (id_tinh_thanh = 15)
            ['ten_quan_huyen' => 'Cái Răng', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Ninh Kiều', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Bình Thủy', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Phong Điền', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Cờ Đỏ', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Vĩnh Thạnh', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Thới Lai', 'id_tinh_thanh' => 15],
            ['ten_quan_huyen' => 'Kiên Bình', 'id_tinh_thanh' => 15],

            // Quận huyện của Đà Nẵng (TP) (id_tinh_thanh = 16)
            ['ten_quan_huyen' => 'Hải Châu', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Thanh Khê', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Liên Chiểu', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Cẩm Lệ', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Hòa Vang', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Sơn Trà', 'id_tinh_thanh' => 16],
            ['ten_quan_huyen' => 'Ngũ Hành Sơn', 'id_tinh_thanh' => 16],

            //Chưa làm
            // Quận huyện của Đắk Lắk (id_tinh_thanh = 17)
            ['ten_quan_huyen' => 'Buôn Ma Thuột', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Ea H’Leo', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Buôn Đôn', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Krông Ana', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Krông Búk', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Krông Năng', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Cư Kuin', 'id_tinh_thanh' => 17],
            ['ten_quan_huyen' => 'Lắk', 'id_tinh_thanh' => 17],

            // Quận huyện của Đắk Nông (id_tinh_thanh = 18)
            ['ten_quan_huyen' => 'Gia Nghĩa', 'id_tinh_thanh' => 18],
            ['ten_quan_huyen' => 'Đắk R lấp', 'id_tinh_thanh' => 18],
            ['ten_quan_huyen' => 'Cư Jút', 'id_tinh_thanh' => 18],
            ['ten_quan_huyen' => 'Đắk Mil', 'id_tinh_thanh' => 18],
            ['ten_quan_huyen' => 'Krông Nô', 'id_tinh_thanh' => 18],
            ['ten_quan_huyen' => 'Tâm Thắng', 'id_tinh_thanh' => 18],

            // Quận huyện của Điện Biên (id_tinh_thanh = 19)
            ['ten_quan_huyen' => 'Điện Biên Phủ', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Mường Lay', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Mường Chà', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Mường Nhé', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Tủa Chùa', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Tuần Giáo', 'id_tinh_thanh' => 19],
            ['ten_quan_huyen' => 'Điện Biên', 'id_tinh_thanh' => 19],

            // Quận huyện của Đồng Nai (id_tinh_thanh = 20)
            ['ten_quan_huyen' => 'Biên Hòa', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Long Khánh', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Nhơn Trạch', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Trảng Bom', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Vĩnh Cửu', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Định Quán', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Cẩm Mỹ', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Tân Phú', 'id_tinh_thanh' => 20],
            ['ten_quan_huyen' => 'Long Thành', 'id_tinh_thanh' => 20],

            // Quận huyện của Đồng Tháp (id_tinh_thanh = 21)
            ['ten_quan_huyen' => 'Cao Lãnh', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Sa Đéc', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Hồng Ngự', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Tam Nông', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Tân Hồng', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Lấp Vò', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Thanh Bình', 'id_tinh_thanh' => 21],
            ['ten_quan_huyen' => 'Đồng Tháp', 'id_tinh_thanh' => 21],

            // Quận huyện của Gia Lai (id_tinh_thanh = 22)
            ['ten_quan_huyen' => 'Pleiku', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'An Khê', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Ayun Pa', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Chư Sê', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Chư Păh', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Ia Grai', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Krông Pa', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Kông Chro', 'id_tinh_thanh' => 22],
            ['ten_quan_huyen' => 'Phú Thiện', 'id_tinh_thanh' => 22],

            // Quận huyện của Hà Giang (id_tinh_thanh = 23)
            ['ten_quan_huyen' => 'Hà Giang', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Quản Bạ', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Yên Minh', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Vị Xuyên', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Bắc Mê', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Hoàng Su Phì', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Mèo Vạc', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Đồng Văn', 'id_tinh_thanh' => 23],
            ['ten_quan_huyen' => 'Tam Sơn', 'id_tinh_thanh' => 23],

            // Quận huyện của Hà Nam (id_tinh_thanh = 24)
            ['ten_quan_huyen' => 'Phủ Lý', 'id_tinh_thanh' => 24],
            ['ten_quan_huyen' => 'Duy Tiên', 'id_tinh_thanh' => 24],
            ['ten_quan_huyen' => 'Kim Bảng', 'id_tinh_thanh' => 24],
            ['ten_quan_huyen' => 'Thanh Liêm', 'id_tinh_thanh' => 24],
            ['ten_quan_huyen' => 'Lý Nhân', 'id_tinh_thanh' => 24],

            // Quận huyện của Hà Nội (TP) (id_tinh_thanh = 25)
            ['ten_quan_huyen' => 'Ba Đình', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Hoàn Kiếm', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Tây Hồ', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Long Biên', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Cầu Giấy', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Đống Đa', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Hai Bà Trưng', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Hoàng Mai', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Nam Từ Liêm', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Bắc Từ Liêm', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Sóc Sơn', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Mê Linh', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Đông Anh', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Thanh Trì', 'id_tinh_thanh' => 25],
            ['ten_quan_huyen' => 'Gia Lâm', 'id_tinh_thanh' => 25],

            // Quận huyện của Hà Tây (id_tinh_thanh = 26)
            ['ten_quan_huyen' => 'Thị xã Hà Đông', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Chương Mỹ', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Hà Đông', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Hoài Đức', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Mỹ Đức', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Phú Xuyên', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Quốc Oai', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Thanh Oai', 'id_tinh_thanh' => 26],
            ['ten_quan_huyen' => 'Thường Tín', 'id_tinh_thanh' => 26],

            // Quận huyện của Hà Tĩnh (id_tinh_thanh = 27)
            ['ten_quan_huyen' => 'Hà Tĩnh', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Cẩm Xuyên', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Kỳ Anh', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Hương Sơn', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Nghi Xuân', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Lộc Hà', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Thạch Hà', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Can Lộc', 'id_tinh_thanh' => 27],
            ['ten_quan_huyen' => 'Đức Thọ', 'id_tinh_thanh' => 27],

            // Quận huyện của Hải Dương (id_tinh_thanh = 28)
            ['ten_quan_huyen' => 'Chí Linh', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Kim Thành', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Kinh Môn', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Nam Sách', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Ninh Giang', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Thanh Hà', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Tứ Kỳ', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Gia Lộc', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Bình Giang', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Cẩm Giàng', 'id_tinh_thanh' => 28],
            ['ten_quan_huyen' => 'Thanh Miện', 'id_tinh_thanh' => 28],

            // Quận huyện của Hải Phòng (TP) (id_tinh_thanh = 29)
            ['ten_quan_huyen' => 'Hồng Bàng', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Ngô Quyền', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Lê Chân', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Kiến An', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Đồ Sơn', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Dương Kinh', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'An Dương', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'An Lão', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Bạch Long Vĩ', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Cát Hải', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Thủy Nguyên', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Vĩnh Bảo', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Tiên Lãng', 'id_tinh_thanh' => 29],
            ['ten_quan_huyen' => 'Kiến Thụy', 'id_tinh_thanh' => 29],

            // Quận huyện của Hòa Bình (id_tinh_thanh = 30)
            ['ten_quan_huyen' => 'Hòa Bình', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Lương Sơn', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Kim Bôi', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Cao Phong', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Tân Lạc', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Mai Châu', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Yên Thủy', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Đà Bắc', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Kỳ Sơn', 'id_tinh_thanh' => 30],
            ['ten_quan_huyen' => 'Lạc Sơn', 'id_tinh_thanh' => 30],

            // Quận huyện của Hồ Chí Minh (TP) (id_tinh_thanh = 31)
            ['ten_quan_huyen' => 'Quận 1', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 2', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 3', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 4', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 5', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 6', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 7', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 8', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 9', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 10', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 11', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Quận 12', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Bình Thạnh', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Tân Bình', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Tân Phú', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Gò Vấp', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Phú Nhuận', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Bình Tân', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Củ Chi', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Hóc Môn', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Nhà Bè', 'id_tinh_thanh' => 31],
            ['ten_quan_huyen' => 'Cần Giờ', 'id_tinh_thanh' => 31],

            // Quận huyện của Hậu Giang (id_tinh_thanh = 32)
            ['ten_quan_huyen' => 'Vị Thủy', 'id_tinh_thanh' => 32],
            ['ten_quan_huyen' => 'Long Mỹ', 'id_tinh_thanh' => 32],
            ['ten_quan_huyen' => 'Châu Thành A', 'id_tinh_thanh' => 32],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 32],
            ['ten_quan_huyen' => 'Phụng Hiệp', 'id_tinh_thanh' => 32],
            ['ten_quan_huyen' => 'Ngã Bảy', 'id_tinh_thanh' => 32],

            // Quận huyện của Hưng Yên (id_tinh_thanh = 33)
            ['ten_quan_huyen' => 'Hưng Yên', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Khoái Châu', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Kim Động', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Ân Thi', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Mỹ Hào', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Phù Cừ', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Tiên Lữ', 'id_tinh_thanh' => 33],
            ['ten_quan_huyen' => 'Yên Mỹ', 'id_tinh_thanh' => 33],

            // Quận huyện của Khánh Hòa (id_tinh_thanh = 34)
            ['ten_quan_huyen' => 'Nha Trang', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Cam Ranh', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Vạn Ninh', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Khánh Vĩnh', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Diên Khánh', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Trường Sa', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Cam Lâm', 'id_tinh_thanh' => 34],
            ['ten_quan_huyen' => 'Khánh Sơn', 'id_tinh_thanh' => 34],

            // Quận huyện của Kiên Giang (id_tinh_thanh = 35)
            ['ten_quan_huyen' => 'Rạch Giá', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Phú Quốc', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Hòn Đất', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Giồng Riềng', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Tây Yên', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Vĩnh Thuận', 'id_tinh_thanh' => 35],
            ['ten_quan_huyen' => 'Kiên Lương', 'id_tinh_thanh' => 35],

            // Quận huyện của Kon Tum (id_tinh_thanh = 36)
            ['ten_quan_huyen' => 'Kon Tum', 'id_tinh_thanh' => 36],
            ['ten_quan_huyen' => 'Sa Thầy', 'id_tinh_thanh' => 36],
            ['ten_quan_huyen' => 'Đăk Hà', 'id_tinh_thanh' => 36],
            ['ten_quan_huyen' => 'Ngọc Hồi', 'id_tinh_thanh' => 36],
            ['ten_quan_huyen' => 'Tu Mơ Rông', 'id_tinh_thanh' => 36],
            ['ten_quan_huyen' => 'Ia H’Drai', 'id_tinh_thanh' => 36],

            // Quận huyện của Lai Châu (id_tinh_thanh = 37)
            ['ten_quan_huyen' => 'Lai Châu', 'id_tinh_thanh' => 37],
            ['ten_quan_huyen' => 'Mường Tè', 'id_tinh_thanh' => 37],
            ['ten_quan_huyen' => 'Sìn Hồ', 'id_tinh_thanh' => 37],
            ['ten_quan_huyen' => 'Tam Đường', 'id_tinh_thanh' => 37],
            ['ten_quan_huyen' => 'Phong Thổ', 'id_tinh_thanh' => 37],
            ['ten_quan_huyen' => 'Tân Uyên', 'id_tinh_thanh' => 37],

            ['ten_quan_huyen' => 'Lào Cai', 'id_tinh_thanh' => 38],
            ['ten_quan_huyen' => 'Bát Xát', 'id_tinh_thanh' => 38],
            ['ten_quan_huyen' => 'Mường Khương', 'id_tinh_thanh' => 38],
            ['ten_quan_huyen' => 'Si Ma Cai', 'id_tinh_thanh' => 38],
            ['ten_quan_huyen' => 'Văn Bàn', 'id_tinh_thanh' => 38],
            ['ten_quan_huyen' => 'Sa Pa', 'id_tinh_thanh' => 38],

            // Quận huyện của Lạng Sơn (id_tinh_thanh = 39)
            ['ten_quan_huyen' => 'Lạng Sơn', 'id_tinh_thanh' => 39],
            ['ten_quan_huyen' => 'Cao Lộc', 'id_tinh_thanh' => 39],
            ['ten_quan_huyen' => 'Đình Lập', 'id_tinh_thanh' => 39],
            ['ten_quan_huyen' => 'Hữu Lũng', 'id_tinh_thanh' => 39],
            ['ten_quan_huyen' => 'Lộc Bình', 'id_tinh_thanh' => 39],
            ['ten_quan_huyen' => 'Tràng Định', 'id_tinh_thanh' => 39],

            // Quận huyện của Lâm Đồng (id_tinh_thanh = 40)
            ['ten_quan_huyen' => 'Đà Lạt', 'id_tinh_thanh' => 40],
            ['ten_quan_huyen' => 'Bảo Lâm', 'id_tinh_thanh' => 40],
            ['ten_quan_huyen' => 'Đơn Dương', 'id_tinh_thanh' => 40],
            ['ten_quan_huyen' => 'Lâm Hà', 'id_tinh_thanh' => 40],
            ['ten_quan_huyen' => 'Lạc Dương', 'id_tinh_thanh' => 40],
            ['ten_quan_huyen' => 'Cát Tiên', 'id_tinh_thanh' => 40],

            // Quận huyện của Long An (id_tinh_thanh = 41)
            ['ten_quan_huyen' => 'Tân An', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Bến Lức', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Cần Đước', 'id_tinh_thanh' => 2],
            ['ten_quan_huyen' => 'Cần Giuộc', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Cần Đước', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Tân Hưng', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Thạnh Hóa', 'id_tinh_thanh' => 41],
            ['ten_quan_huyen' => 'Mộc Hóa', 'id_tinh_thanh' => 41],

            // Quận huyện của Nam Định (id_tinh_thanh = 42)
            ['ten_quan_huyen' => 'Nam Định', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Mỹ Lộc', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Vụ Bản', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Ý Yên', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Hải Hậu', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Trực Ninh', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Xuân Trường', 'id_tinh_thanh' => 42],
            ['ten_quan_huyen' => 'Nghĩa Hưng', 'id_tinh_thanh' => 42],

            // Quận huyện của Nghệ An (id_tinh_thanh = 43)
            ['ten_quan_huyen' => 'Vinh', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Cửa Lò', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Nghĩa Đàn', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Thanh Chương', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Đô Lương', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Hưng Nguyên', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Quỳnh Lưu', 'id_tinh_thanh' => 43],
            ['ten_quan_huyen' => 'Nam Đàn', 'id_tinh_thanh' => 43],

            // Quận huyện của Ninh Bình (id_tinh_thanh = 44)
            ['ten_quan_huyen' => 'Ninh Bình', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Tam Điệp', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Gia Viễn', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Hoa Lư', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Yên Khánh', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Kim Sơn', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Nho Quan', 'id_tinh_thanh' => 44],
            ['ten_quan_huyen' => 'Sao Đỏ', 'id_tinh_thanh' => 44],

            // Quận huyện của Ninh Thuận (id_tinh_thanh = 45)
            ['ten_quan_huyen' => 'Phan Rang-Tháp Chàm', 'id_tinh_thanh' => 45],
            ['ten_quan_huyen' => 'Ninh Hải', 'id_tinh_thanh' => 45],
            ['ten_quan_huyen' => 'Ninh Sơn', 'id_tinh_thanh' => 45],
            ['ten_quan_huyen' => 'Bác Ái', 'id_tinh_thanh' => 45],

            // Quận huyện của Phú Thọ (id_tinh_thanh = 46)
            ['ten_quan_huyen' => 'Việt Trì', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Phù Ninh', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Lâm Thao', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Tam Nông', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Thanh Sơn', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Hạ Hòa', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Yên Lập', 'id_tinh_thanh' => 46],
            ['ten_quan_huyen' => 'Cẩm Khê', 'id_tinh_thanh' => 46],

            // Quận huyện của Phú Yên (id_tinh_thanh = 47)
            ['ten_quan_huyen' => 'Tuy Hòa', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Sông Cầu', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Tuy An', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Đồng Xuân', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Sơn Hòa', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Phú Hòa', 'id_tinh_thanh' => 47],
            ['ten_quan_huyen' => 'Thị xã Đông Hòa', 'id_tinh_thanh' => 47],

            // Quận huyện của Quảng Bình (id_tinh_thanh = 48)
            ['ten_quan_huyen' => 'Đồng Hới', 'id_tinh_thanh' => 48],
            ['ten_quan_huyen' => 'Bố Trạch', 'id_tinh_thanh' => 48],
            ['ten_quan_huyen' => 'Quảng Trạch', 'id_tinh_thanh' => 48],
            ['ten_quan_huyen' => 'Lệ Thủy', 'id_tinh_thanh' => 48],
            ['ten_quan_huyen' => 'Tuyên Hóa', 'id_tinh_thanh' => 48],
            ['ten_quan_huyen' => 'Minh Hóa', 'id_tinh_thanh' => 48],

            // Quận huyện của Quảng Nam (id_tinh_thanh = 49)
            ['ten_quan_huyen' => 'Tam Kỳ', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Hội An', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Duy Xuyên', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Điện Bàn', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Thăng Bình', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Quế Sơn', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Hiệp Đức', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Nông Sơn', 'id_tinh_thanh' => 49],
            ['ten_quan_huyen' => 'Phước Sơn', 'id_tinh_thanh' => 49],

            // Quận huyện của Quảng Ngãi (id_tinh_thanh = 50)
            ['ten_quan_huyen' => 'Quảng Ngãi', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Sơn Tịnh', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Tư Nghĩa', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Trà Bồng', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Bình Sơn', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Minh Long', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Nghĩa Hành', 'id_tinh_thanh' => 50],
            ['ten_quan_huyen' => 'Mộ Đức', 'id_tinh_thanh' => 50],

            // Quận huyện của Quảng Ninh (id_tinh_thanh = 51)
            ['ten_quan_huyen' => 'Hạ Long', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Cẩm Phả', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Móng Cái', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Uông Bí', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Đầm Hà', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Tiên Yên', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Ba Chẽ', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Vân Đồn', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Bình Liêu', 'id_tinh_thanh' => 51],
            ['ten_quan_huyen' => 'Hải Hà', 'id_tinh_thanh' => 51],

            // Quận huyện của Quảng Trị (id_tinh_thanh = 52)
            ['ten_quan_huyen' => 'Đông Hà', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Quảng Trị', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Gio Linh', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Vĩnh Linh', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Cam Lộ', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Hải Lăng', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Triệu Phong', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Đakrông', 'id_tinh_thanh' => 52],
            ['ten_quan_huyen' => 'Hướng Hóa', 'id_tinh_thanh' => 52],

            // Quận huyện của Sóc Trăng (id_tinh_thanh = 53)
            ['ten_quan_huyen' => 'Sóc Trăng', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Kế Sách', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Long Phú', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Mỹ Tú', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Ngã Năm', 'id_tinh_thanh' => 53],
            ['ten_quan_huyen' => 'Vĩnh Châu', 'id_tinh_thanh' => 53],

            // Quận huyện của Sơn La (id_tinh_thanh = 54)
            ['ten_quan_huyen' => 'Sơn La', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Quỳnh Nhai', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Mường La', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Phù Yên', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Mộc Châu', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Yên Châu', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Mai Sơn', 'id_tinh_thanh' => 54],
            ['ten_quan_huyen' => 'Sốp Cộp', 'id_tinh_thanh' => 54],

            // Quận huyện của Tây Ninh (id_tinh_thanh = 55)
            ['ten_quan_huyen' => 'Tây Ninh', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Tân Biên', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Tân Châu', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Dương Minh Châu', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Hòa Thành', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Gò Dầu', 'id_tinh_thanh' => 55],
            ['ten_quan_huyen' => 'Bến Cầu', 'id_tinh_thanh' => 55],

            // Quận huyện của Thái Bình (id_tinh_thanh = 56)
            ['ten_quan_huyen' => 'Thái Bình', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Quỳnh Phụ', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Hưng Hà', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Vũ Thư', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Kiến Xương', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Tiền Hải', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Thái Thụy', 'id_tinh_thanh' => 56],
            ['ten_quan_huyen' => 'Đông Hưng', 'id_tinh_thanh' => 56],

            // Quận huyện của Thái Nguyên (id_tinh_thanh = 57)
            ['ten_quan_huyen' => 'Thái Nguyên', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Sông Công', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Phổ Yên', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Đại Từ', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Võ Nhai', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Phú Lương', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Định Hóa', 'id_tinh_thanh' => 57],
            ['ten_quan_huyen' => 'Cây Dương', 'id_tinh_thanh' => 57],

            // Quận huyện của Thanh Hóa (id_tinh_thanh = 58)
            ['ten_quan_huyen' => 'Thanh Hóa', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Bỉm Sơn', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Sầm Sơn', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Mường Lát', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Quan Hóa', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Ngọc Lặc', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Hậu Lộc', 'id_tinh_thanh' => 58],
            ['ten_quan_huyen' => 'Triệu Sơn', 'id_tinh_thanh' => 58],

            // Quận huyện của Thừa Thiên - Huế (id_tinh_thanh = 59)
            ['ten_quan_huyen' => 'Huế', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'Hương Thủy', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'Hương Trà', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'Phú Lộc', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'A Lưới', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'Quảng Điền', 'id_tinh_thanh' => 59],
            ['ten_quan_huyen' => 'Phú Vang', 'id_tinh_thanh' => 59],

            // Quận huyện của Tiền Giang (id_tinh_thanh = 60)
            ['ten_quan_huyen' => 'Mỹ Tho', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Gò Công', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Cái Bè', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Tân Phú Đông', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Chợ Gạo', 'id_tinh_thanh' => 60],
            ['ten_quan_huyen' => 'Cai Lậy', 'id_tinh_thanh' => 60],

            // Quận huyện của Trà Vinh (id_tinh_thanh = 61)
            ['ten_quan_huyen' => 'Trà Vinh', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Càng Long', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Cầu Kè', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Cầu Ngang', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Duyên Hải', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Tiểu Cần', 'id_tinh_thanh' => 61],
            ['ten_quan_huyen' => 'Châu Thành', 'id_tinh_thanh' => 61],

            // Quận huyện của Tuyên Quang (id_tinh_thanh = 62)
            ['ten_quan_huyen' => 'Tuyên Quang', 'id_tinh_thanh' => 62],
            ['ten_quan_huyen' => 'Lâm Bình', 'id_tinh_thanh' => 62],
            ['ten_quan_huyen' => 'Nà Hang', 'id_tinh_thanh' => 62],
            ['ten_quan_huyen' => 'Sơn Dương', 'id_tinh_thanh' => 62],
            ['ten_quan_huyen' => 'Yên Sơn', 'id_tinh_thanh' => 62],
            ['ten_quan_huyen' => 'Hàm Yên', 'id_tinh_thanh' => 62],

            // Quận huyện của Vĩnh Long (id_tinh_thanh = 63)
            ['ten_quan_huyen' => 'Vĩnh Long', 'id_tinh_thanh' => 63],
            ['ten_quan_huyen' => 'Mang Thít', 'id_tinh_thanh' => 63],
            ['ten_quan_huyen' => 'Tam Bình', 'id_tinh_thanh' => 63],
            ['ten_quan_huyen' => 'Trà Ôn', 'id_tinh_thanh' => 63],
            ['ten_quan_huyen' => 'Vũng Liêm', 'id_tinh_thanh' => 63],
            ['ten_quan_huyen' => 'Long Hồ', 'id_tinh_thanh' => 63],

            // Quận huyện của Vĩnh Phúc (id_tinh_thanh = 64)
            ['ten_quan_huyen' => 'Vĩnh Yên', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Phúc Yên', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Lập Thạch', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Tam Đảo', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Sông Lô', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Yên Lạc', 'id_tinh_thanh' => 64],
            ['ten_quan_huyen' => 'Bình Xuyên', 'id_tinh_thanh' => 64],

            // Quận huyện của Yên Bái (id_tinh_thanh = 65)
            ['ten_quan_huyen' => 'Yên Bái', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Văn Yên', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Lục Yên', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Mù Cang Chải', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Trấn Yên', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Trạm Tấu', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Văn Chấn', 'id_tinh_thanh' => 65],
            ['ten_quan_huyen' => 'Yên Bình', 'id_tinh_thanh' => 65],
        ]);
    }
}
