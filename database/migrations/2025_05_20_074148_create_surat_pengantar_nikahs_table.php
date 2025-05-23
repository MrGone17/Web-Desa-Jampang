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
        Schema::create('surat_pengantar_nikahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('pekerjaan');
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->text('alamat');
            $table->string('nama_lengkap_pasangan');
            $table->string('nik_pasangan');
            $table->string('tempat_lahir_pasangan');
            $table->date('tgl_lahir_pasangan');
            $table->string('agama_pasangan');
            $table->string('pekerjaan_pasangan');
            $table->enum('kewarganegaraan_pasangan', ['WNI', 'WNA']);
            $table->text('alamat_pasangan');
            $table->string('nama_lengkap_ayah');
            $table->string('nik_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->enum('kewarganegaraan_ayah', ['WNI', 'WNA']);
            $table->text('alamat_ayah');
            $table->string('nama_lengkap_ibu');
            $table->string('nik_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->enum('kewarganegaraan_ibu', ['WNI', 'WNA']);
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
        Schema::dropIfExists('surat_pengantar_nikahs');
    }
};
