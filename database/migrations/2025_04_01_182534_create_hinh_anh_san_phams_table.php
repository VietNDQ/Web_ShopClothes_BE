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
        Schema::create('hinh_anh_san_phams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_san_pham');
            $table->string('url');
            $table->timestamps();

            $table->foreign('id_san_pham')->references('id')->on('san_phams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh_san_phams');
    }
};
