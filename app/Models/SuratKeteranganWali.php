<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganWali extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'pekerjaan',
        'alamat',
        'nama_lengkap_perempuan',
        'nik_perempuan',
        'tempat_lahir_perempuan',
        'tgl_lahir_perempuan',
        'alamat_perempuan',
        'pekerjaan_perempuan',
        'shdk_wali',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
