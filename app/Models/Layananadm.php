<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layananadm extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'is_active',
        'title',
        'description',
        'icon',
    ];
}
