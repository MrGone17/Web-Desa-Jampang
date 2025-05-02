<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rt;

class Rw extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_active',
        'nomor_rw',
    ];
    public function rts()
    {
        return $this->hasMany(Rt::class);
    }
}
