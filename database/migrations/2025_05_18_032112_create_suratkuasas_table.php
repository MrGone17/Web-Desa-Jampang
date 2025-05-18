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
        Schema::create('suratkuasas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('alasan_kuasa');
            $table->text('alamat_kuasa');
            $table->string('tempat_lahir_kuasa');
            $table->date('tanggal_lahir_kuasa');
            $table->string('nama_kuasa');
            $table->string('pekerjaan_kuasa');
            $table->enum('kewarganegaraan_kuasa', ['WNI', 'WNA']);
            $table->string('nik_kuasa')->nullable();
            $table->enum('jenis_kelamin_kuasa', ['L', 'P']);
            $table->string('pengantar_pdf');
            $table->string('catatan')->nullable();
            $table->enum('status', ['diproses', 'selesai', 'ditolak'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratkuasas');
    }
};
