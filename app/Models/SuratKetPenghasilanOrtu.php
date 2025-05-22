<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetPenghasilanOrtu extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'status_kawin',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'penghasilan',
        'keperluan',
        'nama_lengkap_anak',
        'nik_anak',
        'tempat_lahir_anak',
        'tgl_lahir_anak',
        'jenis_kelamin_anak',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
