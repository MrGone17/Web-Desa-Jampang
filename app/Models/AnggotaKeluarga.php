<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;
    protected $fillable = [
        'suratpindahpenduduk_id', 
        'nik', 
        'nama',
        'jenis_kelamin',
        'shdk'
    ];
    public function suratpindah()
    {
        return $this->belongsTo(Suratpindahpenduduk::class);
    }
}
