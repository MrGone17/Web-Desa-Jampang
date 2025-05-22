<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzinKeramaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'no_kk',
        'kepala_kk',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'pendidikan',
        'status_kawin',
        'alamat',
        'berlaku_dari',
        'berlaku_sampai',
        'jenis_keramaian',
        'keperluan',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
