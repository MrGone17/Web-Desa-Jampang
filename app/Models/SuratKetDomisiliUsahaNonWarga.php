<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetDomisiliUsahaNonWarga extends Model
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
        'nama_usaha',
        'alamat_usaha',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
