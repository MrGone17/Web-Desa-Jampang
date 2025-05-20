<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPembuatanPengakuanAnak extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_anak',
        'nik_anak',
        'tempat_lahir_anak',
        'tgl_lahir_anak',
        'jenis_kelamin_anak',
        'nomor_akta_anak',
        'tgl_akta_anak',
        'nama_ayah',
        'nik_ayah',
        'pekerjaan_ayah',
        'tempat_lahir_ayah',
        'tgl_lahir_ayah',
        'alamat_ayah',
        'nama_ibu',
        'nik_ibu',
        'pekerjaan_ibu',
        'tempat_lahir_ibu',
        'tgl_lahir_ibu',
        'alamat_ibu',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
