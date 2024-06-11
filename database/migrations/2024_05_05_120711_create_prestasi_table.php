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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama_tim');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('kontak');
            $table->string('jenis_prestasi');
            $table->integer('jumlah_peserta');
            $table->string('kategori_olahraga');
            $table->string('tahun_kegiatan');
            $table->string('url_penyelenggara');
            $table->string('nama_penyelenggara');
            $table->date('tgl_kegiatan');
            $table->string('tingkat_kejuaraan');
            $table->string('judul_karya');
            $table->text('anggota_karya');
            $table->json('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
