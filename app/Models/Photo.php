<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id', 
        'image', 
        'caption'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
