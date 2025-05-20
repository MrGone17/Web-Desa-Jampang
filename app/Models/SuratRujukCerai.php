<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRujukCerai extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'bin_bapak',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'nama_lengkap_pasangan',
        'binti_bapak_pasangan',
        'tempat_lahir_pasangan',
        'tgl_lahir_pasangan',
        'alamat_pasangan',
        'agama_pasangan',
        'pekerjaan_pasangan',
        'kewarganegaraan_pasangan',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
