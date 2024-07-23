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
            $table->string('keperluan');
            $table->bigInteger('no_hp_mahasiswa');
            $table->string('email');
            $table->string('nama_pembimbing_satu');
            $table->string('nama_pembimbing_dua');
            $table->text('alamat_mahasiswa');
            $table->string('judul_ta');
            $table->string('khs');
            $table->string('krs');
            $table->string('transkrip');
            $table->string('nama_instansi_satu');
            $table->string('jabatan_instansi_satu');
            $table->string('no_hp_instansi_satu');
            $table->string('alamat_instansi_satu');
            // $table->string('keperluan_satu')->default('Permohonan Izin Penelitian Tugas Akhir');
            $table->string('nama_instansi_dua')->nullable();
            $table->string('jabatan_instansi_dua')->nullable();
            $table->string('no_hp_instansi_dua')->nullable();
            $table->string('alamat_instansi_dua')->nullable();
            $table->string('status')->default('Diproses');
            $table->boolean('dosen_wali')->default(false);
            $table->boolean('koor_prodi')->default(false);
            $table->boolean('tekndik_checking')->default(false);
            $table->boolean('dekan')->default(false);
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
