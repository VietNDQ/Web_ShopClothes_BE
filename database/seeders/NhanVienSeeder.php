<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::create(2024, 10, 1);
        $endDate   = Carbon::create(2024, 12, 1);
        DB::table('nhan_viens')->delete();
        DB::table('nhan_viens')->truncate();
        DB::table('nhan_viens')->insert( [
            [
                'ho_va_ten'     => 'Nguyễn Quốc Việt',
                'email'         => 'nqv@gmail.com',
                'avatar'        => 'https://jbagy.me/wp-content/uploads/2025/03/hinh-anh-avatar-anime-chibi-boy-3.jpg',
                'so_dien_thoai' => '0382062172',
                'password'      =>  '123456',
                'dia_chi'       => '171 Cù Chính Lan, Quận Thanh Khê, TP. Đà Nẵng',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 1, // Quản lý cửa hàng
                'is_master'     => 1,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ho_va_ten'     => 'Trần Minh Tú',
                'email'         => 'tmtu@example.com',
                'avatar'        => 'https://jbagy.me/wp-content/uploads/2025/03/Hinh-anh-avatar-anime-nu-cute-2.jpg',
                'so_dien_thoai' => '0912345678',
                'password'      =>  '123456',
                'dia_chi'       => '25 Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 2, // Nhân viên bán hàng
                'is_master'     => 0,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ho_va_ten'     => 'Lê Thị Hồng',
                'email'         => 'lethihong@example.com',
                'avatar'        => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/Image%20FP_2024/hinh-anime-4.jpg',
                'so_dien_thoai' => '0923456789',
                'password'      =>  '123456',
                'dia_chi'       => '12 Trần Phú, Quận Hải Châu, TP. Đà Nẵng',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 3, // Thu ngân
                'is_master'     => 0,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ho_va_ten'     => 'Phạm Văn Hòa',
                'email'         => 'phamvanhoa@example.com',
                'avatar'        => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/Image%20FP_2024/hinh-anime-1.jpg',
                'so_dien_thoai' => '0934567890',
                'password'      =>  '123456',
                'dia_chi'       => '56 Nguyễn Trãi, Quận Thanh Xuân, Hà Nội',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 4, // Quản lý kho
                'is_master'     => 0,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ho_va_ten'     => 'Đỗ Thị Lan',
                'email'         => 'dothilan@example.com',
                'avatar'        => 'https://marketplace.canva.com/tWJ5k/MAGePytWJ5k/1/tl/canva-MAGePytWJ5k.jpg',
                'so_dien_thoai' => '0945678901',
                'password'      =>  '123456',
                'dia_chi'       => '78 Lê Lợi, TP. Vinh, Nghệ An',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 5, // Nhân viên giao hàng
                'is_master'     => 0,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
            [
                'ho_va_ten'     => 'Ngô Đức Anh',
                'email'         => 'ngoducanh@example.com',
                'avatar'        => 'https://tte.edu.vn/upload/2025/03/hinh-anh-anime-nezuko-cute-1.webp',
                'so_dien_thoai' => '0956789012',
                'password'      =>  '123456',
                'dia_chi'       => '99 Bạch Đằng, TP. Đà Nẵng',
                'tinh_trang'    => 1,
                'id_chuc_vu'    => 6, // Nhân viên chăm sóc khách hàng
                'is_master'     => 0,
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at'    => Carbon::now(),
            ],
        ]
    );


    }
}
