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
        foreach (range(1, 70) as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 1,
            ]);
        }

        // Quản lý cửa hàng (ID = 2)
        $managerFunctions = array_merge(
            range(1, 8),    // nhân viên
            range(9, 14),   // khách hàng
            range(15, 21),  // danh mục
            [22, 23, 29],   // xem phân quyền
            range(31, 38),  // thương hiệu
            range(39, 44)   // sản phẩm
        );
        foreach ($managerFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 2,
            ]);
        }

        // Quản lý phân quyền (ID = 3)
        $phanQuyenFunctions = [22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
        foreach ($phanQuyenFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 3,
            ]);
        }

        // Nhân viên bán hàng (ID = 4)
        $salesFunctions = [
            7, 8,               // đơn hàng
            9, 10, 11, 13, 14,  // khách
            39, 42,             // sản phẩm xem/tìm
            45, 48,             // biến thể xem/tìm
            50, 51, 54          // ảnh
        ];
        foreach ($salesFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 4,
            ]);
        }

        // Nhân viên kho (ID = 5)
        $warehouseFunctions = array_merge(
            range(38, 44),  // sản phẩm
            range(45, 50),  // biến thể
            [51, 52, 53, 54] // ảnh sản phẩm
        );
        foreach ($warehouseFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 5,
            ]);
        }

        // Nhân viên chăm sóc khách hàng (ID = 6)
        $cskhFunctions = [
            7, 8,              // đơn hàng
            10, 11, 13, 14,    // khách hàng
            39, 42             // sản phẩm xem/tìm
        ];
        foreach ($cskhFunctions as $id) {
            DB::table('phan_quyens')->insert([
                'id_chuc_nang' => $id,
                'id_chuc_vu' => 6,
            ]);
        }
    }
}
