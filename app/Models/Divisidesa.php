<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisidesa extends Model
{
    use HasFactory;

    protected $fillable = ['title','is_active'];

    public function aparatur()
    {
        return $this->hasMany(Aparatur::class, 'divisi_id');
    }
}
