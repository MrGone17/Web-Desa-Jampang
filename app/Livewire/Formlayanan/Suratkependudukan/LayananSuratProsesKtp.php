<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratProsesKtp;
use App\Mail\Notifikasiadmin;
use App\Models\Suratprosesktp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratProsesKtp extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $nama_lengkap,$kewarganegaraan, $pekerjaan, $agama, $jenis_kelamin, $nik, $tgl_lahir,$tempat_lahir, $alamat, $pengantar_pdf;
    public $pendidikan, $status_hubungan, $keperluan, $no_kk, $kepala_kk;
    public bool $showSuccessModal = false;
    public function permision (){
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
    }
    public function loaddata(){
         $user = Auth::guard('warga')->user();
    
        if ($user) {
            $this->nama_lengkap = $user->name;
            $this->nik = $user->nik;
            $this->tempat_lahir = optional($user->profil)->tempat_lahir ?? 'Belum diisi';
            $this->tgl_lahir = optional($user->profil)->tanggal_lahir ?? 'Belum diisi';
            $this->alamat = optional($user->profil)->alamat ?? 'Belum diisi';
            $this->jenis_kelamin = optional($user->profil)->jenis_kelamin ?? 'Belum diisi';
            $this->agama = optional($user->profil)->agama ?? 'Belum diisi';
            $this->pekerjaan = optional($user->profil)->pekerjaan ?? 'Belum diisi';
            $this->kewarganegaraan = optional($user->profil)->kewarganegaraan ?? 'Belum diisi';
        } else {
            $this->nama_lengkap = 'Tidak ditemukan';
            $this->nik = 'Tidak ditemukan';
            $this->tempat_lahir = 'Tidak ditemukan';
            $this->tgl_lahir = 'Tidak ditemukan';
            $this->alamat = 'Tidak ditemukan';
            $this->jenis_kelamin = 'Tidak ditemukan';
            $this->agama = 'Tidak ditemukan';
            $this->pekerjaan = 'Tidak ditemukan';
            $this->kewarganegaraan = 'Tidak ditemukan';
        }
    }
    public function save()
    {
        $this->validate([
            'status_hubungan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_suratprosesktp', 'public');

        Suratprosesktp::create([
            'warga_id' => Auth::guard('warga')->id(),
            'status_hubungan' => $this->status_hubungan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        $user = auth()->guard('warga')->user();

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratProsesKtp([
                'nama' => $this->nama_lengkap,
                'nik' => $this->nik,
                'tempat_lahir' => $this->tempat_lahir,
                'tgl_lahir' => $this->tgl_lahir,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat' => $this->alamat,
                ])
            );
        }
       $admins = User::all();

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->send
                (new Notifikasiadmin([
                    'nama_lengkap' => $this->nama_lengkap,
                    'nama_surat' => 'Surat Keterangan KTP Dalam Proses',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = Suratprosesktp::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-proses-ktp');
    }
}
