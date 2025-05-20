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
        Schema::create('surat_kematians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_meninggal');
            $table->string('tempat_lahir_meninggal');
            $table->string('nik_meninggal');
            $table->string('agama_meninggal');
            $table->string('pekerjaan_meninggal');
            $table->date('tgl_lahir_meninggal');
            $table->enum('jenis_kelamin_meninggal', ['L', 'P']);
            $table->enum('kewarganegaraan_meninggal', ['WNI', 'WNA']);
            $table->string('tempat_meninggal');
            $table->date('tgl_meninggal');
            $table->text('alamat_meninggal');
            $table->string('nama_bersangkutan');
            $table->string('nik_bersangkutan');
            $table->string('agama_bersangkutan');
            $table->string('pekerjaan_bersangkutan');
            $table->string('shdk_bersangkutan');
            $table->string('tempat_lahir_bersangkutan');
            $table->date('tgl_lahir_bersangkutan');
            $table->enum('jenis_kelamin_bersangkutan', ['L', 'P']);
            $table->enum('kewarganegaraan_bersangkutan', ['WNI', 'WNA']);
            $table->text('alamat_bersangkutan');
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
        Schema::dropIfExists('surat_kematians');
    }
};
