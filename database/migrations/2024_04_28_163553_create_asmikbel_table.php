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
        Schema::create('asmikbel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama');
            $table->string('nip_nrk');
            $table->string('status');
            $table->string('studi_lanjut');
            $table->string('beasiswa');
            $table->date('mulai_tubel');
            $table->date('selesai_tubel');
            $table->string('sk_tubel')->default('Ada');
            $table->string('status_asmik')->default('Lulus');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asmikbel');
    }
};
