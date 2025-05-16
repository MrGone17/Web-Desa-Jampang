<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedanama extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'perbedaan',
        'nama_beda',
        'nik_beda',
        'alamat_beda',
        'tempat_lahir_beda',
        'tanggal_lahir_beda',
        'pekerjaan_beda',
        'kewarganegaraan_beda',
        'agama_beda',
        'jenis_kelamin_beda',
        'bukti_pdf',
        'pengantar_pdf',
        'status',
        'catatan',
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
