<?php

namespace App\Livewire;

use App\Models\Profil as ModelsProfil;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profil extends Component
{
    use WithFileUploads;

    public $nik, $alamat, $tempat_lahir, $tanggal_lahir,$nama,$pekerjaan,$kewarganegaraan,$agama;
    public $telepon, $jenis_kelamin, $foto,$foto_path;
    public bool $showSuccessModal = false;

    public function save()
    {
        $this->validate([
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'nullable|required',
            'pekerjaan' => 'nullable|required',
            'agama' => 'nullable|required',
            'jenis_kelamin' => 'required|in:L,P',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'foto' => 'nullable|image|max:2048',
        ]);

        $profil = ModelsProfil::firstOrNew(['warga_id' => Auth::guard('warga')->id()]);
        if ($this->foto) {
            $this->validate([
                'foto' => 'image|max:2048',
            ]);
            $fotoPath = $this->foto->store('foto-profil', 'public');
        } else {
            $fotoPath = $this->foto_path; // gunakan path lama
        }

            ModelsProfil::updateOrCreate(
            ['warga_id' => Auth::guard('warga')->id()],
            [
                'alamat' => $this->alamat,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal_lahir,
                'telepon' => $this->telepon,
                'jenis_kelamin' => $this->jenis_kelamin,
                'pekerjaan' => $this->pekerjaan,
                'kewarganegaraan' => $this->kewarganegaraan,
                'agama' => $this->agama,
                'foto' => $fotoPath,
            ]
        );

        $this->showSuccessModal = true;
    }
    public function loadnama(){
         $user = Auth::guard('warga')->user();
    
        if ($user) {
            $this->nama = $user->name;
            $this->nik = $user->nik;
        } else {
            $this->nama = 'Tidak ditemukan';
            $this->nik = 'Tidak ditemukan';
        }
    }
    public function mount (){
        $this->loadnama();
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
        $profil = ModelsProfil::where('warga_id', Auth::guard('warga')->id())->first();
        if ($profil) {
            $this->alamat = $profil->alamat;
            $this->tempat_lahir = $profil->tempat_lahir;
            $this->tanggal_lahir = $profil->tanggal_lahir;
            $this->telepon = $profil->telepon;
            $this->jenis_kelamin = $profil->jenis_kelamin;
            $this->kewarganegaraan = $profil->kewarganegaraan;
            $this->pekerjaan = $profil->pekerjaan;
            $this->agama = $profil->agama;
            $this->foto_path = $profil->foto; 
        }
    }
    public function render()
    {
        return view('livewire.profil');
    }
}
