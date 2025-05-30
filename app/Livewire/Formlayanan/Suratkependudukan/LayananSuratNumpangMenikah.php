<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratNumpangMenikah;
use App\Mail\Notifikasiadmin;
use App\Models\SuratNumpangNikah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratNumpangMenikah extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap,$kewarganegaraan, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $pekerjaan, $alamat, $status_hubungan, $agama;

    public $nama_lengkap_pasangan, $nik_pasangan, $tempat_lahir_pasangan, $tgl_lahir_pasangan, $alamat_pasangan;
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
            'status_hubungan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'alamat' => 'required|string',
            'nama_lengkap_pasangan' => 'required|string|max:255',
            'nik_pasangan' => 'required|digits:16|numeric',
            'tempat_lahir_pasangan' => 'required|string|max:255',
            'tgl_lahir_pasangan' => 'required|date',
            'alamat_pasangan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_aktalahir', 'public');

        SuratNumpangNikah::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'status_hubungan' => $this->status_hubungan,
            'pekerjaan' => $this->pekerjaan,
            'kewarganegaraan' => $this->kewarganegaraan,
            'alamat' => $this->alamat,
            'nama_lengkap_pasangan' => $this->nama_lengkap_pasangan,
            'nik_pasangan' => $this->nik_pasangan,
            'tempat_lahir_pasangan' => $this->tempat_lahir_pasangan,
            'tgl_lahir_pasangan' => $this->tgl_lahir_pasangan,
            'alamat_pasangan' => $this->alamat_pasangan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratNumpangMenikah([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
                    'nama_lengkap_pasangan' => $this->nama_lengkap_pasangan,
                    'nik_pasangan' => $this->nik_pasangan,
                    'alamat_pasangan' => $this->alamat_pasangan,
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
                    'nama_surat' => 'Surat Keterangan Numpang Menikah',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratNumpangNikah::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-numpang-menikah');
    }
}
