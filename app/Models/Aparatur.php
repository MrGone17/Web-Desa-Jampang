<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparatur extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'divisi_id', 
        'image', 
        'nama',
        'jabatan'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisidesa::class, 'divisi_id');
    }
}
