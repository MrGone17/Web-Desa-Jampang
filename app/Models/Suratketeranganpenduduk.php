<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratketeranganpenduduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'status',
        'no_kk',
        'usia',
        'keperluan',
        'catatan',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
