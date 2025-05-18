<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattidakpunyadokumenpenduduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'nama_ibu',
        'status',
        'gol_darah',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
