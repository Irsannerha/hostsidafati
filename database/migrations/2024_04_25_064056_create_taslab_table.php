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
        Schema::create('taslab', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('unit_kerja');
            $table->string('pendidikan');
            $table->date('tmt')->nullable();
            $table->string('status_pegawai');
            $table->string('jabatan');
            $table->string('bagian_tugas')->nullable();
            $table->string('nitk');
            $table->date('tgl_lahir')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taslab');
    }
};