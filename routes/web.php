<?php


use App\Livewire\Administrasipenduduk;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\WargaLogin;
use App\Livewire\Auth\WargaRegister;
use App\Livewire\Bansos;
use App\Livewire\Beranda;

use App\Livewire\Berita;
use App\Livewire\Berita\DetailBerita;
use App\Livewire\Formlayanan;
use App\Livewire\Formlayanan\Layanansuratnikah;
use App\Livewire\Formlayanan\Suratkependudukan\Layananbedanama;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratAhliWaris;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratBelumMenikah;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratbuataktalahir;
use App\Livewire\Formlayanan\Suratkependudukan\Layanansuratdomisili;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKematian;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKeteranganMenikah;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKeteranganPenduduk;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKeteranganTelahMenikah;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKeteranganWali;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKeteranganWaliHakim;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratkuasa;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratKuasaPengasuhAnak;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratmatidanlahir;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratnoaktalahir;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratNumpangMenikah;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratPembuatanAktaLahir;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratPembuatanPengakuanAnak;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratPengantarNikah;
use App\Livewire\Formlayanan\Suratkependudukan\Layanansuratpermohonankk;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratPerubahankk;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratPindahPenduduk;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratProsesKtp;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSuratRujukCerai;
use App\Livewire\Formlayanan\Suratkependudukan\LayananSurattidakpunyadokumenpenduduk;
use App\Livewire\Fotodesa;
use App\Livewire\Fotodesa\DetailFotodesa;
use App\Livewire\Kepengurusansurat;
use App\Livewire\Kontak;
use App\Livewire\Layananpublik;
use App\Livewire\Potensidesa;
use App\Livewire\Potensidesa\DetailPariwisata;
use App\Livewire\Potensidesa\DetailUmkm;
use App\Livewire\Profil;
use App\Livewire\Strukturdesa;
use App\Livewire\Videodesa;
use App\Livewire\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin/login', Login::class)->name('filament.admin.auth.login');
Route::get('/login', WargaLogin::class)->name('login');
Route::get('/register', WargaRegister::class)->name('register');
Route::post('/logout', function (Request $request) {
    Auth::guard('warga')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // arahkan ke halaman home atau login
})->name('logout');


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
Route::get('/Profil', Profil::class)->name('Profil');
Route::get('/Layananpublik', Layananpublik::class)->name('Layananpublik');
Route::get('/Kontak', Kontak::class)->name('Kontak');
Route::get('/Formlayanan', Formlayanan::class)->name('Formlayanan');
Route::get('/Formlayanan/Layanansuratnikah', Layanansuratnikah::class)->name('Formsuratnikah');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Beda-Nama', Layananbedanama::class)->name('Formbedanama');
Route::get('/Formlayanan/Layanan-Surat-Domisili', Layanansuratdomisili::class)->name('Formsuratdomisili');
Route::get('/Formlayanan/Layanan-Surat-Permohonan-KK', Layanansuratpermohonankk::class)->name('FormsuratLayanansuratpermohonankk');
Route::get('/Formlayanan/Layanan-Surat-Prose-KTP', LayananSuratProsesKtp::class)->name('FormsuratLayanansuratprosesktp');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Penduduk', LayananSuratKeteranganPenduduk::class)->name('FormsuratLayanansuratketeranganpenduduk');
Route::get('/Formlayanan/Layanan-Surat-Perubahan-KK', LayananSuratPerubahankk::class)->name('FormsuratLayanansuratperubahankk');
Route::get('/Formlayanan/Layanan-Surat-Tidak-Memiliki-Dokumen-Penduduk', LayananSurattidakpunyadokumenpenduduk::class)->name('FormsuratLayanantidakmemilikidokumen');
Route::get('/Formlayanan/Layanan-Surat-Kuasa', LayananSuratkuasa::class)->name('FormsuratLayanankuasa');
Route::get('/Formlayanan/Layanan-Surat-Pindah-Kependudukan', LayananSuratPindahPenduduk::class)->name('FormsuratLayananpindahkependudukan');
Route::get('/Formlayanan/Layanan-Surat-Ahli-Waris', LayananSuratAhliWaris::class)->name('FormsuratLayananahliwaris');
Route::get('/Formlayanan/Layanan-Surat-Tidak-Punya-Akta-Kelahiran', LayananSuratnoaktalahir::class)->name('FormsuratLayanannoaktalahir');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Lahir-Dan-Mati', LayananSuratmatidanlahir::class)->name('FormsuratLayananmatidanlahir');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Kelahiran', LayananSuratbuataktalahir::class)->name('FormsuratLayananbuataktalahir');
Route::get('/Formlayanan/Layanan-Surat-Kematian', LayananSuratKematian::class)->name('FormsuratLayanankematian');
Route::get('/Formlayanan/Layanan-Surat-Kuasa-Pengasuhan-Anak', LayananSuratKuasaPengasuhAnak::class)->name('FormsuratLayanankuasapengasuhananak');
Route::get('/Formlayanan/Layanan-Surat-Pembuatan-Akta-Kelahiran', LayananSuratPembuatanAktaLahir::class)->name('FormsuratLayananpembuatanaktalahir');
Route::get('/Formlayanan/Layanan-Surat-Pengakuan-Anak', LayananSuratPembuatanPengakuanAnak::class)->name('FormsuratLayananpembuatanPengakuanAnak');
Route::get('/Formlayanan/Layanan-Surat-Belum-Menikah', LayananSuratBelumMenikah::class)->name('FormsuratLayananbelummenikah');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Menikah', LayananSuratKeteranganMenikah::class)->name('FormsuratLayananketeranganmenikah');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Numpang-Menikah', LayananSuratNumpangMenikah::class)->name('FormsuratLayanannumpangmenikah');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Rujuk-Cerai', LayananSuratRujukCerai::class)->name('FormsuratLayananrujukcerai');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Telah-Menikah', LayananSuratKeteranganTelahMenikah::class)->name('FormsuratLayananketerangantelahmenikah');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Wali', LayananSuratKeteranganWali::class)->name('FormsuratLayananketeranganwali');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Wali-Hakim', LayananSuratKeteranganWaliHakim::class)->name('FormsuratLayananketeranganwalihakim');
Route::get('/Formlayanan/Layanan-Surat-Keterangan-Pengantar-Nikah', LayananSuratPengantarNikah::class)->name('FormsuratLayananketeranganpengantarnikah');

Route::post('/surat-nikah', [Layanansuratnikah::class, 'store'])->name('surat-nikah.store');

// Route KalenderAkademik

