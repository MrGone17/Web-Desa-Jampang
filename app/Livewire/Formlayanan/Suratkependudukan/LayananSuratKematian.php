<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKematian;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKematian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKematian extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_meninggal, $tempat_lahir_meninggal, $tempat_meninggal, $nik_meninggal, $agama_meninggal, $pekerjaan_meninggal, $tgl_lahir_meninggal,$tgl_meninggal, $jenis_kelamin_meninggal, $kewarganegaraan_meninggal;
    public $nama_bersangkutan, $nik_bersangkutan, $agama_bersangkutan, $pekerjaan_bersangkutan, $tempat_lahir_bersangkutan, $tgl_lahir_bersangkutan, $jenis_kelamin_bersangkutan, $kewarganegaraan_bersangkutan;
    public $alamat_meninggal,$shdk_bersangkutan, $alamat_bersangkutan;
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
            'nama_meninggal' => 'required|string|max:255',
            'tempat_lahir_meninggal' => 'required|string|max:255',
            'tempat_meninggal' => 'required|string|max:255',
            'nik_meninggal' => 'required|digits:16',
            'pekerjaan_meninggal' => 'required|string|max:255',
            'agama_meninggal' => 'required|string|max:255',
            'tgl_lahir_meninggal' => 'required|date',
            'tgl_meninggal' => 'required|date',
            'jenis_kelamin_meninggal' => 'required|in:L,P',
            'kewarganegaraan_meninggal' => 'required|in:WNI,WNA',
            'nama_bersangkutan' => 'required|string|max:255',
            'nik_bersangkutan' => 'required|digits:16',
            'pekerjaan_bersangkutan' => 'required|string|max:255',
            'agama_bersangkutan' => 'required|string|max:255',
            'tempat_lahir_bersangkutan' => 'required|string|max:255',
            'tgl_lahir_bersangkutan' => 'required|date',
            'jenis_kelamin_bersangkutan' => 'required|in:L,P',
            'kewarganegaraan_bersangkutan' => 'required|in:WNI,WNA',
            'alamat_meninggal' => 'required|string',
            'alamat_bersangkutan' => 'required|string',
            'shdk_bersangkutan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_aktalahir', 'public');

        SuratKematian::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_meninggal' => $this->nama_meninggal,
            'tempat_lahir_meninggal' => $this->tempat_lahir_meninggal,
            'tempat_meninggal' => $this->tempat_meninggal,
            'nik_meninggal' => $this->nik_meninggal,
            'pekerjaan_meninggal' => $this->pekerjaan_meninggal,
            'agama_meninggal' => $this->pekerjaan_meninggal,
            'tgl_lahir_meninggal' => $this->tgl_lahir_meninggal,
            'tgl_meninggal' => $this->tgl_meninggal,
            'jenis_kelamin_meninggal' => $this->jenis_kelamin_meninggal,
            'kewarganegaraan_meninggal' => $this->kewarganegaraan_meninggal,
            'nama_bersangkutan' => $this->nama_bersangkutan,
            'nik_bersangkutan' => $this->nik_bersangkutan,
            'pekerjaan_bersangkutan' => $this->pekerjaan_bersangkutan,
            'agama_bersangkutan' => $this->agama_bersangkutan,
            'tempat_lahir_bersangkutan' => $this->tempat_lahir_bersangkutan,
            'tgl_lahir_bersangkutan' => $this->tgl_lahir_bersangkutan,
            'jenis_kelamin_bersangkutan' => $this->jenis_kelamin_bersangkutan,
            'kewarganegaraan_bersangkutan' => $this->kewarganegaraan_bersangkutan,
            'alamat_meninggal' => $this->alamat_meninggal,
            'alamat_bersangkutan' => $this->alamat_bersangkutan,
            'shdk_bersangkutan' => $this->shdk_bersangkutan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKematian([
                    'nama' => $this->nama_pembuat,
                    'nik_bersangkutan' => $this->nik_bersangkutan,
                    'nik_meninggal' => $this->nik_meninggal,
                    'nama_bersangkutan' => $this->nama_bersangkutan,
                    'nama_meninggal' => $this->nama_meninggal,
                    'alamat_meninggal' => $this->alamat_meninggal,
                    'alamat_bersangkutan' => $this->alamat_bersangkutan,
                    'shdk_bersangkutan' => $this->shdk_bersangkutan,
                    'status' => 'diproses',
                ])
            );
        }
        $admins = User::all();

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->send
                (new Notifikasiadmin([
                    'nama_lengkap' => $this->nama_pembuat,
                    'nama_surat' => 'Surat Kematian',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKematian::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-kematian');
    }
}
