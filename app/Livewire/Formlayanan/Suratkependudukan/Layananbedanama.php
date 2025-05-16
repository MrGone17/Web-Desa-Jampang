<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKeteranganBedaNama;
use App\Models\Bedanama;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Layananbedanama extends Component
{
    use WithFileUploads;

    public $nama_lengkap,$kewarganegaraan, $pekerjaan, $agama, $jenis_kelamin, $nik, $tgl_lahir,$tempat_lahir, $alamat, $pengantar_pdf, $bukti_pdf;
    public $nama_beda,$perbedaan,$kewarganegaraan_beda, $pekerjaan_beda, $agama_beda, $jenis_kelamin_beda, $nik_beda, $tgl_lahir_beda,$tempat_lahir_beda, $alamat_beda;
    public bool $showSuccessModal = false;
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
            'nama_beda' => 'required|string',
            'perbedaan' => 'required|string',
            'nik_beda' => 'nullable|string',
            'tempat_lahir_beda' => 'nullable|string',
            'jenis_kelamin_beda' => 'nullable|string',
            'agama_beda' => 'nullable|string',
            'pekerjaan_beda' => 'nullable|string',
            'kewarganegaraan_beda' => 'nullable|string',
            'alamat_beda' => 'nullable|string',
            'tgl_lahir_beda' => 'date|nullable',
            'bukti_pdf' => 'required|file|mimes:pdf|max:2048',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pdfPathbukti = $this->bukti_pdf->store('bukti_perbedaan', 'public');
        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_perbedaan', 'public');

        Bedanama::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_beda' => $this->nama_beda,
            'perbedaan' => $this->perbedaan,
            'nik_beda' => $this->nik_beda,
            'tempat_lahir_beda' => $this->tempat_lahir_beda,
            'tgl_lahir_beda' => $this->tgl_lahir_beda,
            'jenis_kelamin_beda' => $this->jenis_kelamin_beda,
            'agama_beda' => $this->agama_beda,
            'pekerjaan_beda' => $this->pekerjaan_beda,
            'kewarganegaraan_beda' => $this->kewarganegaraan_beda,
            'alamat_beda' => $this->alamat_beda,
            'bukti_pdf' => $pdfPathbukti,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        $user = auth()->guard('warga')->user();

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKeteranganBedaNama([
            'nama' => $this->nama_lengkap,
            'nama_beda' => $this->nama_beda,
            'perbedaan' => $this->perbedaan,
            'nik' => $this->nik,
            'alamat' => $this->alamat,
                ])
            );
        }
        $this->reset();
        $this->showSuccessModal = true;
    }
    public function mount (){
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layananbedanama');
    }
}
