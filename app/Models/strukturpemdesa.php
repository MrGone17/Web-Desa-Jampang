<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strukturpemdesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_active',
        'cover_image'
    ];
}
