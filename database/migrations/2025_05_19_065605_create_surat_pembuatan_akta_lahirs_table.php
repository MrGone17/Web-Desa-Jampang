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
        Schema::create('surat_pembuatan_akta_lahirs', function (Blueprint $table) {
            $table->id();
             $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_anak');
            $table->string('nama_ortu');
            $table->string('tempat_lahir_ortu');
            $table->date('tgl_lahir_ortu');
            $table->string('nik_ortu');
            $table->string('agama_ortu');
            $table->string('pekerjaan_ortu');
            $table->string('usia_ortu');
            $table->string('alamat_ortu');
            $table->enum('status', ['diproses', 'ditolak', 'selesai'])->default('diproses');
            $table->text('catatan')->nullable();
            $table->string('pengantar_pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pembuatan_akta_lahirs');
    }
};
