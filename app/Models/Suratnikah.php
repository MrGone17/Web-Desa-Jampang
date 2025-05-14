<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratnikah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_lengkap',
        'warga_id',
        'nik',
        'tgl_lahir',
        'alamat',
        'nama_pasangan',
        'tgl_nikah',
        'kk_pdf',
        'kk_foto'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
