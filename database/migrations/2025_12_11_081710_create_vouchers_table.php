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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('ma_voucher')->unique(); // Mã voucher (ví dụ: SALE50, NEWUSER100)
            $table->string('ten_voucher'); // Tên voucher
            $table->text('mo_ta')->nullable(); // Mô tả voucher
            $table->integer('loai_giam_gia'); // 1: Giảm theo phần trăm, 2: Giảm theo số tiền cố định
            $table->decimal('gia_tri_giam', 10, 2); // Giá trị giảm (phần trăm hoặc số tiền)
            $table->decimal('gia_tri_toi_thieu', 10, 2)->nullable(); // Giá trị đơn hàng tối thiểu để áp dụng
            $table->decimal('gia_tri_toi_da', 10, 2)->nullable(); // Giá trị giảm tối đa (nếu là phần trăm)
            $table->integer('so_luong'); // Số lượng voucher
            $table->integer('so_luong_da_su_dung')->default(0); // Số lượng đã sử dụng
            $table->dateTime('ngay_bat_dau'); // Ngày bắt đầu hiệu lực
            $table->dateTime('ngay_ket_thuc'); // Ngày kết thúc hiệu lực
            $table->integer('trang_thai')->default(1); // 1: Hoạt động, 0: Tạm dừng, 2: Hết hạn
            $table->integer('id_nhan_vien')->nullable(); // Nhân viên tạo voucher
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
