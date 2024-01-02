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
            $table->unsignedBigInteger('id_surat_masuk')->unsigned()->nullable();
            $table->unsignedBigInteger('id_surat_keluar')->unsigned()->nullable();
            $table->string('isi_disposisi')->nullable();
            $table->string('dari');
            $table->string('tujuan');
            $table->timestamps();

            // Menambahkan foreign key ke tb_surat_masuk
            $table->foreign('id_surat_masuk')->references('id')->on('tb_surat_masuk')->onDelete('cascade');
            $table->foreign('id_surat_keluar')->references('id')->on('tb_surat_keluar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_disposisi', function (Blueprint $table) {
            // Menghapus foreign key jika perlu
            $table->dropForeign(['id_surat_masuk']);
            $table->dropForeign(['id_surat_keluar']);
        });

        Schema::dropIfExists('tb_disposisi');
    }
};
