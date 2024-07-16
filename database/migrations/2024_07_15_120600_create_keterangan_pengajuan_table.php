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
        Schema::create('keterangan_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pengajuan_id');
            $table->bigInteger('id_pengajuan');
            $table->string('status_keterangan');
            $table->text('keterangan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangan_pengajuan');
    }
};
