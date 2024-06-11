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
        Schema::create('formbukrim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->text('nama_dok');
            $table->string('nama');
            $table->string('nim')->nullable();
            $table->string('jenis_berkas');
            $table->integer('jumlah_dok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formbukrim');
    }
};
