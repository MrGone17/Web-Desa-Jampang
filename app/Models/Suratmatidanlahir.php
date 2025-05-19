<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratmatidanlahir extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_anak',
        'tgl_lahir_anak',
        'jenis_kelamin_anak',
        'waktu_lahir_anak',
        'anak_ke',
        'nama_ibu',
        'tempat_lahir_ibu',
        'nik_ibu',
        'agama_ibu',
        'pekerjaan_ibu',
        'tgl_lahir_ibu',
        'jenis_kelamin_ibu',
        'kewarganegaraan_ibu',
        'nama_ayah',
        'nik_ayah',
        'agama_ayah',
        'pekerjaan_ayah',
        'tempat_lahir_ayah',
        'tgl_lahir_ayah',
        'jenis_kelamin_ayah',
        'kewarganegaraan_ayah',
        'alamat_keluarga',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
