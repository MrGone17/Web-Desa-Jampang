<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKuasaPengasuhanAnak;
use App\Models\SuratKuasaPengasuhanAnak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKuasaPengasuhAnak extends Component
{
    use WithFileUploads;

    public $warga_id,$nama_pembuat;

    public $nama_anak, $tempat_lahir_anak, $nik_anak, $agama_anak, $tgl_lahir_anak, $jenis_kelamin_anak, $no_kk_anak, $alamat_anak;
    public $nama_ortu, $nik_ortu, $agama_ortu, $no_kk_ortu, $alamat_ortu;
    public $nama_pengasuh, $nik_pengasuh, $no_kk_pengasuh, $agama_pengasuh, $alamat_pengasuh;

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
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
    }
    public function save()
    {
        $this->validate([
            'nama_anak' => 'required|string|max:255',
            'tempat_lahir_anak' => 'required|string|max:255',
            'nik_anak' => 'required|digits:16',
            'agama_anak' => 'required|string|max:50',
            'tgl_lahir_anak' => 'required|date',
            'jenis_kelamin_anak' => 'required|in:L,P',
            'no_kk_anak' => 'required|digits:16',
            'alamat_anak' => 'required|string',
            'nama_ortu' => 'required|string|max:255',
            'nik_ortu' => 'required|digits:16',
            'agama_ortu' => 'required|string|max:50',
            'no_kk_ortu' => 'required|digits:16',
            'alamat_ortu' => 'required|string',
            'nama_pengasuh' => 'required|string|max:255',
            'nik_pengasuh' => 'required|digits:16',
            'no_kk_pengasuh' => 'required|digits:16',
            'agama_pengasuh' => 'required|string|max:50',
            'alamat_pengasuh' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_kuasapengasuhananak', 'public');

        SuratKuasaPengasuhanAnak::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_anak' => $this->nama_anak,
            'tempat_lahir_anak' => $this->tempat_lahir_anak,
            'nik_anak' => $this->nik_anak,
            'agama_anak' => $this->agama_anak,
            'tgl_lahir_anak' => $this->tgl_lahir_anak,
            'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
            'no_kk_anak' => $this->no_kk_anak,
            'alamat_anak' => $this->alamat_anak,
            'nama_ortu' => $this->nama_ortu,
            'nik_ortu' => $this->nik_ortu,
            'agama_ortu' => $this->agama_ortu,
            'no_kk_ortu' => $this->no_kk_ortu,
            'alamat_ortu' => $this->alamat_ortu,
            'nama_pengasuh' => $this->nama_pengasuh,
            'nik_pengasuh' => $this->nik_pengasuh,
            'no_kk_pengasuh' => $this->no_kk_pengasuh,
            'agama_pengasuh' => $this->agama_pengasuh,
            'alamat_pengasuh' => $this->alamat_pengasuh,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKuasaPengasuhanAnak([
                   'nama' => $this->nama_pembuat,
                    'nama_anak' => $this->nama_anak,
                    'nik_anak' => $this->nik_anak,
                    'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
                    'tgl_lahir_anak' => $this->tgl_lahir_anak,
                    'nik_ortu' => $this->nik_ortu,
                    'nik_pengasuh' => $this->nik_pengasuh,
                    'nama_ortu' => $this->nama_ortu,
                    'nama_pengasuh' => $this->nama_pengasuh,
                    'alamat_anak' => $this->alamat_anak,
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
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-kuasa-pengasuh-anak');
    }
}
