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
        Schema::create('lulus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->foreignId('ts_id');
            $table->string('januari')->nullable();
            $table->string('februari')->nullable();
            $table->string('maret')->nullable();
            $table->string('april')->nullable();
            $table->string('mei')->nullable();
            $table->string('juni')->nullable();
            $table->string('juli')->nullable();
            $table->string('agustus')->nullable();
            $table->string('september')->nullable();
            $table->string('oktober')->nullable();
            $table->string('november')->nullable();
            $table->string('desember')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lulus');
    }
};
