<?php


use App\Livewire\Administrasipenduduk;
use App\Livewire\Auth\Login;
use App\Livewire\Bansos;
use App\Livewire\Beranda;

use App\Livewire\Berita;
use App\Livewire\Berita\DetailBerita;
use App\Livewire\Formlayanan;
use App\Livewire\Formlayanan\Layanansuratnikah;
use App\Livewire\Fotodesa;
use App\Livewire\Fotodesa\DetailFotodesa;
use App\Livewire\Kepengurusansurat;
use App\Livewire\Kontak;
use App\Livewire\Layananpublik;
use App\Livewire\Potensidesa;
use App\Livewire\Potensidesa\DetailPariwisata;
use App\Livewire\Potensidesa\DetailUmkm;
use App\Livewire\Strukturdesa;
use App\Livewire\Videodesa;
use App\Livewire\Visimisi;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin/login', Login::class)->name('filament.admin.auth.login');

Route::get('/', Beranda::class)->name('Beranda');
Route::get('/Visimisi', Visimisi::class)->name('Visimisi');
Route::get('/Administrasipenduduk', Administrasipenduduk::class)->name('Administrasipenduduk');
Route::get('/Kepengurusansurat', Kepengurusansurat::class)->name('Kepengurusansurat');
Route::get('/Berita', Berita::class)->name('Berita');
Route::get('/berita/{slug}', DetailBerita::class)->name('detail-berita');
Route::get('/Potensidesa', Potensidesa::class)->name('Potensidesa');
Route::get('/Potensidesa/umkm/{slug}', DetailUmkm::class)->name('detail-Umkm');
Route::get('/Potensidesa/pariwisata/{slug}', DetailPariwisata::class)->name('detail-Pariwisata');
Route::get('/Strukturdesa', Strukturdesa::class)->name('Strukturdesa');
Route::get('/Fotodesa', Fotodesa::class)->name('Fotodesa');
Route::get('/fotodesa/{slug}', DetailFotodesa::class)->name('detail-fotodesa');
Route::get('/Videodesa', Videodesa::class)->name('Videodesa');
Route::get('/Bansos', Bansos::class)->name('Bansos');
Route::get('/Layananpublik', Layananpublik::class)->name('Layananpublik');
Route::get('/Kontak', Kontak::class)->name('Kontak');
Route::get('/Formlayanan', Formlayanan::class)->name('Formlayanan');
Route::get('/Formlayanan/Layanansuratnikah', Layanansuratnikah::class)->name('Formsuratnikah');

Route::post('/surat-nikah', [Layanansuratnikah::class, 'store'])->name('surat-nikah.store');

// Route KalenderAkademik

