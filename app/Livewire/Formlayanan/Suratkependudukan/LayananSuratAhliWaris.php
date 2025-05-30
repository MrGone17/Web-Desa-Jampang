<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratahliwaris;
use App\Mail\Notifikasiadmin;
use App\Models\Suratahliwaris;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratAhliWaris extends Component
{
    use WithFileUploads;
    
    public $suratlist;
    public $nama_lengkap,$kewarganegaraan, $pekerjaan, $agama, $jenis_kelamin, $nik, $tgl_lahir,$tempat_lahir, $alamat, $pengantar_pdf;
    public $nama_waris,$kewarganegaraan_waris, $pekerjaan_waris, $jenis_kelamin_waris, $nik_waris,$agama_waris, $tanggal_lahir_waris,$tempat_lahir_waris, $alamat_waris, $tanggal_meninggal ,$tempat_meninggal;
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
            'nama_waris' => 'required|string',
            'nik_waris' => 'required|numeric|digits:16|string',
            'tempat_lahir_waris' => 'required|string',
            'jenis_kelamin_waris' => 'required|string',
            'pekerjaan_waris' => 'required|string',
            'kewarganegaraan_waris' => 'required|string',
            'agama_waris' => 'required|string',
            'alamat_waris' => 'required|string',
            'tanggal_lahir_waris' => 'date|required',
            'tempat_meninggal' => 'required|string',
            'tanggal_meninggal' => 'date|required',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_waris', 'public');

        Suratahliwaris::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_waris' => $this->nama_waris,
            'nik_waris' => $this->nik_waris,
            'tempat_lahir_waris' => $this->tempat_lahir_waris,
            'tanggal_lahir_waris' => $this->tanggal_lahir_waris,
            'jenis_kelamin_waris' => $this->jenis_kelamin_waris,
            'pekerjaan_waris' => $this->pekerjaan_waris,
            'kewarganegaraan_waris' => $this->kewarganegaraan_waris,
            'alamat_waris' => $this->alamat_waris,
            'agama_waris' => $this->agama_waris,
            'tempat_meninggal' => $this->tempat_meninggal,
            'tanggal_meninggal' => $this->tanggal_meninggal,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratahliwaris([
                'nama' => $this->nama_lengkap,
                'nik' => $this->nik,
                'nama_waris' => $this->nama_waris,
                'nik_waris' => $this->nik_waris,
                'jenis_kelamin' => $this->jenis_kelamin,
                'alamat_waris' => $this->alamat_waris,
                'alamat' => $this->alamat,
                ])
            );
        }
        $admins = User::all();

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->send
                (new Notifikasiadmin([
                    'nama_lengkap' => $this->nama_lengkap,
                    'nama_surat' => 'Surat Keterangan Ahli Waris',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = Suratahliwaris::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-ahli-waris');
    }
}
