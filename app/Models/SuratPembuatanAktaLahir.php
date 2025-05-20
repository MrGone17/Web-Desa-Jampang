<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPembuatanAktaLahir extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_ortu',
        'nama_anak',
        'tempat_lahir_ortu',
        'nik_ortu',
        'agama_ortu',
        'pekerjaan_ortu',
        'tgl_lahir_ortu',
        'usia_ortu',
        'alamat_ortu',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
     public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
