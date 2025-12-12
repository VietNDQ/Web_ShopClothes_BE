<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietPhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('phan_quyens')->truncate();

        // Quản trị viên - toàn quyền (ID = 1)
        foreach (range(1, 82) as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 1,
            ]);
        }

        // Quản lý cửa hàng (ID = 2) - Quyền quản lý toàn bộ hoạt động cửa hàng
        $managerFunctions = array_merge(
            range(1, 8),        // Nhân viên (xem, tạo, sửa, xóa, tìm kiếm, đổi trạng thái, quản lý đơn hàng)
            range(9, 14),       // Khách hàng (toàn bộ)
            range(15, 21),     // Danh mục (toàn bộ)
            [22, 23, 29],      // Xem phân quyền (chỉ xem, không sửa)
            range(31, 38),     // Thương hiệu (toàn bộ)
            range(39, 44),     // Sản phẩm (toàn bộ)
            range(45, 50),     // Biến thể sản phẩm (toàn bộ)
            [51, 52, 53, 54],  // Hình ảnh sản phẩm (toàn bộ)
            range(71, 76),     // Thống kê (toàn bộ)
            range(77, 81)      // Voucher (toàn bộ, trừ kiểm tra voucher - công khai)
        );
        foreach ($managerFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 2,
            ]);
        }

        // Quản lý phân quyền (ID = 3) - Chỉ quản lý phân quyền và chức vụ
        $phanQuyenFunctions = [22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
        foreach ($phanQuyenFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 3,
            ]);
        }

        // Nhân viên bán hàng (ID = 4) - Quyền xử lý đơn hàng và hỗ trợ khách hàng
        $salesFunctions = [
            // Đơn hàng
            7, 8,               // Xem đơn hàng, xác nhận đơn hàng
            
            // Khách hàng
            10, 11, 13, 14,      // Xem, cập nhật, tìm kiếm, đổi trạng thái khách hàng
            
            // Sản phẩm (chỉ xem để tư vấn)
            40, 42, 43,         // Xem, xóa (nếu cần), tìm kiếm sản phẩm
            
            // Biến thể (chỉ xem)
            46, 48, 49,        // Xem, xóa (nếu cần), tìm kiếm biến thể
            
            // Hình ảnh (chỉ xem)
            51, 52, 54,        // Xem hình ảnh, chi tiết, xóa (nếu cần)
            
            // Thống kê (chỉ xem cơ bản)
            71, 73,            // Xem tổng quan, thống kê đơn hàng
            
            // Voucher (chỉ xem và kiểm tra)
            77, 82             // Xem voucher, kiểm tra voucher
        ];
        foreach ($salesFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 4,
            ]);
        }

        // Quản lý kho (ID = 5) - Quyền quản lý sản phẩm và kho hàng
        $warehouseFunctions = array_merge(
            // Sản phẩm (toàn bộ)
            range(39, 44),
            
            // Biến thể sản phẩm (toàn bộ)
            range(45, 50),
            
            // Hình ảnh sản phẩm (toàn bộ)
            [51, 52, 53, 54],
            
            // Danh mục (chỉ xem để phân loại)
            [15, 19, 21],
            
            // Thương hiệu (chỉ xem)
            [32, 36, 38],
            
            // Đơn hàng (chỉ xem để theo dõi xuất kho)
            [7],
            
            // Thống kê (xem thống kê sản phẩm và kho)
            [71, 74, 76]
        );
        foreach ($warehouseFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 5,
            ]);
        }

        // Nhân viên chăm sóc khách hàng (ID = 6) - Quyền hỗ trợ và xử lý đơn hàng
        $cskhFunctions = [
            // Đơn hàng
            7, 8,              // Xem đơn hàng, xác nhận đơn hàng (hỗ trợ khách hàng)
            
            // Khách hàng
            10, 11, 13, 14,    // Xem, cập nhật, tìm kiếm, đổi trạng thái khách hàng
            
            // Sản phẩm (chỉ xem để tư vấn)
            40, 42, 43,       // Xem, xóa (nếu cần), tìm kiếm sản phẩm
            
            // Hình ảnh (chỉ xem)
            51, 52,           // Xem hình ảnh, chi tiết
            
            // Voucher (chỉ xem và kiểm tra)
            77, 82            // Xem voucher, kiểm tra voucher
        ];
        foreach ($cskhFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 6,
            ]);
        }
    }
}
