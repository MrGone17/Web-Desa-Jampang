<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory,SoftDeletes,HasUuids;
    protected $fillable = [
        'is_active',
        'title',
        'publish_date',
        'slug',
        'description',
        'image',
        'deleted_at'
    ];
    protected static function booted()
    {
        static::saving(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->title);
            }
        });
    }
}
