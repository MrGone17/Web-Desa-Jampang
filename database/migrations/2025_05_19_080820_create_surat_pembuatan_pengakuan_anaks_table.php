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
        Schema::create('surat_pembuatan_pengakuan_anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_anak');
            $table->string('nik_anak');
            $table->string('tempat_lahir_anak');
            $table->date('tgl_lahir_anak');
            $table->enum('jenis_kelamin_anak', ['L', 'P']);
            $table->string('nomor_akta_anak');
            $table->date('tgl_akta_anak');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->text('alamat_ibu');
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
        Schema::dropIfExists('surat_pembuatan_pengakuan_anaks');
    }
};
