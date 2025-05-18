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
    public function suratbedanama()
    {
        return $this->hasMany(Bedanama::class);
    }
    public function suratdomisili()
    {
        return $this->hasMany(Suratdomisili::class);
    }
    public function suratprosesktp()
    {
        return $this->hasMany(Suratprosesktp::class);
    }
    public function suratpermohonankk()
    {
        return $this->hasMany(Suratpermohonankk::class);
    }
    public function suratperubahankk()
    {
        return $this->hasMany(SuratPerubahankk::class);
    }
    public function suratketeranganpenduduk()
    {
        return $this->hasMany(Suratketeranganpenduduk::class);
    }
    public function suratnodokumen()
    {
        return $this->hasMany(Surattidakpunyadokumenpenduduk::class);
    }
    public function suratkuasa()
    {
        return $this->hasMany(Suratkuasa::class);
    }
}
