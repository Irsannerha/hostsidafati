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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip_nrk');
            $table->foreignId('prodi_id');
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->string('pendidikan');
            $table->string('masa_kerja')->nullable();
            $table->string('status_nidn_nidk');
            $table->string('status_pegawai');
            $table->string('jabfung');
            $table->date('tmt_jabfung_terakhir')->nullable();
            $table->date('target_kenaikan_jabfung')->nullable();
            $table->date('tmt_masuk_itera')->nullable();
            $table->date('tmt')->nullable();
            $table->string('pekerti')->default('Sudah');
            $table->string('serdos')->default('Ada');
            $table->string('status_dosen');
            $table->string('sk_pns')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('sk_tubel')->nullable();
            $table->string('sk_perpanjangan_tubel')->nullable();
            $table->string('sk_jabfung')->nullable();
            $table->string('sk_pengaktifan')->nullable();
            $table->string('sk_pengaktifan_kembali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
