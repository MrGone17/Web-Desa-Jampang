<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'is_active',
        'jam_operasional',
        'telepon',
        'alamat',
        'email',
        'google_maps_embed',
    ];
}
