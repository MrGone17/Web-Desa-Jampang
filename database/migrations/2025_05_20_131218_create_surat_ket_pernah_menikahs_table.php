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
        Schema::create('surat_ket_pernah_menikahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('nama_lengkap_pria');
            $table->string('nik_pria');
            $table->string('tempat_lahir_pria');
            $table->date('tgl_lahir_pria');
            $table->enum('jenis_kelamin_pria', ['L', 'P']);
            $table->string('agama_pria');
            $table->string('pekerjaan_pria');
            $table->text('alamat_pria');
            $table->string('nama_lengkap_perempuan');
            $table->string('nik_perempuan');
            $table->string('tempat_lahir_perempuan');
            $table->date('tgl_lahir_perempuan');
            $table->enum('jenis_kelamin_perempuan', ['L', 'P']);
            $table->string('agama_perempuan');
            $table->string('pekerjaan_perempuan');
            $table->text('alamat_perempuan');
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
        Schema::dropIfExists('surat_ket_pernah_menikahs');
    }
};
