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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('email');
            $table->string('nama_kegiatan');
            $table->date('tgl_kegiatan');
            $table->time('mulai_kegiatan');
            $table->time('akhir_kegiatan');
            $table->string('tempat_pelaksanaan');
            $table->integer('jumlah_peserta');
            $table->string('penanggung_jawab');
            $table->string('nama_pemohon');
            $table->string('no_hp');
            $table->string('status')->default('Diproses');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
