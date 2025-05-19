<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratahliwaris extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_waris',
        'nik_waris',
        'alamat_waris',
        'tempat_lahir_waris',
        'tanggal_lahir_waris',
        'pekerjaan_waris',
        'kewarganegaraan_waris',
        'agama_waris',
        'jenis_kelamin_waris',
        'tempat_meninggal',
        'tanggal_meninggal',
        'catatan',
        'status',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
