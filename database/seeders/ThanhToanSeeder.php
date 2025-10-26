<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2025, 1, 1);
        $endDate    = Carbon::create(2025, 11, 1);
        DB::table('thanh_toans')->delete();
        DB::table('thanh_toans')->truncate();
        DB::table('thanh_toans')->insert([
            [
                'ma_don_hang'          => 'DHe503bff4-a914-4f93-9d67-e9593101fd911',
                'id_khach_hang'       => 1,
                'id_don_hang'         => 1,
                'id_dia_chi_giao_hang' => 1,
                'tong_tien'           => 2730000.00,
                'phuong_thuc_thanh_toan' => 1, // COD
                'ghi_chu'             => null,
                'hash_thanh_toan'     => null,
                'is_thanh_toan'       => 1, // Đã thanh toán
                'ngay_thanh_toan'     => Carbon::create(2025, 6, 16, 18, 26, 9),
            ],
            [
                'ma_don_hang'          => 'DH2-kh2',
                'id_khach_hang'       => 2,
                'id_don_hang'         => 6, // cập nhật theo ID đơn hàng thật nếu cần
                'id_dia_chi_giao_hang' => 2,
                'tong_tien'           => 1150000,
                'phuong_thuc_thanh_toan' => 0, // Ví điện tử chẳng hạn
                'ghi_chu'             => null,
                'hash_thanh_toan'     => null,
                'is_thanh_toan'       => 1,
                'ngay_thanh_toan'     => Carbon::create(2025, 6, 16, 20, 0, 0),
            ],
            [
                'ma_don_hang'          => 'DH3-kh3',
                'id_khach_hang'       => 3,
                'id_don_hang'         => 8,
                'id_dia_chi_giao_hang' => 3,
                'tong_tien'           => 1390000,
                'phuong_thuc_thanh_toan' => 0,
                'ghi_chu'             => null,
                'hash_thanh_toan'     => null,
                'is_thanh_toan'       => 0,
                'ngay_thanh_toan'     => null,
            ],
        ]);
    }
}
