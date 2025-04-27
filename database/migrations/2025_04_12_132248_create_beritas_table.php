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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->text('deskripsi');
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->enum('kategori', ['artikel', 'pengumuman'])->default('artikel');
            $table->string('linkInstagram')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
