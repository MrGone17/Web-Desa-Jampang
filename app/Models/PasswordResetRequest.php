<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetRequest extends Model
{
    use HasFactory;
    protected $fillable = ['warga_id', 'status', 'token', 'expires_at'];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
