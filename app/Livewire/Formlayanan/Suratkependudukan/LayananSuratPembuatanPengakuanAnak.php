<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratPengakuananak;
use App\Mail\Notifikasiadmin;
use App\Models\SuratPembuatanPengakuanAnak;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratPembuatanPengakuanAnak extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $warga_id,$nama_pembuat;

    public $nama_anak, $nik_anak, $tempat_lahir_anak, $tgl_lahir_anak, $jenis_kelamin_anak;
    public $nomor_akta_anak, $tgl_akta_anak;
    public $nama_ayah, $nik_ayah, $pekerjaan_ayah, $tempat_lahir_ayah, $tgl_lahir_ayah, $alamat_ayah;
    public $nama_ibu, $nik_ibu, $pekerjaan_ibu, $tempat_lahir_ibu, $tgl_lahir_ibu, $alamat_ibu;
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
            'nama_anak' => 'required|string|max:255',
            'nik_anak' => 'numeric|required|digits:16',
            'tempat_lahir_anak' => 'required|string|max:255',
            'tgl_lahir_anak' => 'required|date',
            'jenis_kelamin_anak' => 'required|in:L,P',
            'nomor_akta_anak' => 'required|string|max:255',
            'tgl_akta_anak' => 'required|date',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'numeric|required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'required|date',
            'alamat_ayah' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'numeric|required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tgl_lahir_ibu' => 'required|date',
            'alamat_ibu' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_kuasapengasuhananak', 'public');

        SuratPembuatanPengakuanAnak::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_anak' => $this->nama_anak,
            'nik_anak' => $this->nik_anak,
            'tempat_lahir_anak' => $this->tempat_lahir_anak,
            'tgl_lahir_anak' => $this->tgl_lahir_anak,
            'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
            'nomor_akta_anak' => $this->nomor_akta_anak,
            'tgl_akta_anak' => $this->tgl_akta_anak,
            'nama_ayah' => $this->nama_ayah,
            'nik_ayah' => $this->nik_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'tempat_lahir_ayah' => $this->tempat_lahir_ayah,
            'tgl_lahir_ayah' => $this->tgl_lahir_ayah,
            'alamat_ayah' => $this->alamat_ayah,
            'nama_ibu' => $this->nama_ibu,
            'nik_ibu' => $this->nik_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'tempat_lahir_ibu' => $this->tempat_lahir_ibu,
            'tgl_lahir_ibu' => $this->tgl_lahir_ibu,
            'alamat_ibu' => $this->alamat_ibu,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratPengakuananak([
                   'nama' => $this->nama_pembuat,
                    'nama_anak' => $this->nama_anak,
                    'nik_anak' => $this->nik_anak,
                    'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
                    'tgl_lahir_anak' => $this->tgl_lahir_anak,
                    'nik_ayah' => $this->nik_ayah,
                    'nik_ibu' => $this->nik_ibu,
                    'nama_ayah' => $this->nama_ayah,
                    'nama_ibu' => $this->nama_ibu,
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
                    'nama_surat' => 'Surat Keterangan Pengakuan Anak',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = SuratPembuatanPengakuanAnak::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-pembuatan-pengakuan-anak');
    }
}
