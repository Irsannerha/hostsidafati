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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nim')->nullable(false)->unique();
            $table->string('id_dosen_wali');
            $table->string('foto_profile')->nullable(true);
            $table->string('nama')->nullable(false);
            $table->string('slug_mahasiswa');
            $table->string('fakultas')->nullable(false);
            $table->foreignId('kode_prodi')->constrained('prodi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->nullable(false)->unique();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_dosen_wali')->references('nip_nrk')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
