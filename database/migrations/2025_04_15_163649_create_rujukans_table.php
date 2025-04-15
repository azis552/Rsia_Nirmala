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
            $table->string('Kategori_Rujukan');
            $table->string('Dokter_Perujuk');
            $table->string('Diagnosa');
            $table->text('Keterangan')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
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
