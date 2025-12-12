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
            $table->integer('id_khach_hang');
            $table->string('ma_don_hang')->nullable();
            $table->integer('id_san_pham');
            $table->integer('so_luong');
            $table->double('don_gia');
            $table->double('tong_tien');
            $table->string('kich_thuoc');
            $table->string('mau_sac');
            $table->text('ghi_chu')->nullable();
            $table->integer('trang_thai')->default(0);
            $table->integer('id_nhan_vien')->nullable(); //Nhân viên xử lý đơn hàng
            // 0: giỏ hàng chưa đặt
            //   1: { admin: "Chờ xác nhận", customer: "Chờ xác nhận" },
            //   2: { admin: "Đã giao cho đơn vị vận chuyển", customer: "Đã chuẩn bị hàng" },
            //   3: { admin: "Đang giao hàng", customer: "Đang giao hàng" },
            //   4: { admin: "Giao hàng thành công", customer: "Đã nhận hàng" },
            //   5: { admin: "Giao hàng thất bại", customer: "Giao hàng thất bại" }
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
