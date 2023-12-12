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
        Schema::create('tb_detail_disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disposisi')->nullable();
            $table->unsignedBigInteger('id_isi_disposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_detail_disposisi');
    }
};
