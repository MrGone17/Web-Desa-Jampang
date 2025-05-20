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
        Schema::create('surat_kuasa_pengasuhan_anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nama_anak');
            $table->string('tempat_lahir_anak');
            $table->string('nik_anak');
            $table->string('agama_anak');
            $table->date('tgl_lahir_anak');
            $table->enum('jenis_kelamin_anak', ['L', 'P']);
            $table->string('no_kk_anak');
            $table->text('alamat_anak');
            $table->string('nama_ortu');
            $table->string('nik_ortu');
            $table->string('agama_ortu');
            $table->string('no_kk_ortu');
            $table->text('alamat_ortu');
            $table->string('nama_pengasuh');
            $table->string('nik_pengasuh');
            $table->string('no_kk_pengasuh');
            $table->string('agama_pengasuh');
            $table->text('alamat_pengasuh');
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
        Schema::dropIfExists('surat_kuasa_pengasuhan_anaks');
    }
};
