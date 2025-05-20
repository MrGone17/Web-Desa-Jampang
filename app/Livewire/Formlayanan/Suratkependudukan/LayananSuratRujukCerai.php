<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratRujukCerai;
use App\Models\SuratRujukCerai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratRujukCerai extends Component
{
    use WithFileUploads;

    public $warga_id,$nama_pembuat;
    public $nama_lengkap, $bin_bapak, $tempat_lahir, $tgl_lahir, $agama, $pekerjaan, $kewarganegaraan, $alamat;
    public $nama_lengkap_pasangan, $binti_bapak_pasangan, $tempat_lahir_pasangan, $tgl_lahir_pasangan, $agama_pasangan, $pekerjaan_pasangan, $kewarganegaraan_pasangan, $alamat_pasangan;

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
            'bin_bapak' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'alamat' => 'required|string',
            'nama_lengkap_pasangan' => 'required|string|max:255',
            'binti_bapak_pasangan' => 'required|string|max:255',
            'tempat_lahir_pasangan' => 'required|string|max:255',
            'tgl_lahir_pasangan' => 'required|date',
            'agama_pasangan' => 'required|string|max:50',
            'pekerjaan_pasangan' => 'required|string|max:100',
            'kewarganegaraan_pasangan' => 'required|in:WNI,WNA',
            'alamat_pasangan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_rujuk_cerai', 'public');

        SuratRujukCerai::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'bin_bapak' => $this->bin_bapak,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'kewarganegaraan' => $this->kewarganegaraan,
            'alamat' => $this->alamat,
            'nama_lengkap_pasangan' => $this->nama_lengkap_pasangan,
            'binti_bapak_pasangan' => $this->binti_bapak_pasangan,
            'tempat_lahir_pasangan' => $this->tempat_lahir_pasangan,
            'tgl_lahir_pasangan' => $this->tgl_lahir_pasangan,
            'agama_pasangan' => $this->agama_pasangan,
            'pekerjaan_pasangan' => $this->pekerjaan_pasangan,
            'kewarganegaraan_pasangan' => $this->kewarganegaraan_pasangan,
            'alamat_pasangan' => $this->alamat_pasangan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratRujukCerai([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'bin_bapak' => $this->bin_bapak,
                    'alamat' => $this->alamat,
                    'nama_lengkap_pasangan' => $this->nama_lengkap_pasangan,
                    'binti_bapak_pasangan' => $this->binti_bapak_pasangan,
                    'alamat_pasangan' => $this->alamat_pasangan,
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
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-rujuk-cerai');
    }
}
