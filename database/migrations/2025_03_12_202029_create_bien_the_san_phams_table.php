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
            $table->unsignedBigInteger('id_san_pham');
            $table->string('size', 50)->nullable();
            $table->string('mau_sac', 50)->nullable();
            $table->integer('so_luong')->default(0);
            $table->bigInteger('gia')->nullable();
            $table->timestamps();

            $table->foreign('id_san_pham')->references('id')->on('san_phams')->onDelete('cascade');
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
