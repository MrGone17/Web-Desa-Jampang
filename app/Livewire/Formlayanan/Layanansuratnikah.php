<?php

namespace App\Livewire\Formlayanan;

use App\Models\Suratnikah;
use Livewire\Component;
use Livewire\WithFileUploads;

class Layanansuratnikah extends Component
{
    use WithFileUploads;

    public $nama_lengkap, $nik, $tgl_lahir, $alamat, $nama_pasangan, $tgl_nikah, $kk_foto, $kk_pdf;
    public $formKey;

    public function mount()
    {
        $this->formKey = now()->timestamp;
    }
    protected $rules = [
        'nama_lengkap' => 'required|string',
            'nik' => 'required|string',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nama_pasangan' => 'required|string',
            'tgl_nikah' => 'required|date',
            'kk_foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kk_pdf' => 'required|file|mimes:pdf|max:2048',
    ];
    public function formreset(){
        $this->nama_lengkap = null;
        $this->nik = null;
        $this->alamat = null;
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
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'nama_pasangan' => $this->nama_pasangan,
            'tgl_nikah' => $this->tgl_nikah,
            'kk_foto' => $path ,
            'kk_pdf' => $pdf ,
        ]);

        $this->formreset();

        session()->flash('message', 'Laporan berhasil dikirim.');      
    }

    public function render()
    {
        return view('livewire.formlayanan.layanansuratnikah');
    }
}
