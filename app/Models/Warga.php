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
    public function suratwalihakim()
    {
        return $this->hasMany(SuratKeteranganWaliHakim::class);
    }
    public function suratpengantarnikah()
    {
        return $this->hasMany(SuratPengantarNikah::class);
    }
    public function suratpermohonancerai()
    {
        return $this->hasMany(SuratPermohonanCerai::class);
    }
    public function suratduplikatsuratnikah()
    {
        return $this->hasMany(SuratDuplikatSuratNikah::class);
    }
    public function suratKeteranganJandaDuda()
    {
        return $this->hasMany(SuratKetJandaDuda::class);
    }
    public function suratKeteranganlajang()
    {
        return $this->hasMany(SuratKetLajang::class);
    }
    public function suratKeteranganpernahmenikah()
    {
        return $this->hasMany(SuratKetPernahMenikah::class);
    }
    public function suratizinkeramaian()
    {
        return $this->hasMany(SuratIzinKeramaian::class);
    }
    public function suratketerangancatatankriminal()
    {
        return $this->hasMany(SuratKeteranganCatatanKriminal::class);
    }
    public function suratketjamkesos()
    {
        return $this->hasMany(SuratKetJamkesos::class);
    }
    public function suratketkehilangan()
    {
        return $this->hasMany(SuratKetKehilangan::class);
    }
    public function suratketpenghasilanortu()
    {
        return $this->hasMany(SuratKetPenghasilanOrtu::class);
    }
    public function suratkettidakmampu()
    {
        return $this->hasMany(SuratKetTidakMampu::class);
    }
    public function suratketdomisiliusaha()
    {
        return $this->hasMany(SuratKetDomisiliUsaha::class);
    }
    public function suratketdomisiliusahanonwarga()
    {
        return $this->hasMany(SuratKetDomisiliUsahaNonWarga::class);
    }
    public function suratketjualbeli()
    {
        return $this->hasMany(SuratKetJualBeli::class);
    }
    public function suratketusaha()
    {
        return $this->hasMany(SuratKetUsaha::class);
    }
}
