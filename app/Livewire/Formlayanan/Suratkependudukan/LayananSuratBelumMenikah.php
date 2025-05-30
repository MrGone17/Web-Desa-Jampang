<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratBelumMenikah;
use App\Mail\Notifikasiadmin;
use App\Models\SuratBelumMenikah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratBelumMenikah extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $pekerjaan, $alamat;
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
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_aktalahir', 'public');

        SuratBelumMenikah::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratBelumMenikah([
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
                    'nama_surat' => 'Surat Keterangan Belum Menikah',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratBelumMenikah::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-belum-menikah');
    }
}
