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
        Schema::create('tb_disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_surat_masuk')->nullable();
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('catatan')->nullable();
            $table->string('baca')->nullable();
            $table->string('proses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_disposisi');
    }
};
