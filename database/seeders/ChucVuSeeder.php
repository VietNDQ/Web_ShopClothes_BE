<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('chuc_vus')->delete();
        DB::table('chuc_vus')->truncate();
        DB::table('chuc_vus')->insert([
            [
                'ten_chuc_vu'   => 'Quản trị viên',
                'slug_chuc_vu'  => 'quan-tri-vien',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_chuc_vu'   => 'Quản lý cửa hàng',
                'slug_chuc_vu'  => 'quan-ly-cua-hang',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_chuc_vu'   => 'Nhân viên bán hàng',
                'slug_chuc_vu'  => 'nhan-vien-ban-hang',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_chuc_vu'   => 'Quản lý kho',
                'slug_chuc_vu'  => 'quan-ly-kho',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'ten_chuc_vu'   => 'Nhân viên chăm sóc khách hàng',
                'slug_chuc_vu'  => 'nhan-vien-cham-soc-khach-hang',
                'created_at'    => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
        ]);
    }
}
