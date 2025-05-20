<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKuasaPengasuhanAnak extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_anak',
        'tempat_lahir_anak',
        'nik_anak',
        'agama_anak',
        'no_kk_anak',
        'tgl_lahir_anak',
        'jenis_kelamin_anak',
        'alamat_anak',
        'nama_ortu',
        'nik_ortu',
        'agama_ortu',
        'no_kk_ortu',
        'alamat_ortu',
        'nama_pengasuh',
        'nik_pengasuh',
        'agama_pengasuh',
        'no_kk_pengasuh',
        'alamat_pengasuh',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
