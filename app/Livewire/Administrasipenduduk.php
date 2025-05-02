<?php

namespace App\Livewire;

use App\Models\Layananadm;
use App\Models\Pendahuluanadministrasi;
use App\Models\Syaratketentuan;
use Livewire\Component;

class Administrasipenduduk extends Component
{
    public $pendahuluan;
    public $layanan;
    public $syarat;
    public function loadpendahuluan(){
        $this->pendahuluan = Pendahuluanadministrasi::where('is_active', true)->get();
    }
    public function loadlayanan(){
        $this->layanan = Layananadm::where('is_active', true)->get();
    }
    public function loadsyarat(){
        $this->syarat = Syaratketentuan::where('is_active', true)->get();
    }

    public function mount () {
        $this->loadpendahuluan();
        $this->loadlayanan();
        $this->loadsyarat();
    }
    public function render()
    {
        return view('livewire.administrasipenduduk');
    }
}
