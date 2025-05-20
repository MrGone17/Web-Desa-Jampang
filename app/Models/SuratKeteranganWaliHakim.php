<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganWaliHakim extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_lengkap',
        'nik',
        'tgl_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'kewarganegaraan',
        'alamat',
        'status',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
