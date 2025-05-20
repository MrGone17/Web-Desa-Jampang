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
        Schema::create('surat_keterangan_walis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('nama_lengkap_perempuan');
            $table->string('nik_perempuan');
            $table->string('tempat_lahir_perempuan');
            $table->date('tgl_lahir_perempuan');
            $table->string('pekerjaan_perempuan');
            $table->text('alamat_perempuan');
            $table->text('shdk_wali');
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
        Schema::dropIfExists('surat_keterangan_walis');
    }
};
