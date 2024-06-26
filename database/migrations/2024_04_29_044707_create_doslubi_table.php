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
        Schema::create('doslubi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->string('nama');
            $table->string('nup_nidk')->unique();
            $table->string('jurusan');
            $table->string('status')->default('Purna Tugas atau Pensiunan');
            $table->date('tgl_lahir');
            $table->string('jabatan_terakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doslubi');
    }
};
