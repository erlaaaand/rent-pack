<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('alat_camping', function (Blueprint $table) {
            $table->softDeletes(); // Ini otomatis buat kolom deleted_at
        });
    }

    public function down(): void
    {
        Schema::table('alat_camping', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Kalau rollback, hapus deleted_at
        });
    }
};
