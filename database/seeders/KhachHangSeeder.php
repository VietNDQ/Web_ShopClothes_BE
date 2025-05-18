<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'ho_va_ten' => 'Nguyễn Quốc Việt',
                'email' => 'nguyenquocviet@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0912345678',
                'ngay_sinh' => '1995-06-15',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Admin',
                'email' => 'admin@master.com',
                'password' => '123456',
                'so_dien_thoai' => '0123456789',
                'ngay_sinh' => '2001-01-01',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Thị B',
                'email' => 'tranthib@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0987654321',
                'ngay_sinh' => '1998-11-23',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Lê Văn C',
                'email' => 'levanc@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0901122334',
                'ngay_sinh' => '1992-03-10',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Phạm Thị D',
                'email' => 'phamthid@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0932112233',
                'ngay_sinh' => '1990-08-20',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Võ Văn E',
                'email' => 'vovane@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0923456789',
                'ngay_sinh' => '1993-12-12',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Nguyễn Thị F',
                'email' => 'nguyenthi@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0911223344',
                'ngay_sinh' => '1996-04-25',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Đặng Văn G',
                'email' => 'dangvang@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0988123456',
                'ngay_sinh' => '1994-09-30',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Thị H',
                'email' => 'tranthih@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0971234567',
                'ngay_sinh' => '1997-02-18',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Lý Văn I',
                'email' => 'lyvani@example.com',
                'password' => '123456',
                'so_dien_thoai' => '0909988776',
                'ngay_sinh' => '1999-05-05',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ]
        ]);
    }
}
