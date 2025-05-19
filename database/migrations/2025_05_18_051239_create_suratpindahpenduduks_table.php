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
        Schema::create('suratpindahpenduduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('kepala_kk');
            $table->string('no_kk');
            $table->integer('jumlah_keluarga');
            $table->string('pendidikan');
            $table->string('status_hubungan');
            $table->string('pengantar_pdf');
            $table->string('alasan_pindah');
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
        Schema::dropIfExists('suratpindahpenduduks');
    }
};
