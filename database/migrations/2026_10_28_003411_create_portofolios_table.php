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
        Schema::create('Portofolio_1183', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('tentang_saya');
            $table->text('data_diri');
            $table->text('pendidikan');
            $table->text('pengalaman_kerja');
            $table->text('kemampuan');
            $table->string('kontak');
            $table->string('sosial_media');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Portofolio_1183');
    }
};
