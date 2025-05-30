<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratKetPernahMenikah;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKetPernahMenikah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKetPernahMenikah extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap,$kewarganegaraan, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $pekerjaan, $alamat, $agama;
    public $nama_lengkap_pria, $nik_pria, $tempat_lahir_pria,$jenis_kelamin_pria, $tgl_lahir_pria, $alamat_pria,$pekerjaan_pria, $kewarganegaraan_pria, $agama_pria;
    public $nama_lengkap_perempuan, $nik_perempuan, $tempat_lahir_perempuan,$jenis_kelamin_perempuan, $tgl_lahir_perempuan, $alamat_perempuan,$pekerjaan_perempuan, $kewarganegaraan_perempuan, $agama_perempuan;
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
            'alamat' => 'required|string',
            'nama_lengkap_pria' => 'required|string|max:255',
            'nik_pria' => 'required|digits:16|numeric',
            'tempat_lahir_pria' => 'required|string|max:255',
            'tgl_lahir_pria' => 'required|date',
            'jenis_kelamin_pria' => 'required|in:L,P',
            'alamat_pria' => 'required|string',
            'agama_pria' => 'required|string|max:255',
            'pekerjaan_pria' => 'required|string|max:255',
            'nama_lengkap_perempuan' => 'required|string|max:255',
            'nik_perempuan' => 'required|digits:16|numeric',
            'tempat_lahir_perempuan' => 'required|string|max:255',
            'tgl_lahir_perempuan' => 'required|date',
            'jenis_kelamin_perempuan' => 'required|in:L,P',
            'alamat_perempuan' => 'required|string',
            'agama_perempuan' => 'required|string|max:255',
            'pekerjaan_perempuan' => 'required|string|max:255',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_Menikah', 'public');

        SuratKetPernahMenikah::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'nama_lengkap_pria' => $this->nama_lengkap_pria,
            'nik_pria' => $this->nik_pria,
            'tempat_lahir_pria' => $this->tempat_lahir_pria,
            'tgl_lahir_pria' => $this->tgl_lahir_pria,
            'jenis_kelamin_pria' => $this->jenis_kelamin_pria,
            'agama_pria' => $this->agama_pria,
            'pekerjaan_pria' => $this->pekerjaan_pria,
            'alamat_pria' => $this->alamat_pria,
            'nama_lengkap_perempuan' => $this->nama_lengkap_perempuan,
            'nik_perempuan' => $this->nik_perempuan,
            'tempat_lahir_perempuan' => $this->tempat_lahir_perempuan,
            'tgl_lahir_perempuan' => $this->tgl_lahir_perempuan,
            'jenis_kelamin_perempuan' => $this->jenis_kelamin_perempuan,
            'agama_perempuan' => $this->agama_perempuan,
            'pekerjaan_perempuan' => $this->pekerjaan_perempuan,
            'alamat_perempuan' => $this->alamat_perempuan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratKetPernahMenikah([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
                    'nama_lengkap_pria' => $this->nama_lengkap_pria,
                    'nik_pria' => $this->nik_pria,
                    'alamat_pria' => $this->alamat_pria,
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
                    'nama_surat' => 'Surat Keterangan Pernah Menikah',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKetPernahMenikah::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-ket-pernah-menikah');
    }
}
