<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chuc_nangs')->truncate();

        $chucNang = [
            ['id' => 1, 'ten_chuc_nang' => 'Lấy dữ liệu nhân viên'],
            ['id' => 2, 'ten_chuc_nang' => 'Tạo mới nhân viên'],
            ['id' => 3, 'ten_chuc_nang' => 'Cập nhật nhân viên'],
            ['id' => 4, 'ten_chuc_nang' => 'Xoá nhân viên'],
            ['id' => 5, 'ten_chuc_nang' => 'Tìm kiếm nhân viên'],
            ['id' => 6, 'ten_chuc_nang' => 'Thay đổi trạng thái nhân viên'],
            ['id' => 7, 'ten_chuc_nang' => 'Lấy đơn hàng nhân viên'],
            ['id' => 8, 'ten_chuc_nang' => 'Xác nhận đơn hàng'],

            ['id' => 9, 'ten_chuc_nang' => 'Tạo mới khách hàng'],
            ['id' => 10, 'ten_chuc_nang' => 'Lấy dữ liệu khách hàng'],
            ['id' => 11, 'ten_chuc_nang' => 'Cập nhật khách hàng'],
            ['id' => 12, 'ten_chuc_nang' => 'Xoá khách hàng'],
            ['id' => 13, 'ten_chuc_nang' => 'Tìm kiếm khách hàng'],
            ['id' => 14, 'ten_chuc_nang' => 'Thay đổi trạng thái khách hàng'],

            ['id' => 15, 'ten_chuc_nang' => 'Lấy dữ liệu danh mục'],
            ['id' => 16, 'ten_chuc_nang' => 'Tạo mới danh mục'],
            ['id' => 17, 'ten_chuc_nang' => 'Cập nhật danh mục'],
            ['id' => 18, 'ten_chuc_nang' => 'Xoá danh mục'],
            ['id' => 19, 'ten_chuc_nang' => 'Tìm kiếm danh mục'],
            ['id' => 20, 'ten_chuc_nang' => 'Thay đổi trạng thái danh mục'],
            ['id' => 21, 'ten_chuc_nang' => 'Lấy danh mục đang hoạt động'],

            ['id' => 22, 'ten_chuc_nang' => 'Lấy dữ liệu chức năng'],
            ['id' => 23, 'ten_chuc_nang' => 'Lấy dữ liệu chức vụ'],
            ['id' => 24, 'ten_chuc_nang' => 'Xoá chức vụ'],
            ['id' => 25, 'ten_chuc_nang' => 'Cập nhật chức vụ'],
            ['id' => 26, 'ten_chuc_nang' => 'Tạo mới chức vụ'],
            ['id' => 27, 'ten_chuc_nang' => 'Thay đổi trạng thái chức vụ'],
            ['id' => 28, 'ten_chuc_nang' => 'Cấp quyền cho chức vụ'],
            ['id' => 29, 'ten_chuc_nang' => 'Lấy dữ liệu chi tiết phân quyền'],
            ['id' => 30, 'ten_chuc_nang' => 'Xoá chi tiết phân quyền'],
            ['id' => 31, 'ten_chuc_nang' => 'Tìm kiếm chức vụ'],

            ['id' => 32, 'ten_chuc_nang' => 'Lấy dữ liệu thương hiệu'],
            ['id' => 33, 'ten_chuc_nang' => 'Tạo mới thương hiệu'],
            ['id' => 34, 'ten_chuc_nang' => 'Cập nhật thương hiệu'],
            ['id' => 35, 'ten_chuc_nang' => 'Xoá thương hiệu'],
            ['id' => 36, 'ten_chuc_nang' => 'Tìm kiếm thương hiệu'],
            ['id' => 37, 'ten_chuc_nang' => 'Thay đổi trạng thái thương hiệu'],
            ['id' => 38, 'ten_chuc_nang' => 'Lấy thương hiệu đang hoạt động'],

            ['id' => 39, 'ten_chuc_nang' => 'Tạo mới sản phẩm'],
            ['id' => 40, 'ten_chuc_nang' => 'Lấy dữ liệu sản phẩm'],
            ['id' => 41, 'ten_chuc_nang' => 'Cập nhật sản phẩm'],
            ['id' => 42, 'ten_chuc_nang' => 'Xoá sản phẩm'],
            ['id' => 43, 'ten_chuc_nang' => 'Tìm kiếm sản phẩm'],
            ['id' => 44, 'ten_chuc_nang' => 'Thay đổi trạng thái sản phẩm'],

            ['id' => 45, 'ten_chuc_nang' => 'Tạo mới biến thể sản phẩm'],
            ['id' => 46, 'ten_chuc_nang' => 'Lấy dữ liệu biến thể sản phẩm'],
            ['id' => 47, 'ten_chuc_nang' => 'Cập nhật biến thể sản phẩm'],
            ['id' => 48, 'ten_chuc_nang' => 'Xoá biến thể sản phẩm'],
            ['id' => 49, 'ten_chuc_nang' => 'Tìm kiếm biến thể sản phẩm'],
            ['id' => 50, 'ten_chuc_nang' => 'Thay đổi trạng thái biến thể sản phẩm'],

            ['id' => 51, 'ten_chuc_nang' => 'Lấy hình ảnh sản phẩm'],
            ['id' => 52, 'ten_chuc_nang' => 'Lấy chi tiết hình ảnh sản phẩm'],
            ['id' => 53, 'ten_chuc_nang' => 'Tạo hình ảnh sản phẩm'],
            ['id' => 54, 'ten_chuc_nang' => 'Xoá hình ảnh sản phẩm'],
            ['id' => 55, 'ten_chuc_nang' => 'Tìm kiếm hình ảnh sản phẩm'],

            ['id' => 56, 'ten_chuc_nang' => 'Lấy dữ liệu tỉnh thành'],
            ['id' => 57, 'ten_chuc_nang' => 'Tạo tỉnh thành'],
            ['id' => 58, 'ten_chuc_nang' => 'Cập nhật tỉnh thành'],
            ['id' => 59, 'ten_chuc_nang' => 'Xoá tỉnh thành'],
            ['id' => 60, 'ten_chuc_nang' => 'Tìm kiếm tỉnh thành'],

            ['id' => 61, 'ten_chuc_nang' => 'Tạo quận huyện'],
            ['id' => 62, 'ten_chuc_nang' => 'Cập nhật quận huyện'],
            ['id' => 63, 'ten_chuc_nang' => 'Xoá quận huyện'],
            ['id' => 64, 'ten_chuc_nang' => 'Lấy dữ liệu quận huyện'],
            ['id' => 65, 'ten_chuc_nang' => 'Tìm kiếm quận huyện'],

            ['id' => 66, 'ten_chuc_nang' => 'Tạo phường xã'],
            ['id' => 67, 'ten_chuc_nang' => 'Cập nhật phường xã'],
            ['id' => 68, 'ten_chuc_nang' => 'Xoá phường xã'],
            ['id' => 69, 'ten_chuc_nang' => 'Lấy dữ liệu phường xã'],
            ['id' => 70, 'ten_chuc_nang' => 'Tìm kiếm phường xã'],
        ];

        DB::table('chuc_nangs')->insert($chucNang);
    }
}
