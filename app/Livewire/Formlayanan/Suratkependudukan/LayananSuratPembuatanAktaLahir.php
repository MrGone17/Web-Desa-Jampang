<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratPembuatanAktaLahir;
use App\Mail\Notifikasiadmin;
use App\Models\SuratPembuatanAktaLahir;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class LayananSuratPembuatanAktaLahir extends Component
{
    use WithFileUploads;

    public $warga_id,$nama_pembuat;

    public $nama_anak,$nama_ortu, $tempat_lahir_ortu, $nik_ortu, $agama_ortu, $tgl_lahir_ortu, $pekerjaan_ortu, $usia_ortu, $alamat_ortu;
    public $pengantar_pdf;
    public $suratlist;
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
            'nama_anak' => 'required|string|max:255',
            'nama_ortu' => 'required|string|max:255',
            'tempat_lahir_ortu' => 'required|string|max:255',
            'nik_ortu' => 'required|digits:16',
            'agama_ortu' => 'required|string|max:50',
            'pekerjaan_ortu' => 'required|string|max:50',
            'tgl_lahir_ortu' => 'required|date',
            'alamat_ortu' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_Pembuatanaktalahir', 'public');

        SuratPembuatanAktaLahir::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_anak' => $this->nama_anak,
            'nama_ortu' => $this->nama_ortu,
            'tempat_lahir_ortu' => $this->tempat_lahir_ortu,
            'nik_ortu' => $this->nik_ortu,
            'agama_ortu' => $this->agama_ortu,
            'tgl_lahir_ortu' => $this->tgl_lahir_ortu,
            'usia_ortu' => Carbon::parse($this->tgl_lahir_ortu)->age,
            'pekerjaan_ortu' => $this->pekerjaan_ortu,
            'alamat_ortu' => $this->alamat_ortu,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratPembuatanAktaLahir([
                    'nama' => $this->nama_pembuat,
                    'nama_anak' => $this->nama_anak,
                    'nama_ortu' => $this->nama_ortu,
                    'tgl_lahir_ortu' => $this->tgl_lahir_ortu,
                    'usia_ortu' => Carbon::parse($this->tgl_lahir_ortu)->age,
                    'alamat_ortu' => $this->alamat_ortu,
                    'pengantar_pdf' => $pdfPathpengantar,
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
                    'nama_surat' => 'Surat Keterangan Pembuatan Akta Lahir',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratPembuatanAktaLahir::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-pembuatan-akta-lahir');
    }
}
