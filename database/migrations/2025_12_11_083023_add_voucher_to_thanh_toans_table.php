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
        Schema::table('thanh_toans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_voucher')->nullable()->after('id_dia_chi_giao_hang');
            $table->string('ma_voucher')->nullable()->after('id_voucher');
            $table->decimal('tong_tien_goc', 10, 2)->nullable()->after('tong_tien');
            $table->decimal('tien_giam_gia', 10, 2)->default(0)->after('tong_tien_goc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thanh_toans', function (Blueprint $table) {
            $table->dropColumn(['id_voucher', 'ma_voucher', 'tong_tien_goc', 'tien_giam_gia']);
        });
    }
};
