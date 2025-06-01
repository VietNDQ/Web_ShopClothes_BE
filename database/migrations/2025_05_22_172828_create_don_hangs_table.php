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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->integer('id_khach_hang');
            $table->integer('id_san_pham');
            $table->integer('so_luong');
            $table->double('tong_tien');
            $table->text('ghi_chu')->nullable();

            $table->integer('tinh_trang')->default(0); // 1: đã thanh toán, 0: chưa thanh toán
            $table->integer('trang_thai')->default(0);
            // 0: giỏ hàng chưa đặt
            // 1: đã đặt, chờ xác nhận
            // 2: đang giao hàng
            // 3: giao hàng thành công
            // 4: giao hàng thất bại
             $table->timestamp('ngay_dat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
