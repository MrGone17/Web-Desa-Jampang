<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetLajang extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'status_kawin',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'nama_lengkap_pasangan',
        'nik_pasangan',
        'tempat_lahir_pasangan',
        'tgl_lahir_pasangan',
        'jenis_kelamin_pasangan',
        'status_kawin_pasangan',
        'agama_pasangan',
        'pekerjaan_pasangan',
        'kewarganegaraan_pasangan',
        'alamat_pasangan',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
