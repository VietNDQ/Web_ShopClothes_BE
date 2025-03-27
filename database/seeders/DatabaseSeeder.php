<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use App\Models\ThuongHieu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DanhMucSeeder::class,
            ThuongHieuSeeder::class,
            SanPhamSeeder::class,
            BienTheSanPhamSeeder::class,
            KhachHangSeeder::class,
        ]);

    }
}
