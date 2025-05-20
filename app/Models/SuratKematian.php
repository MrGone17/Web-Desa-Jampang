<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKematian extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_meninggal',
        'tempat_lahir_meninggal',
        'nik_meninggal',
        'agama_meninggal',
        'pekerjaan_meninggal',
        'tgl_lahir_meninggal',
        'jenis_kelamin_meninggal',
        'kewarganegaraan_meninggal',
        'tgl_meninggal',
        'tempat_meninggal',
        'alamat_meninggal',
        'shdk_bersangkutan',
        'nama_bersangkutan',
        'nik_bersangkutan',
        'agama_bersangkutan',
        'pekerjaan_bersangkutan',
        'tempat_lahir_bersangkutan',
        'tgl_lahir_bersangkutan',
        'jenis_kelamin_bersangkutan',
        'kewarganegaraan_bersangkutan',
        'alamat_bersangkutan',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
