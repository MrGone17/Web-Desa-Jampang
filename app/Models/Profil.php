<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'pekerjaan',
        'kewarganegaraan',
        'agama',
        'jenis_kelamin',
        'foto',
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

}
