<?php

namespace App\Livewire\Formlayanan\Suratkependudukan;

use App\Mail\KonfirmasiSuratPindahPenduduk;
use App\Mail\Notifikasiadmin;
use App\Models\Suratpindahpenduduk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LayananSuratPindahPenduduk extends Component
{
    use WithFileUploads;
    public $suratlist;
    public $nama_lengkap,$kewarganegaraan, $pekerjaan, $agama, $jenis_kelamin, $nik, $tgl_lahir,$tempat_lahir, $alamat, $pengantar_pdf;
    public $pendidikan, $status_hubungan,$jumlah_keluarga, $alasan_pindah, $no_kk, $kepala_kk;
    public bool $showSuccessModal = false;
    public $anggota = [
        ['nama' => '', 'nik' => '', 'jenis_kelamin' => '', 'shdk' => '']
    ];
    public function tambahAnggota()
    {
        $this->anggota[] = [
            'nama' => '',
            'nik' => '',
            'jenis_kelamin' => '',
            'shdk' => '',
        ];
    }

    public function hapusAnggota($index)
    {
        unset($this->anggota[$index]);
        $this->anggota = array_values($this->anggota); // supaya index rapih
    }

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
            'pendidikan' => 'required|string',
            'status_hubungan' => 'required|string',
            'alasan_pindah' => 'required|string',
            'jumlah_keluarga' => 'required|numeric|integer',
            'no_kk' => 'required|numeric|digits:16|string',
            'kepala_kk' => 'required|string',
            'pengantar_pdf' => 'required|file|mimes:pdf|max:2048',
            'anggota' => 'required|array|min:1',
            'anggota.*.nama' => 'required|string',
            'anggota.*.nik' => 'required|digits:16',
            'anggota.*.jenis_kelamin' => 'required|string',
            'anggota.*.shdk' => 'required|string',
        ]);

        $pdfPathpengantar = $this->pengantar_pdf->store('bukti_pengantar_suratdomisili', 'public');

        $surat = Suratpindahpenduduk::create([
            'warga_id' => Auth::guard('warga')->id(),
            'pendidikan' => $this->pendidikan,
            'status_hubungan' => $this->status_hubungan,
            'alasan_pindah' => $this->alasan_pindah,
            'no_kk' => $this->no_kk,
            'kepala_kk' => $this->kepala_kk,
            'jumlah_keluarga' => $this->jumlah_keluarga,
            'pengantar_pdf' => $pdfPathpengantar,
            'status' => 'diproses',
        ]);
        foreach ($this->anggota as $item) {
            $surat->anggotaKeluarga()->create([
                'nik' => $item['nik'],
                'nama' => $item['nama'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'shdk' => $item['shdk'],
            ]);
        }
        $user = Auth::guard('warga')->user();
        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratPindahPenduduk([
                'nama' => $user->name,
                'nik' => $user->nik,
                'alamat' => $user->profil->alamat ?? '-',
                'jenis_kelamin' => $user->profil->jenis_kelamin ?? '-',
                'no_kk' => $this->no_kk,
                'kepala_kk' => $this->kepala_kk,
                'alasan_pindah' => $this->alasan_pindah,
                'jumlah_keluarga' => $this->jumlah_keluarga,
                'tanggal_pengajuan' => now()->format('d-m-Y H:i'),
                'status' => 'diproses',
                'anggota' => $this->anggota,
                ])
            );
        }
        
        $admins = User::all();

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->send
                (new Notifikasiadmin([
                    'nama_lengkap' => $this->nama_lengkap,
                    'nama_surat' => 'Surat Keterangan Pindah Penduduk',
                    ])
                );
            }
        }
        $this->showSuccessModal = true;
    }
    public function loadsurat(){
        $this->suratlist = Suratpindahpenduduk::where('warga_id', Auth::guard('warga')->id())->latest()->get()?? collect([]);
    }
    public function mount (){
        $this->loadsurat();
        $this->permision();
        $this->loaddata();
    }
    public function render()
    {
        return view('livewire.formlayanan.suratkependudukan.layanan-surat-pindah-penduduk');
    }
}
