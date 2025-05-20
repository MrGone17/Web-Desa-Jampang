<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetPernahMenikah extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'nama_lengkap_pria',
        'nik_pria',
        'tempat_lahir_pria',
        'tgl_lahir_pria',
        'jenis_kelamin_pria',
        'agama_pria',
        'pekerjaan_pria',
        'kewarganegaraan_pria',
        'alamat_pria',
        'nama_lengkap_perempuan',
        'nik_perempuan',
        'tempat_lahir_perempuan',
        'tgl_lahir_perempuan',
        'jenis_kelamin_perempuan',
        'agama_perempuan',
        'pekerjaan_perempuan',
        'kewarganegaraan_perempuan',
        'alamat_perempuan',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
