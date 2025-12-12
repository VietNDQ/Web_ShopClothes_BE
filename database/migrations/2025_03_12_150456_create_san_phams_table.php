<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->integer('id_danh_muc');
            $table->integer('id_nhan_vien');
            $table->string('ten_san_pham');
            $table->text('mo_ta')->nullable();
            $table->bigInteger('gia_co_ban')->nullable(); // kiểu long
            $table->integer('tinh_trang')->default(1);    // 1 = Mới, 0 = Cũ
            $table->integer('trang_thai')->default(1);    // 1 = Hiển thị, 0 = Ẩn, 2 = Đã bán
            $table->timestamp('ngay_dang')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
