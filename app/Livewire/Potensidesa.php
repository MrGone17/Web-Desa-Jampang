<?php

namespace App\Livewire;

use App\Models\Pariwisata;
use App\Models\Umkm;
use Livewire\Component;

class Potensidesa extends Component
{
    public $umkm;
    public $pariwisata;
    public function loadumkm () {
        $this->umkm = Umkm::all();
    }
    public function loadpariwisata () {
        $this->pariwisata = Pariwisata::all();
    }
    public function mount(){
        $this->loadumkm();
        $this->loadpariwisata();
    }
    public function render()
    {
        return view('livewire.potensidesa');
    }
}
