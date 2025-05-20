<?php

namespace App\Models;

use App\Filament\Resources\SuratKeteranganTelahMenikahResource;
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
    public function suratpindahpenduduk()
    {
        return $this->hasMany(Suratpindahpenduduk::class);
    }
    public function suratnoaktalahir()
    {
        return $this->hasMany(Suratnoaktalahir::class);
    }
    public function suratketeranganaktalahir()
    {
        return $this->hasMany(Suratbuataktalahir::class);
    }
    public function suratmatidanlahir()
    {
        return $this->hasMany(Suratmatidanlahir::class);
    }
    public function suratkematian()
    {
        return $this->hasMany(SuratKematian::class);
    }
    public function suratkuasapengasuhananak()
    {
        return $this->hasMany(SuratKuasaPengasuhanAnak::class);
    }
    public function suratpembuatanaktalahir()
    {
        return $this->hasMany(SuratPembuatanAktaLahir::class);
    }
    public function suratpengakuananak()
    {
        return $this->hasMany(SuratPembuatanPengakuanAnak::class);
    }
    public function suratbelummenikah()
    {
        return $this->hasMany(SuratBelumMenikah::class);
    }
    public function suratsudahmenikah()
    {
        return $this->hasMany(SuratKeteranganMenikah::class);
    }
    public function suratnumpangmenikah()
    {
        return $this->hasMany(SuratNumpangNikah::class);
    }
    public function suratrujukcerai()
    {
        return $this->hasMany(SuratRujukCerai::class);
    }
    public function surattelahmenikah()
    {
        return $this->hasMany(SuratKeteranganTelahMenikahResource::class);
    }
    public function suratwali()
    {
        return $this->hasMany(SuratKeteranganWali::class);
    }
}
