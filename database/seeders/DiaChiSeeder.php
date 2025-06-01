<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DiaChiSeeder extends Seeder
{
    public function run(): void
    {
        $startDate  = Carbon::create(2025, 3, 3);
        $endDate    = Carbon::create(2025, 3, 3);

        DB::table('dia_chis')->delete();
        DB::table('dia_chis')->truncate();

        DB::table('dia_chis')->insert([
            [
                'id_khach_hang' => 1,
                'id_tinh_thanh' => 2, // Chưa có thông tin
                'id_quan_huyen' => 1, // Châu Đốc
                'id_phuong_xa'  => 1, // Phường Châu Phú A
                'dia_chi'       => '171 Xa Lộ Hà Nội',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Nguyễn Quốc Việt',
                'so_dien_thoai' => '0912345678',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 2,
                'id_tinh_thanh' => 2, // An Giang
                'id_quan_huyen' => 5, // An Phú
                'id_phuong_xa'  => 3, // Phường Vĩnh Mỹ
                'dia_chi'       => '99 Trần Hưng Đạo',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Văn A',
                'so_dien_thoai' => '0123456789',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 3,
                'id_tinh_thanh' => 2, // Chưa có thông tin
                'id_quan_huyen' => 3, // Long Xuyên
                'id_phuong_xa'  => 2, // Phường Châu Phú B
                'dia_chi'       => '120 Lý Thường Kiệt',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Trần Thị B',
                'so_dien_thoai' => '0987654321',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 4,
                'id_tinh_thanh' => 3, // Bà Rịa-Vũng Tàu
                'id_quan_huyen' => 4, // Tân Châu
                'id_phuong_xa'  => 1, // Phường Châu Phú A
                'dia_chi'       => '45 Nguyễn Văn Cừ',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Lê Văn C',
                'so_dien_thoai' => '0901122334',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 5,
                'id_tinh_thanh' => 2, // An Giang
                'id_quan_huyen' => 5, // An Phú
                'id_phuong_xa'  => 3, // Phường Vĩnh Mỹ
                'dia_chi'       => '88 Điện Biên Phủ',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Phạm Thị D',
                'so_dien_thoai' => '0932112233',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 6,
                'id_tinh_thanh' => 4, // Bạc Liêu
                'id_quan_huyen' => 2, // Châu Phú
                'id_phuong_xa'  => 1, // Phường Châu Phú A
                'dia_chi'       => '203 Hai Bà Trưng',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Võ Văn E',
                'so_dien_thoai' => '0923456789',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 7,
                'id_tinh_thanh' => 1, // Chưa có thông tin
                'id_quan_huyen' => 1, // Châu Đốc
                'id_phuong_xa'  => 2, // Phường Châu Phú B
                'dia_chi'       => '11 Nguyễn Trãi',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Nguyễn Thị F',
                'so_dien_thoai' => '0911223344',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 8,
                'id_tinh_thanh' => 2, // An Giang
                'id_quan_huyen' => 3, // Long Xuyên
                'id_phuong_xa'  => 3, // Phường Vĩnh Mỹ
                'dia_chi'       => '55 Cách Mạng Tháng 8',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Đặng Văn G',
                'so_dien_thoai' => '0988123456',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 9,
                'id_tinh_thanh' => 5, // Bắc Kạn
                'id_quan_huyen' => 4, // Tân Châu
                'id_phuong_xa'  => 2, // Phường Châu Phú B
                'dia_chi'       => '77 Hoàng Diệu',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Trần Thị H',
                'so_dien_thoai' => '0971234567',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id_khach_hang' => 10,
                'id_tinh_thanh' => 3, // Bà Rịa-Vũng Tàu
                'id_quan_huyen' => 1, // Châu Đốc
                'id_phuong_xa'  => 1, // Phường Châu Phú A
                'dia_chi'       => '199 Nguyễn Huệ',
                'toa_do_x'      => null,
                'toa_do_y'      => null,
                'ten_nguoi_nhan' => 'Lý Văn I',
                'so_dien_thoai' => '0909988776',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
