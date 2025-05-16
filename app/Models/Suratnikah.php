<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratnikah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'warga_id',
        'nama_pasangan',
        'tgl_nikah',
        'kk_pdf',
        'status',
        'kk_foto'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
