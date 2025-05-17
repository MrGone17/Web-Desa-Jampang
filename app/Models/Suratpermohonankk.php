<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratpermohonankk extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'status',
        'no_kk',
        'catatan',
        'usia',
        'pengantar_pdf'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
    
}
