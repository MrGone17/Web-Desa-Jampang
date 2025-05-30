<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKeteranganWaliHakim;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKeteranganWaliHakim;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKeteranganWaliHakim extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap,$kewarganegaraan, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $pekerjaan, $alamat, $status_hubungan, $agama;
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
            'nik' => 'required|digits:16|numeric',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'alamat' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_aktalahir', 'public');

        SuratKeteranganWaliHakim::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'kewarganegaraan' => $this->kewarganegaraan,
            'alamat' => $this->alamat,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKeteranganWaliHakim([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
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
                    'nama_surat' => 'Surat Keterangan Wali Hakim',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKeteranganWaliHakim::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-keterangan-wali-hakim');
    }
}
