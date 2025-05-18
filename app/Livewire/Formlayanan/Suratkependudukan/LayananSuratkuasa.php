<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratkuasa;
use App\Models\Suratkuasa;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratkuasa extends Component
{
    use WithFileUploads;
    
    public $nama_lengkap,$kewarganegaraan, $pekerjaan, $agama, $jenis_kelamin, $nik, $tgl_lahir,$tempat_lahir, $alamat, $pengantar_pdf;
    public $nama_kuasa,$kewarganegaraan_kuasa, $pekerjaan_kuasa, $jenis_kelamin_kuasa, $nik_kuasa,$alasan_kuasa, $tgl_lahir_kuasa,$tempat_lahir_kuasa, $alamat_kuasa;
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
            'nama_kuasa' => 'required|string',
            'nik_kuasa' => 'required|numeric|digits:16|string',
            'tempat_lahir_kuasa' => 'required|string',
            'jenis_kelamin_kuasa' => 'required|string',
            'pekerjaan_kuasa' => 'required|string',
            'kewarganegaraan_kuasa' => 'required|string',
            'alamat_kuasa' => 'required|string',
            'tgl_lahir_kuasa' => 'date|required',
            'alasan_kuasa' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_kuasa', 'public');

        Suratkuasa::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_kuasa' => $this->nama_kuasa,
            'nik_kuasa' => $this->nik_kuasa,
            'tempat_lahir_kuasa' => $this->tempat_lahir_kuasa,
            'tanggal_lahir_kuasa' => $this->tgl_lahir_kuasa,
            'jenis_kelamin_kuasa' => $this->jenis_kelamin_kuasa,
            'pekerjaan_kuasa' => $this->pekerjaan_kuasa,
            'kewarganegaraan_kuasa' => $this->kewarganegaraan_kuasa,
            'alamat_kuasa' => $this->alamat_kuasa,
            'alasan_kuasa' => $this->alasan_kuasa,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratkuasa([
                'nama' => $this->nama_lengkap,
                'nik' => $this->nik,
                'nama_kuasa' => $this->nama_kuasa,
                'nik_kuasa' => $this->nik_kuasa,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat_kuasa' => $this->alamat_kuasa,
                'alamat' => $this->alamat,
                'alasan_kuasa' => $this->alasan_kuasa,
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
        return view('livewire.formlayanan.suratkependudukan.layanan-suratkuasa');
    }
}
