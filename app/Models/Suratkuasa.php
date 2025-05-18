<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratkuasa extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'status',
        'nama_kuasa',
        'tempat_lahir_kuasa',
        'nik_kuasa',
        'tanggal_lahir_kuasa',
        'jenis_kelamin_kuasa',
        'alamat_kuasa',
        'pekerjaan_kuasa',
        'kewarganegaraan_kuasa',
        'tempat_lahir_kuasa',
        'alasan_kuasa',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
