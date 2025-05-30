<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratPenghasilanOrtu;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKetPenghasilanOrtu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratPenghasilanOrtu extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $status_kawin, $nama_lengkap, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $pekerjaan, $alamat, $penghasilan, $keperluan, $nama_lengkap_anak, $nik_anak, $tempat_lahir_anak, $tgl_lahir_anak, $jenis_kelamin_anak;
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
            'status_kawin' => 'required|string',
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|size:16',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'penghasilan' => 'required|string',
            'keperluan' => 'required|string',
            'nama_lengkap_anak' => 'required|string',
            'nik_anak' => 'required|string|size:16',
            'tempat_lahir_anak' => 'required|string',
            'tgl_lahir_anak' => 'required|date',
            'jenis_kelamin_anak' => 'required|in:L,P',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_penghasilan_ortu', 'public');

        SuratKetPenghasilanOrtu::create([
            'warga_id' => Auth::guard('warga')->id(),
            'status_kawin' => $this->status_kawin,
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'penghasilan' => $this->penghasilan,
            'keperluan' => $this->keperluan,
            'nama_lengkap_anak' => $this->nama_lengkap_anak,
            'nik_anak' => $this->nik_anak,
            'tempat_lahir_anak' => $this->tempat_lahir_anak,
            'tgl_lahir_anak' => $this->tgl_lahir_anak,
            'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratPenghasilanOrtu([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'status_kawin' => $this->status_kawin,
                    'alamat' => $this->alamat,
                    'nama_lengkap_anak' => $this->nama_lengkap_anak,
                    'nik_anak' => $this->nik_anak,    
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
                    'nama_surat' => 'Surat Keterangan Penghasilan Orang Tua',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKetPenghasilanOrtu::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-penghasilan-ortu');
    }
}
