<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->nullable();
            $table->integer('id_khach_hang');
            $table->integer('id_don_hang');
            $table->integer('id_dia_chi_giao_hang');
            $table->decimal('tong_tien', 10, 2);
            $table->integer('phuong_thuc_thanh_toan'); // 'COD', 'Chuyển khoản', 'Ví điện tử'
            $table->string('ghi_chu')->nullable();
            $table->string('hash_thanh_toan')->nullable();
            $table->integer('is_thanh_toan')->default(0); // 0: Chờ thanh toán, 1: Đã thanh toán, 2: Đã hủy
            $table->dateTime('ngay_thanh_toan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
