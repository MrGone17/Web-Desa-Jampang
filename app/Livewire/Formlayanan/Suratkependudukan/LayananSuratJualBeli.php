<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKetJualUsaha;
use App\Models\SuratKetJualBeli;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratJualBeli extends Component
{
    use WithFileUploads;

    public $warga_id,$nama_pembuat;
    public $nama_lengkap, $nik,$spesifikasi, $nama_barang, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $kewarganegaraan, $pekerjaan, $alamat;
    public $nama_lengkap_pihaklain, $nik_pihaklain, $tempat_lahir_pihaklain, $tgl_lahir_pihaklain, $jenis_kelamin_pihaklain, $kewarganegaraan_pihaklain, $pekerjaan_pihaklain, $alamat_pihaklain;
    public $pengantar_pdf;
    public bool $showSuccessModal = false;
    public function loaddata(){
         $user = Auth::guard('warga')->user();
    
        if ($user) {
            $this->nama_pembuat = $user->name;
        } else {
            $this->nama_pembuat = 'Tidak ditemukan';
        }
    }
    public function permision (){
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); 
        }
    }
    public function save()
    {
        $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|digits:16|numeric', 
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_lengkap_pihaklain' => 'required|string|max:255',
            'nik_pihaklain' => 'required|string|digits:16|numeric', 
            'tempat_lahir_pihaklain' => 'required|string|max:255',
            'tgl_lahir_pihaklain' => 'required|date',
            'jenis_kelamin_pihaklain' => 'required|in:L,P',
            'kewarganegaraan_pihaklain' => 'required|in:WNI,WNA',
            'pekerjaan_pihaklain' => 'required|string|max:255',
            'alamat_pihaklain' => 'required|string',
            'nama_barang' => 'required|string',
            'spesifikasi' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_jual_beli', 'public');

        SuratKetJualBeli::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'kewarganegaraan' => $this->kewarganegaraan,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'nama_lengkap_pihaklain' => $this->nama_lengkap_pihaklain,
            'nik_pihaklain' => $this->nik_pihaklain,
            'tempat_lahir_pihaklain' => $this->tempat_lahir_pihaklain,
            'tgl_lahir_pihaklain' => $this->tgl_lahir_pihaklain,
            'jenis_kelamin_pihaklain' => $this->jenis_kelamin_pihaklain,
            'kewarganegaraan_pihaklain' => $this->kewarganegaraan_pihaklain,
            'pekerjaan_pihaklain' => $this->pekerjaan_pihaklain,
            'alamat_pihaklain' => $this->alamat_pihaklain,
            'nama_barang' => $this->nama_barang,
            'spesifikasi' => $this->spesifikasi,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKetJualUsaha([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
                    'nama_lengkap_pihaklain' => $this->nama_lengkap_pihaklain,
                    'nik_pihaklain' => $this->nik_pihaklain,
                    'alamat_pihaklain' => $this->alamat_pihaklain,
                    'spesifikasi' => $this->spesifikasi,
                    'nama_barang' => $this->nama_barang,
                    'status' => 'diproses',
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
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-jual-beli');
    }
}
