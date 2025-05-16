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
        Schema::create('bedanamas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('perbedaan');
            $table->string('nama_beda');
            $table->string('nik_beda')->nullable();
            $table->text('alamat_beda')->nullable();
            $table->string('tempat_lahir_beda')->nullable();
            $table->date('tanggal_lahir_beda')->nullable();
            $table->string('agama_beda')->nullable();
            $table->string('pekerjaan_beda')->nullable();
            $table->enum('Kewarganegaraan_beda', ['WNI', 'WNA'])->nullable();
            $table->enum('jenis_kelamin_beda', ['L', 'P'])->nullable();
            $table->string('bukti_pdf');
            $table->string('pengantar_pdf');
            $table->enum('status', ['diproses', 'selesai', 'ditolak'])->default('diproses');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bedanamas');
    }
};
