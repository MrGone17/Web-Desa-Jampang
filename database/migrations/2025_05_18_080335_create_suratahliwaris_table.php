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
        Schema::create('suratahliwaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->string('nik_waris')->nullable();
            $table->string('nama_waris');
            $table->enum('jenis_kelamin_waris', ['L', 'P']);
            $table->enum('kewarganegaraan_waris', ['WNI', 'WNA']);
            $table->string('agama_waris');
            $table->string('tempat_lahir_waris');
            $table->date('tanggal_lahir_waris');
            $table->string('pekerjaan_waris');
            $table->text('alamat_waris');
            $table->string('tempat_meninggal');
            $table->date('tanggal_meninggal');
            $table->string('pengantar_pdf');
            $table->string('catatan')->nullable();

            // Status
            $table->enum('status', ['diproses', 'selesai', 'ditolak'])->default('diproses');

            // Timestamp
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratahliwaris');
    }
};
