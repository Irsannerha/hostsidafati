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
        Schema::create('formstm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->text('nama');
            $table->text('nim');
            $table->string('instansi');
            $table->date('tgl_bls');
            $table->date('tgl_mulai_pelaksanaan');
            $table->date('tgl_akhir_pelaksanaan');
            $table->string('jenis_surat_tugas')->default('Surat Tugas Kerja Praktik (KP)');
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
        Schema::dropIfExists('formstm');
    }
};
