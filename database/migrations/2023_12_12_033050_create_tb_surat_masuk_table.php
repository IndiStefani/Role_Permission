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
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perihal')->nullable();
            $table->string('no_agenda')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('tgl_surat')->nullable();
            $table->unsignedBigInteger('id_instansi')->nullable();
            $table->unsignedBigInteger('id_index')->nullable();
            $table->string('file')->nullable();
            $table->string('disposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_surat_masuk');
    }
};