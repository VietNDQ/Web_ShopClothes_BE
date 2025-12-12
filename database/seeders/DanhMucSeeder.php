<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('danh_mucs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /**
         * Danh sách các danh mục sản phẩm quần áo
         * tinh_trang: 1 = Hoạt động, 0 = Không hoạt động
         */
        DB::table('danh_mucs')->insert([
            // Áo
            ['ten_danh_muc' => 'Áo Thun', 'hinh_anh' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Sơ Mi', 'hinh_anh' => 'https://static.zara.net/assets/public/63da/7bab/a0144e79880c/95bbb8a71d53/04470433400-p/04470433400-p.jpg?ts=1742912166181&w=352&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Polo', 'hinh_anh' => 'https://product.hstatic.net/200000690765/product/vn-11134207-7r98o-lp3d6wvqsi1n73_154a9696b063472e9e8f76e264ec364f_master.jpeg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Khoác', 'hinh_anh' => 'https://im.uniqlo.com/global-cms/spa/res6aec0946d5c3218cb243717f27f6041afr.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Hoodie', 'hinh_anh' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/uniqlo-ultra-light-down-jacket-449631-09-01.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Len', 'hinh_anh' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7ras8-m26uhtaysb0461', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Vest', 'hinh_anh' => 'https://static.zara.net/assets/public/5e5b/fbfb/387342848a7c/e7bd628a576e/07200401251-p/07200401251-p.jpg?ts=1738760590844&w=426&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Ba Lỗ', 'hinh_anh' => 'https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Khoác Gió', 'hinh_anh' => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Dài', 'hinh_anh' => 'https://static.zara.net/assets/public/889e/9432/fb7f477ebf50/c4512e9786f7/01063322527-p/01063322527-p.jpg?ts=1740674655940&w=744&f=auto', 'tinh_trang' => 1],
            
            // Quần
            ['ten_danh_muc' => 'Quần Jeans', 'hinh_anh' => 'https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Kaki', 'hinh_anh' => 'https://im.uniqlo.com/global-cms/spa/res25bd74e53bdb1e0881d782f85ba5b9f6fr.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Short', 'hinh_anh' => 'https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Tây', 'hinh_anh' => 'https://static.zara.net/assets/public/ad2b/4e92/894a446c8dd9/c1554d336a66/04583823485-000-a1/04583823485-000-a1.jpg?ts=1743158013010&w=352&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Jogger', 'hinh_anh' => 'https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Legging', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmm2JGm4n3ErBm-Eco6y3RENzmVxoP65fzZNmtcShi7NaK0hn_V0hmNVSIbRAKK7bOziw&usqp=CAU', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Thun', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2awdoSV92D3WT0vTJQrI4icS03uTN5qH4X8NkntEkn6mqDIxAKx3QGS0ZruN1y5ov0Ng&usqp=CAU', 'tinh_trang' => 1],
            
            // Váy & Đầm
            ['ten_danh_muc' => 'Váy Ngắn', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Váy Dài', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/8f7c4bd0b7cd0f598f9f81b4e5e3d4ed.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Váy Dự Tiệc', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4e887dffa9af0cc1c62ffc97ed96bbd7.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Đầm', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4d56c75d277db5a0042cf840d54040f1.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Đầm Maxi', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Đầm Ôm', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/8f7c4bd0b7cd0f598f9f81b4e5e3d4ed.png', 'tinh_trang' => 1],
            
            // Set & Bộ
            ['ten_danh_muc' => 'Bộ Đồ Thể Thao', 'hinh_anh' => 'https://sneakerdaily.vn/wp-content/uploads/2024/07/Ao-Nike-Miler-Mens-Dri-FIT-Short-Sleeve-Running-Top-FV9900-010.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Bộ Đồ Ngủ', 'hinh_anh' => 'https://product.hstatic.net/200000690765/product/vn-11134207-7r98o-lp3d6wvqsi1n73_154a9696b063472e9e8f76e264ec364f_master.jpeg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Set Đồ Nam', 'hinh_anh' => 'https://static.zara.net/assets/public/63da/7bab/a0144e79880c/95bbb8a71d53/04470433400-p/04470433400-p.jpg?ts=1742912166181&w=352&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Set Đồ Nữ', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png', 'tinh_trang' => 1],
            
            // Giày & Dép
            ['ten_danh_muc' => 'Giày Thể Thao', 'hinh_anh' => 'https://supersports.com.vn/cdn/shop/files/FN2799-478-1_1200x1200.jpg?v=1726563551', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Giày Tây', 'hinh_anh' => 'https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Giày Cao Gót', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4d56c75d277db5a0042cf840d54040f1.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Giày Búp Bê', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4e887dffa9af0cc1c62ffc97ed96bbd7.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Dép', 'hinh_anh' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqghiicxs0fr1e', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Sandal', 'hinh_anh' => 'https://im.uniqlo.com/global-cms/spa/res6aec0946d5c3218cb243717f27f6041afr.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Giày Boots', 'hinh_anh' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/uniqlo-ultra-light-down-jacket-449631-09-01.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Giày Sneaker', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2awdoSV92D3WT0vTJQrI4icS03uTN5qH4X8NkntEkn6mqDIxAKx3QGS0ZruN1y5ov0Ng&usqp=CAU', 'tinh_trang' => 1],
            
            // Phụ Kiện
            ['ten_danh_muc' => 'Túi Xách', 'hinh_anh' => 'https://static.zara.net/assets/public/5e5b/fbfb/387342848a7c/e7bd628a576e/07200401251-p/07200401251-p.jpg?ts=1738760590844&w=426&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Balo', 'hinh_anh' => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Ví', 'hinh_anh' => 'https://static.zara.net/assets/public/889e/9432/fb7f477ebf50/c4512e9786f7/01063322527-p/01063322527-p.jpg?ts=1740674655940&w=744&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Thắt Lưng', 'hinh_anh' => 'https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Nón', 'hinh_anh' => 'https://pos.nvncdn.com/4ef0bf-108661/art/artCT/20220812_5GF6baYd5EKSp78w7xjJxjnM.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Mũ Lưỡi Trai', 'hinh_anh' => 'https://static.hotdeal.vn/images/416/416210/400x500/91408-ao-so-mi-nam-zara-phong-cach-91406-vn-2.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Kính Mát', 'hinh_anh' => 'https://vanauthentic.com/thumbs/500x500x2/upload/product/502c88c7855e4e65ababe28ef656f0e9_5466.jpeg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Đồng Hồ', 'hinh_anh' => 'https://golfgroup.com.vn/wp-content/uploads/2022/09/hinh-anh-ao-coc-tay-golf-adidas-hc5353-5-1-445x445.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Vòng Tay', 'hinh_anh' => 'https://mcdn.coolmate.me/image/August2022/phoi-quan-jean-voi-giay-adidas-1-1_36.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Dây Chuyền', 'hinh_anh' => 'https://static.zara.net/assets/public/ad2b/4e92/894a446c8dd9/c1554d336a66/04583823485-000-a1/04583823485-000-a1.jpg?ts=1743158013010&w=352&f=auto', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Khăn Choàng', 'hinh_anh' => 'https://static.ftshp.digital/img/p/9/7/4/0/7/4/974074.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Găng Tay', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmm2JGm4n3ErBm-Eco6y3RENzmVxoP65fzZNmtcShi7NaK0hn_V0hmNVSIbRAKK7bOziw&usqp=CAU', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Tất', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2awdoSV92D3WT0vTJQrI4icS03uTN5qH4X8NkntEkn6mqDIxAKx3QGS0ZruN1y5ov0Ng&usqp=CAU', 'tinh_trang' => 1],
            
            // Đồ Lót
            ['ten_danh_muc' => 'Áo Lót', 'hinh_anh' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Lót', 'hinh_anh' => 'https://product.hstatic.net/200000690765/product/vn-11134207-7r98o-lp3d6wvqsi1n73_154a9696b063472e9e8f76e264ec364f_master.jpeg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Đồ Lót Nam', 'hinh_anh' => 'https://static.zara.net/assets/public/63da/7bab/a0144e79880c/95bbb8a71d53/04470433400-p/04470433400-p.jpg?ts=1742912166181&w=352&f=auto', 'tinh_trang' => 1],
            
            // Trang Phục Trẻ Em
            ['ten_danh_muc' => 'Đồ Trẻ Em', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/4b185d5a4f6f3955573b642123170c2c.png', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Áo Trẻ Em', 'hinh_anh' => 'https://sneakerdaily.vn/wp-content/uploads/2024/01/Ao-Nike-Sportswear-Classic-Womens-T-Shirt-FQ6601-100.jpg', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Quần Trẻ Em', 'hinh_anh' => 'https://assetmanagerpim-res.cloudinary.com/images/w_450/q_90/b961f358ffab4cc78ff934fb8c142be7_9366/IS1699_21_model.WebP', 'tinh_trang' => 1],
            ['ten_danh_muc' => 'Váy Trẻ Em', 'hinh_anh' => 'https://pubcdn.ivymoda.com/files/news/2022/03/16/8f7c4bd0b7cd0f598f9f81b4e5e3d4ed.png', 'tinh_trang' => 1],
        ]);
    }
}
