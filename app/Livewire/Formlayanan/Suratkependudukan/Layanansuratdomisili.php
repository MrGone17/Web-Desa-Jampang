<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiStatusSuratDomisili;
use App\Mail\KonfirmasiSuratDomisili;
use App\Models\Suratdomisili;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Layanansuratdomisili extends Component
{
    use WithFileUploads;

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
            $this->tgl_lahir = 'Tidak ditemukan';
            $this->alamat = 'Tidak ditemukan';
        }
    }
    public function save()
    {
        $this->validate([
            'pendidikan' => 'required|string',
            'status_hubungan' => 'required|string',
            'keperluan' => 'required|string',
            'no_kk' => 'required|numeric|digits:16|string',
            'kepala_kk' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_suratdomisili', 'public');

        Suratdomisili::create([
            'warga_id' => Auth::guard('warga')->id(),
            'pendidikan' => $this->pendidikan,
            'status_hubungan' => $this->status_hubungan,
            'keperluan' => $this->keperluan,
            'no_kk' => $this->no_kk,
            'kepala_kk' => $this->kepala_kk,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        $user = auth()->guard('warga')->user();

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratDomisili([
                'nama' => $this->nama_lengkap,
                'keperluan' => $this->keperluan,
                'nik' => $this->nik,
                'no_kk' => $this->no_kk,
                'kepala_kk' => $this->kepala_kk,
                'alamat' => $this->alamat,
                ])
            );
        }
        $this->reset();
        $this->showSuccessModal = true;
    }
    public function mount (){
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanansuratdomisili');
    }
}
