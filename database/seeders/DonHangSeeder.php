<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2025, 1, 1);
        $endDate    = Carbon::create(2025, 11, 1);
        DB::table('don_hangs')->delete();
        DB::table('don_hangs')->truncate();
        DB::table('don_hangs')->insert([
            [
                'id_khach_hang' => 1,
                'ma_don_hang'   => null,
                'id_san_pham'   => 8,
                'so_luong'      => 1,
                'don_gia'       => 595000,
                'tong_tien'     => 595000,
                'kich_thuoc'    => 'S',
                'mau_sac'       => 'Vàng',
                'ghi_chu'       => null,
                'trang_thai'    => 0,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 1,
                'ma_don_hang'   => null,
                'id_san_pham'   => 9,
                'so_luong'      => 1,
                'don_gia'       => 720000,
                'tong_tien'     => 720000,
                'kich_thuoc'    => 'S',
                'mau_sac'       => 'Xanh lá cây',
                'ghi_chu'       => null,
                'trang_thai'    => 0,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 1,
                'ma_don_hang'   => 'DHe503bff4-a914-4f93-9d67-e9593101fd911',
                'id_san_pham'   => 1,
                'so_luong'      => 1,
                'don_gia'       => 350000,
                'tong_tien'     => 2730000,
                'kich_thuoc'    => 'M',
                'mau_sac'       => 'Xám',
                'ghi_chu'       => null,
                'trang_thai'    => 3,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 1,
                'ma_don_hang'   => 'DHe503bff4-a914-4f93-9d67-e9593101fd911',
                'id_san_pham'   => 2,
                'so_luong'      => 1,
                'don_gia'       => 350000,
                'tong_tien'     => 2730000,
                'kich_thuoc'    => 'L',
                'mau_sac'       => 'Xám',
                'ghi_chu'       => null,
                'trang_thai'    => 1,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 5,
                'ma_don_hang'   => 'DHe503bff4-a914-4f93-9d67-e9593101fd911',
                'id_san_pham'   => 3,
                'so_luong'      => 1,
                'don_gia'       => 560000,
                'tong_tien'     => 2730000,
                'kich_thuoc'    => 'L',
                'mau_sac'       => 'Đen',
                'ghi_chu'       => null,
                'trang_thai'    => 3,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 2,
                'ma_don_hang'   => 'DH2-kh2',
                'id_san_pham'   => 4,
                'so_luong'      => 2,
                'don_gia'       => 450000,
                'tong_tien'     => 900000,
                'kich_thuoc'    => 'M',
                'mau_sac'       => 'Trắng',
                'ghi_chu'       => null,
                'trang_thai'    => 1,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 2,
                'ma_don_hang'   => 'DH2-kh2',
                'id_san_pham'   => 5,
                'so_luong'      => 1,
                'don_gia'       => 250000,
                'tong_tien'     => 250000,
                'kich_thuoc'    => 'L',
                'mau_sac'       => 'Đỏ',
                'ghi_chu'       => null,
                'trang_thai'    => 3,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],

            // Dữ liệu cho khách hàng id = 3
            [
                'id_khach_hang' => 3,
                'ma_don_hang'   => 'DH3-kh3',
                'id_san_pham'   => 6,
                'so_luong'      => 3,
                'don_gia'       => 330000,
                'tong_tien'     => 990000,
                'kich_thuoc'    => 'S',
                'mau_sac'       => 'Xanh dương',
                'ghi_chu'       => null,
                'trang_thai'    => 0,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
            [
                'id_khach_hang' => 3,
                'ma_don_hang'   => 'DH3-kh3',
                'id_san_pham'   => 7,
                'so_luong'      => 1,
                'don_gia'       => 400000,
                'tong_tien'     => 400000,
                'kich_thuoc'    => 'M',
                'mau_sac'       => 'Đen',
                'ghi_chu'       => null,
                'trang_thai'    => 4,
                'id_nhan_vien'  => null,
                'created_at'   => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),

            ],
        ]);
    }
}
