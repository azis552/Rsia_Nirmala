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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan')->nullable();
            $table->text('tentang')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepondarurat')->nullable();
            $table->string('teleponpendaftaran')->nullable();
            $table->string('teleponwa')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('X')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('maps')->nullable();
            $table->string('logo')->nullable();
            $table->string('direktur')->nullable();
            $table->string('nama_direktur')->nullable();
            $table->string('susunan_organisasi')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('motto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
