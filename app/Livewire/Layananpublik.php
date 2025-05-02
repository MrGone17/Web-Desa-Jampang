<?php

namespace App\Livewire;

use App\Models\Layananpublik as ModelsLayananpublik;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Layananpublik extends Component
{
    use WithFileUploads;

    public $nama, $nomor_wa, $alamat, $tanggal_kejadian, $keterangan, $bukti_foto;
    public $formKey;

    public function mount()
    {
        $this->formKey = now()->timestamp;
    }
    protected $rules = [
        'nama' => 'required|string|max:100',
        'nomor_wa' => 'required|string|max:20',
        'alamat' => 'required|string|max:100',
        'tanggal_kejadian' => 'required|date',
        'keterangan' => 'required|string|max:1000',
        'bukti_foto' => 'required|image|max:2048', // max 2MB
    ];
    public function formreset(){
        $this->nama = null;
        $this->nomor_wa = null;
        $this->alamat = null;
        $this->tanggal_kejadian = null;
        $this->keterangan = null;
        $this->bukti_foto = null;

        $this->formKey = now()->timestamp;
    }
    public function submit()
    {
        $this->validate();

        $path = $this->bukti_foto->store('uploads/layananpublik', 'public');

        ModelsLayananpublik::create([
            'id' => Str::uuid(),
            'nama' => $this->nama,
            'nomor_wa' => $this->nomor_wa,
            'alamat' => $this->alamat,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'keterangan' => $this->keterangan,
            'bukti_foto' => $path,
        ]);

        $this->formreset();

        session()->flash('message', 'Laporan berhasil dikirim.');
    }
    public function render()
    {
        return view('livewire.layananpublik');
    }
}
