<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rw;

class Rt extends Model
{
    use HasFactory;
    protected $fillable = [
        'rw_id',
        'nomor_rt',
        'jumlah_penduduk',
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
