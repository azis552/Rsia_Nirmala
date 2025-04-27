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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian');
            $table->enum('jenis_pasien', ['Umum', 'BPJS']);
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('poliklinik_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('no_hp');
            $table->date('tanggal_booking');
            $table->unsignedBigInteger('jadwal_dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('poliklinik_id')->references('id')->on('polikliniks')->onDelete('cascade');
            $table->foreign('jadwal_dokter_id')->references('id')->on('jadwal_dokters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
