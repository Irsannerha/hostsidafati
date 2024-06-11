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
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('prodi');
            $table->string('foto')->nullable(); 
            $table->string('email')->nullable();
            $table->string('kapro')->nullable();
            $table->string('fakultas');
            $table->string('akreditasi')->nullable();
            $table->string('prodik');
            $table->integer('jumlah_mahasiswa')->nullable();
            $table->date('tgl_pendirian')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('jumlah_dosen')->nullable();
            $table->string('sk_prodi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};