<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kiểm tra xem cột trang_thai có tồn tại không
        if (Schema::hasColumn('danh_mucs', 'trang_thai')) {
            // Sử dụng ALTER TABLE để đổi tên cột (MySQL)
            DB::statement('ALTER TABLE danh_mucs CHANGE trang_thai tinh_trang INTEGER DEFAULT 0');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kiểm tra xem cột tinh_trang có tồn tại không
        if (Schema::hasColumn('danh_mucs', 'tinh_trang')) {
            // Khôi phục lại tên cột cũ
            DB::statement('ALTER TABLE danh_mucs CHANGE tinh_trang trang_thai INTEGER DEFAULT 0');
        }
    }
};
