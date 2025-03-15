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
        Schema::create('bien_the_san_phams', function (Blueprint $table) {
            $table->id();
            $table->integer('id_san_pham');
            $table->string('kich_thuoc');
            $table->string('mau_sac');
            $table->string('chat_lieu');
            $table->integer('so_luong_ton');
            $table->boolean('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_the_san_phams');
    }
};
