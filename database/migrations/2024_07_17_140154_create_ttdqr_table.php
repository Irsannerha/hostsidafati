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
        Schema::create('ttdqr', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pengajuan_id');
            $table->integer('id_pengajuan');
            $table->string('informasi');
            $table->string('nama');
            $table->string('peran');
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttdqr');
    }
};
