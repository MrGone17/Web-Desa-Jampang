<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'is_active',
        'visi_title',
        'misi_title',
        'visi_desc',
        'misi_desc',
    ];
}
