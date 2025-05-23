<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratdomisili extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'pendidikan',
        'status_hubungan',
        'status',
        'no_kk',
        'kepala_kk',
        'keperluan',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
