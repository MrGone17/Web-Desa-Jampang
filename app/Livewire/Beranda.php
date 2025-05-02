<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Rw;
use App\Models\Sambutan;
use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\Umkm;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class Beranda extends Component
{
    public $slider;
    public $sambutan;
    public $berita;
    public $umkm;
    public $datapenduduk;
    public $kontakdesa;
    public $sosmed;
    public $totalPenduduk = 0;
    public function loadslider(){
        $this->slider = Slider::all();
    }
    public function loadberita () {
        $this->berita = Berita::where('is_active', true)
        ->orderBy('publish_date', 'desc')
        ->get();
    }
    public function loaddatapenduduk(){
        $this->datapenduduk = Rw::with('rts')->where('is_active', true)->get();
        // Hitung total penduduk
        $this->totalPenduduk = $this->datapenduduk->flatMap(function ($rw) {
            return $rw->rts;
        })->sum('jumlah_penduduk');
    }
    public function loadumkm () {
        $this->umkm = Umkm::where('is_active', true)
        ->orderBy('publish_date', 'desc')
        ->get();
    }
    public function loadkontakdesa () {
        $this->kontakdesa = Kontak::where('is_active', true)->get();
    }
    public function loadsosmed () {
        $this->sosmed = Sosmed::where('is_active', true)->get();
    }
    public function loadsambutan(){
        $this->sambutan = Sambutan::all();
    }
    public function mount(){
        $this->loadslider();
        $this->loadsambutan();
        $this->loaddatapenduduk();
        $this->loadsosmed();
        $this->loadkontakdesa();
        $this->loadberita();
        $this->loadumkm();
    }
    public function render()
    {
        return view('livewire.beranda');
    }
}
