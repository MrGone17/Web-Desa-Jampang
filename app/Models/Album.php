<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title','is_active', 'description', 'cover_image','slug'];
    protected static function booted()
    {
        static::creating(function ($album) {
            $album->slug = Str::slug($album->title);
        });
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
