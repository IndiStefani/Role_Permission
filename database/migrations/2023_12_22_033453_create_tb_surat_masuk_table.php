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
            $table->date('tgl_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('sifat')->nullable();
            $table->unsignedBigInteger('id_pengirim')->unsigned()->nullable();
            $table->string('perihal')->nullable();
            $table->string('isi_surat')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_pengirim')->references('id')->on('tb_jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_surat_masuk', function (Blueprint $table) {
            // Menghapus foreign key jika perlu
            $table->dropForeign(['id_pengirim']);
        });

        Schema::dropIfExists('tb_surat_masuk');
    }
};