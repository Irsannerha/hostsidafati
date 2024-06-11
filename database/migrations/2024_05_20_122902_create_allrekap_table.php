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
        Schema::create('allrekap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->foreignId('tahun_semester_id');
            $table->foreignId('tahun_id');
            $table->integer('jumlah_mhs_aktif_ts')->nullable();
            $table->integer('jumlah_mhs_aktif_th')->nullable();
            $table->integer('mhs_undur_diri_genap')->nullable();
            $table->integer('mhs_undur_diri_ganjil')->nullable();
            $table->integer('mhs_keluar_genap')->nullable();
            $table->integer('mhs_keluar_ganjil')->nullable();
            $table->integer('mhs_wafat_genap')->nullable();
            $table->integer('mhs_wafat_ganjil')->nullable();
            $table->integer('mhs_lulus_januari')->nullable();
            $table->integer('mhs_lulus_februari')->nullable();
            $table->integer('mhs_lulus_maret')->nullable();
            $table->integer('mhs_lulus_april')->nullable();
            $table->integer('mhs_lulus_mei')->nullable();
            $table->integer('mhs_lulus_juni')->nullable();
            $table->integer('mhs_lulus_juli')->nullable();
            $table->integer('mhs_lulus_agustus')->nullable();
            $table->integer('mhs_lulus_september')->nullable();
            $table->integer('mhs_lulus_oktober')->nullable();
            $table->integer('mhs_lulus_november')->nullable();
            $table->integer('mhs_lulus_desember')->nullable();
            $table->integer('mhs_lulus_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allrekap');
    }
};



