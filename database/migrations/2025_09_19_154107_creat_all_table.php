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
        // 1. Buat tabel 'kategori_surats' terlebih dahulu
        Schema::create('kategori_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->text('judul')->nullable(); // letakkan setelah nama_kategori
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 2. Kemudian, buat tabel 'arsip_surat' dan tambahkan foreign key
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul');
            $table->timestamp('waktu_pengarsipan')->nullable();
            $table->string('file_surat')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategori_surats')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_surat');
        Schema::dropIfExists('kategori_surats');
    }
};
