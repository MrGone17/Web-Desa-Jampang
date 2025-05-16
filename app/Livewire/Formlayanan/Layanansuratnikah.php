<?php

namespace App\Livewire\Formlayanan;

use App\Mail\KonfirmasiSuratNikahMail;
use App\Models\Suratnikah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Layanansuratnikah extends Component
{
    use WithFileUploads;

    public $nama_lengkap, $nik, $tgl_lahir, $alamat, $nama_pasangan, $tgl_nikah, $kk_foto, $kk_pdf;
    public $formKey;
    public $suratNikahList = [];
    public function loaddata(){
         $user = Auth::guard('warga')->user();
    
        if ($user) {
            $this->nama_lengkap = $user->name;
            $this->nik = $user->nik;
            $this->tgl_lahir = optional($user->profil)->tanggal_lahir ?? 'Belum diisi';
            $this->alamat = optional($user->profil)->alamat ?? 'Belum diisi';
        } else {
            $this->nama_lengkap = 'Tidak ditemukan';
            $this->nik = 'Tidak ditemukan';
            $this->tgl_lahir = 'Tidak ditemukan';
            $this->alamat = 'Tidak ditemukan';
        }
    }
    public function loadsuratnikah(){
        $this->suratNikahList = Suratnikah::where('warga_id', Auth::guard('warga')->id())->latest()->get();
    }
    protected $rules = [
        'nama_pasangan' => 'required|string',
        'tgl_nikah' => 'required|date',
        'kk_foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'kk_pdf' => 'required|file|mimes:pdf|max:2048',
    ];
    public function formreset(){
        $this->nama_pasangan = null;
        $this->tgl_lahir = null;
        $this->tgl_nikah = null;
        $this->kk_foto = null;
        $this->kk_pdf = null;
        
        $this->formKey = now()->timestamp;
    }
    public function submit()
    {
        $this->validate();

        $path = $this->kk_foto->store('uploads/kk_foto', 'public');
        $pdf = $this->kk_pdf->store('uploads/kk_pdf', 'public');

        Suratnikah::create([
            'warga_id' => Auth::guard('warga')->id(),
            'nama_pasangan' => $this->nama_pasangan,
            'tgl_nikah' => $this->tgl_nikah,
            'kk_foto' => $path ,
            'kk_pdf' => $pdf,
            'status' => 'diproses',
        ]);
        $user = auth()->guard('warga')->user();

        if ($user?->email) {
            Mail::to($user->email)->send(
                new KonfirmasiSuratNikahMail([
                    'nama' => $user->name,
                    'nik' => $user->nik,
                    'pasangan' => $this->nama_pasangan,
                    'tanggal' => $this->tgl_nikah,
                ])
            );
        }


        $this->formreset();

        session()->flash('message', 'Laporan berhasil dikirim.');      
    }
    public function mount()
    {
        $this->loaddata();
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
        $this->formKey = now()->timestamp;
        $this->loadsuratnikah();
    }

    public function render()
    {
        return view('livewire.formlayanan.layanansuratnikah');
    }
}
