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
        Schema::create('rujukans', function (Blueprint $table) {
            $table->id();
            $table->uuid('rujukan_id')->unique();
            $table->string('nama');
            $table->string('nik');
            $table->string('No_Rujukan');
            $table->string('perujuk')->nullable();
            $table->enum('profesi',['dokter','bidan'])->default('bidan');
            $table->string('subjek')->nullable();
            $table->string('objek')->nullable();
            $table->string('suhu')->nullable();
            $table->string('tensi')->nullable();
            $table->string('berat')->nullable();
            $table->string('tinggi')->nullable();
            $table->string('RR')->nullable();
            $table->string('nadi')->nullable();
            $table->string('SpO2')->nullable();
            $table->string('GCS')->nullable();
            $table->string('Kesadaran')->nullable();
            $table->string('LP')->nullable();
            $table->string('Alergi')->nullable();
            $table->string('Asesmen')->nullable();
            $table->string('Plan')->nullable();
            $table->string('Instruksi')->nullable();
            $table->string('Evaluasi')->nullable();
            $table->string('Berkas')->nullable();
            $table->text('Keterangan')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->unsignedBigInteger('faskes_id')->nullable();
            $table->foreign('faskes_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rujukans');
    }
};
