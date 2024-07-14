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
        Schema::create('formkp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama');
            $table->string('nim');
            $table->string('instansi');
            $table->string('alamat_instansi');
            $table->string('tjp')->nullable();
            $table->date('waktu_mulai_pelaksanaan');
            $table->date('waktu_akhir_pelaksanaan');
            $table->string('no_hp_mhs');
            $table->string('email');
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
        Schema::dropIfExists('formkp');
    }
};
