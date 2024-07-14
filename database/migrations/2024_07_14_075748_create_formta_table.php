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
        Schema::create('formta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->foreignId('jenis_pengajuan_id');
            $table->string('nama');
            $table->bigInteger('nim');
            $table->string('keperluan')->default('Permohonan Izin Penelitian Tugas Akhir');
            $table->string('instansi');
            $table->string('alamat_instansi');
            $table->string('tjp')->nullable();
            $table->string('pelaksanaan')->default('Online');
            $table->date('waktu_mulai_pelaksanaan');
            $table->date('waktu_akhir_pelaksanaan');
            $table->bigInteger('no_hp');
            $table->string('email');
            $table->string('nama_pembimbing_satu');
            $table->string('nama_pembimbing_dua');
            $table->string('judul');
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
        Schema::dropIfExists('formta');
    }
};
