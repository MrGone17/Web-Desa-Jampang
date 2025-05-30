<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratBuataktalahir;
use App\Mail\Notifikasiadmin;
use App\Models\Suratbuataktalahir;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratbuataktalahir extends Component
{
    use WithFileUploads;
    public $warga_id,$nama_pembuat;
    public $nama_anak,$waktu_lahir_anak, $anak_ke, $tgl_lahir_anak, $jenis_kelamin_anak, $kewarganegaraan_anak;
    public $nama_ibu, $tempat_lahir_ibu, $nik_ibu, $agama_ibu, $pekerjaan_ibu, $tgl_lahir_ibu, $jenis_kelamin_ibu, $kewarganegaraan_ibu;
    public $nama_ayah, $nik_ayah, $agama_ayah, $pekerjaan_ayah, $tempat_lahir_ayah, $tgl_lahir_ayah, $jenis_kelamin_ayah, $kewarganegaraan_ayah;
    public $alamat_keluarga;
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
            'waktu_lahir_anak' => 'required|date_format:H:i',
            'anak_ke' => 'required|integer|min:1',
            'tgl_lahir_anak' => 'required|date',
            'jenis_kelamin_anak' => 'required|in:L,P',
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:255',
            'agama_ibu' => 'required|string|max:255',
            'tgl_lahir_ibu' => 'required|date',
            'jenis_kelamin_ibu' => 'required|in:L,P',
            'kewarganegaraan_ibu' => 'required|in:WNI,WNA',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:255',
            'agama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'required|date',
            'jenis_kelamin_ayah' => 'required|in:L,P',
            'kewarganegaraan_ayah' => 'required|in:WNI,WNA',
            'alamat_keluarga' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048'
        ]);
        $user = Auth::guard('warga')->user();

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_buat_aktalahir', 'public');

        Suratbuataktalahir::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_anak' => $this->nama_anak,
            'anak_ke' => $this->anak_ke,
            'waktu_lahir_anak' => $this->waktu_lahir_anak,
            'tgl_lahir_anak' => $this->tgl_lahir_anak,
            'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
            'nama_ibu' => $this->nama_ibu,
            'tempat_lahir_ibu' => $this->tempat_lahir_ibu,
            'nik_ibu' => $this->nik_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'agama_ibu' => $this->pekerjaan_ibu,
            'tgl_lahir_ibu' => $this->tgl_lahir_ibu,
            'jenis_kelamin_ibu' => $this->jenis_kelamin_ibu,
            'kewarganegaraan_ibu' => $this->kewarganegaraan_ibu,
            'nama_ayah' => $this->nama_ayah,
            'nik_ayah' => $this->nik_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'agama_ayah' => $this->agama_ayah,
            'tempat_lahir_ayah' => $this->tempat_lahir_ayah,
            'tgl_lahir_ayah' => $this->tgl_lahir_ayah,
            'jenis_kelamin_ayah' => $this->jenis_kelamin_ayah,
            'kewarganegaraan_ayah' => $this->kewarganegaraan_ayah,
            'alamat_keluarga' => $this->alamat_keluarga,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratBuataktalahir([
                    'nama' => $this->nama_pembuat,
                    'nama_anak' => $this->nama_anak,
                    'jenis_kelamin_anak' => $this->jenis_kelamin_anak,
                    'tgl_lahir_anak' => $this->tgl_lahir_anak,
                    'waktu_lahir_anak' => $this->waktu_lahir_anak,
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
                    'nama_surat' => 'Surat Keterangan Pembuatan Akta Kelahiran',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = Suratbuataktalahir::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-suratbuataktalahir');
    }
}
