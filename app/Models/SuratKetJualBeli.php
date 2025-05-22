<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetJualBeli extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'nama_lengkap_pihaklain',
        'nik_pihaklain',
        'tempat_lahir_pihaklain',
        'tgl_lahir_pihaklain',
        'jenis_kelamin_pihaklain',
        'pekerjaan_pihaklain',
        'kewarganegaraan_pihaklain',
        'alamat_pihaklain',
        'nama_barang',
        'spesifikasi',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
