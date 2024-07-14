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
        Schema::create('formrekom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama');
            $table->string('nim');
            $table->string('no_hp_mhs');
            $table->string('instansi');
            $table->string('alamat_instansi');
            $table->string('jerekom')->default('MBKM');
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('formrekom');
    }
};
