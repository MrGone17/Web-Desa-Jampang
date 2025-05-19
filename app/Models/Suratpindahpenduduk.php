<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratpindahpenduduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'pendidikan',
        'status_hubungan',
        'status',
        'no_kk',
        'kepala_kk',
        'alasan_pindah',
        'catatan',
        'jumlah_keluarga',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class);
    }
}
