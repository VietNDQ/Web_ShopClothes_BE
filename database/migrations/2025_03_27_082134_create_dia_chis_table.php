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
        Schema::create('dia_chi', function (Blueprint $table) {
            $table->id();
            $table->string('dia_chi');
            $table->string('phuong_xa')->nullable();
            $table->string('quan_huyen')->nullable();
            $table->string('tinh_thanh_pho');
            $table->string('ma_buu_chinh')->nullable();
            $table->boolean('mac_dinh')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_chis');
    }
};
