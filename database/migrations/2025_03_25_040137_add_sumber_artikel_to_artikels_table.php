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
        Schema::table('artikels', function (Blueprint $table) {
            // Tambahkan kolom 'sumber_artikel' dengan tipe string (bisa nullable)
            $table->string('sumber_artikel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            // Hapus kolom 'sumber_artikel' jika rollback
            $table->dropColumn('sumber_artikel');
        });
    }
};
