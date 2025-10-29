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
        Schema::table('employees', function (Blueprint $table) {
            // Tambahkan kolom 'departemen_id' setelah kolom 'tanggal_masuk'
            $table->unsignedBigInteger('departemen_id')->after('tanggal_masuk');
            // Tambahkan kolom 'jabatan_id' setelah kolom 'departemen_id'
            $table->unsignedBigInteger('jabatan_id')->after('departemen_id');

            // Buat relasi foreign key ke tabel 'departments'
            $table->foreign('departemen_id')
                ->references('id')
                ->on('departments') // Pastikan ini 'departments' (jamak)
                ->onDelete('cascade');

            // Buat relasi foreign key ke tabel 'positions'
            $table->foreign('jabatan_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Hapus relasi foreign key dulu
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['jabatan_id']);

            // Hapus kolomnya
            $table->dropColumn(['departemen_id', 'jabatan_id']);
        });
    }
};
