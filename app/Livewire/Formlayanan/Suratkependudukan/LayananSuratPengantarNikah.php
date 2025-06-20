<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratPengantarNikah;
use App\Mail\Notifikasiadmin;
use App\Models\SuratPengantarNikah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratPengantarNikah extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;
    public $nama_lengkap,$kewarganegaraan, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $pekerjaan, $alamat, $agama;
    public $nama_lengkap_ayah, $nik_ayah, $tempat_lahir_ayah, $tgl_lahir_ayah, $alamat_ayah,$pekerjaan_ayah, $kewarganegaraan_ayah, $agama_ayah;
    public $nama_lengkap_ibu, $nik_ibu, $tempat_lahir_ibu, $tgl_lahir_ibu, $alamat_ibu,$pekerjaan_ibu, $kewarganegaraan_ibu, $agama_ibu;
    public $nama_lengkap_pasangan, $nik_pasangan, $tempat_lahir_pasangan, $tgl_lahir_pasangan, $alamat_pasangan,$pekerjaan_pasangan, $kewarganegaraan_pasangan, $agama_pasangan;
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
            'nama_lengkap_pasangan' => 'required|string|max:255',
            'nik_pasangan' => 'required|digits:16|numeric',
            'tempat_lahir_pasangan' => 'required|string|max:255',
            'tgl_lahir_pasangan' => 'required|date',
            'alamat_pasangan' => 'required|string',
            'agama_pasangan' => 'required|string|max:255',
            'pekerjaan_pasangan' => 'required|string|max:255',
            'kewarganegaraan_pasangan' => 'required|in:WNI,WNA',
            'nama_lengkap_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16|numeric',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'required|date',
            'alamat_ayah' => 'required|string',
            'agama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'kewarganegaraan_ayah' => 'required|in:WNI,WNA',
            'nama_lengkap_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16|numeric',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tgl_lahir_ibu' => 'required|date',
            'alamat_ibu' => 'required|string',
            'agama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'kewarganegaraan_ibu' => 'required|in:WNI,WNA',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_Menikah', 'public');

        SuratPengantarNikah::create([
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
            'nama_lengkap_pasangan' => $this->nama_lengkap_pasangan,
            'nik_pasangan' => $this->nik_pasangan,
            'tempat_lahir_pasangan' => $this->tempat_lahir_pasangan,
            'tgl_lahir_pasangan' => $this->tgl_lahir_pasangan,
            'agama_pasangan' => $this->agama_pasangan,
            'pekerjaan_pasangan' => $this->pekerjaan_pasangan,
            'kewarganegaraan_pasangan' => $this->kewarganegaraan_pasangan,
            'alamat_pasangan' => $this->alamat_pasangan,
            'nama_lengkap_ayah' => $this->nama_lengkap_ayah,
            'nik_ayah' => $this->nik_ayah,
            'tempat_lahir_ayah' => $this->tempat_lahir_ayah,
            'tgl_lahir_ayah' => $this->tgl_lahir_ayah,
            'agama_ayah' => $this->agama_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'kewarganegaraan_ayah' => $this->kewarganegaraan_ayah,
            'alamat_ayah' => $this->alamat_ayah,
            'nama_lengkap_ibu' => $this->nama_lengkap_ibu,
            'nik_ibu' => $this->nik_ibu,
            'tempat_lahir_ibu' => $this->tempat_lahir_ibu,
            'tgl_lahir_ibu' => $this->tgl_lahir_ibu,
            'agama_ibu' => $this->agama_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'kewarganegaraan_ibu' => $this->kewarganegaraan_ibu,
            'alamat_ibu' => $this->alamat_ibu,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratPengantarNikah([
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
                    'nama_surat' => 'Surat Keterangan Pengantar Nikah',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratPengantarNikah::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-pengantar-nikah');
    }
}
