<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layananpublik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor_wa',
        'alamat',
        'tanggal_kejadian',
        'keterangan',
        'bukti_foto',
    ];
}
