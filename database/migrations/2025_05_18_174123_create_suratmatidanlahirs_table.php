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
        Schema::create('suratmatidanlahirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_anak');
            $table->integer('anak_ke');
            $table->time('waktu_lahir_anak');
            $table->date('tgl_lahir_anak');
            $table->enum('jenis_kelamin_anak', ['L', 'P']);
            $table->enum('kewarganegaraan_anak', ['WNI', 'WNA']);
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->string('nik_ibu');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->date('tgl_lahir_ibu');
            $table->enum('jenis_kelamin_ibu', ['L', 'P']);
            $table->enum('kewarganegaraan_ibu', ['WNI', 'WNA']);
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->enum('jenis_kelamin_ayah', ['L', 'P']);
            $table->enum('kewarganegaraan_ayah', ['WNI', 'WNA']);
            $table->text('alamat_keluarga');
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
        Schema::dropIfExists('suratmatidanlahirs');
    }
};
