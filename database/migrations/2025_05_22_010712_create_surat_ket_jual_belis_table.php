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
        Schema::create('surat_ket_jual_belis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('nama_lengkap_pihaklain');
            $table->string('nik_pihaklain');
            $table->string('tempat_lahir_pihaklain');
            $table->date('tgl_lahir_pihaklain');
            $table->enum('jenis_kelamin_pihaklain', ['L', 'P']);
            $table->enum('kewarganegaraan_pihaklain', ['WNI', 'WNA']);
            $table->string('pekerjaan_pihaklain');
            $table->text('alamat_pihaklain');
            $table->text('nama_barang');
            $table->text('spesifikasi');
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
        Schema::dropIfExists('surat_ket_jual_belis');
    }
};
