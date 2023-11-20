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
        Schema::create('pertambangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('fasilitas');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertambangans');
    }
};
