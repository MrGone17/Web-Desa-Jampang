<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKeteranganWali;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKeteranganTelahMenikah;
use App\Models\SuratKeteranganWali;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKeteranganWali extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap,$shdk_wali, $nik, $tempat_lahir, $tgl_lahir,$tgl_menikah, $pekerjaan, $alamat;
    public $nama_lengkap_perempuan, $nik_perempuan, $tempat_lahir_perempuan, $tgl_lahir_perempuan, $agama_perempuan, $pekerjaan_perempuan, $kewarganegaraan_perempuan, $alamat_perempuan;

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
            'nik' => 'required|numeric|digits:16',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'nama_lengkap_perempuan' => 'required|string|max:255',
            'nik_perempuan' => 'required|numeric|digits:16',
            'tempat_lahir_perempuan' => 'required|string|max:255',
            'tgl_lahir_perempuan' => 'required|date',
            'shdk_wali' => 'required|string|max:100',
            'pekerjaan_perempuan' => 'required|string|max:100',
            'alamat_perempuan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_rujuk_cerai', 'public');

        SuratKeteranganWali::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'shdk_wali' => $this->shdk_wali,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'nama_lengkap_perempuan' => $this->nama_lengkap_perempuan,
            'nik_perempuan' => $this->nik_perempuan,
            'tempat_lahir_perempuan' => $this->tempat_lahir_perempuan,
            'tgl_lahir_perempuan' => $this->tgl_lahir_perempuan,
            'pekerjaan_perempuan' => $this->pekerjaan_perempuan,
            'alamat_perempuan' => $this->alamat_perempuan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKeteranganWali([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
                    'nama_lengkap_perempuan' => $this->nama_lengkap_perempuan,
                    'nik_perempuan' => $this->nik_perempuan,
                    'alamat_perempuan' => $this->alamat_perempuan,
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
                    'nama_surat' => 'Surat Keterangan Wali',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKeteranganWali::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-keterangan-wali');
    }
}
