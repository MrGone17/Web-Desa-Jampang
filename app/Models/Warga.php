<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Authenticatable
{
    use Notifiable,HasFactory;

    protected $table = 'wargas';

    protected $fillable = [
        'name',
        'email',
        'nik',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function profil()
    {
        return $this->hasOne(Profil::class);
    }
    public function suratnikahs()
    {
        return $this->hasMany(Suratnikah::class);
    }
}
