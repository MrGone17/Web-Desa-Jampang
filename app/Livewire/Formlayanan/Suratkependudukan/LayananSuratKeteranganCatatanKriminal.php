<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratSKCK;
use App\Mail\Notifikasiadmin;
use App\Models\SuratKeteranganCatatanKriminal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratKeteranganCatatanKriminal extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap, $nik, $no_kk,$status_kawin, $kepala_kk,$keperluan, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama, $kewarganegaraan, $pekerjaan, $pendidikan, $alamat;
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
            'nik' => 'required|string|digits:16|numeric', 
            'no_kk' => 'required|string|digits:16|numeric',
            'kepala_kk' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:100',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:100',
            'status_kawin' => 'required|string|max:100',
            'alamat' => 'required|string',
            'keperluan' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_Menikah', 'public');

        SuratKeteranganCatatanKriminal::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'no_kk' => $this->no_kk,
            'kepala_kk' => $this->kepala_kk,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'kewarganegaraan' => $this->kewarganegaraan,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan' => $this->pendidikan,
            'status_kawin' => $this->status_kawin,
            'alamat' => $this->alamat,
            'keperluan' => $this->keperluan,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratSKCK([
                    'nama' => $this->nama_pembuat,
                    'nama_lengkap' => $this->nama_lengkap,
                    'nik' => $this->nik,
                    'alamat' => $this->alamat,
                    'keperluan' => $this->keperluan,
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
                    'nama_surat' => 'Surat Keterangan Catatan Kriminal',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratKeteranganCatatanKriminal::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-keterangan-catatan-kriminal');
    }
}
