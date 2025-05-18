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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->string('password');
            $table->string('dia_chi');
            $table->integer('tinh_trang');
            $table->integer('id_chuc_vu')->nullable();
            $table->integer('is_master')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
