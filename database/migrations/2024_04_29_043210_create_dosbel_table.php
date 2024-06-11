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
        Schema::create('dosbel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama');
            $table->string('nip_nrk');
            $table->string('status');
            $table->string('tempat_studi');
            $table->string('jenis_beasiswa');
            $table->date('mulai_tubel');
            $table->date('selesai_tubel');
            $table->string('sk_tubel')->default('Ada');
            $table->string('perpanjangan_tubel')->default('Ada');
            $table->date('mulai_perpanjangan')->nullable();
            $table->date('selesai_perpanjangan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosbel');
    }
};
