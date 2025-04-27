<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alat_camping', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('kategori');
            $table->integer('jumlah');
            $table->integer('harga_sewa');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alat_camping');
    }
};
