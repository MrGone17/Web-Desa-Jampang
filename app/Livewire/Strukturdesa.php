<?php

namespace App\Livewire;

use App\Models\Divisidesa;
use App\Models\strukturpemdesa;
use Livewire\Component;

class Strukturdesa extends Component
{
    public $divisi;
    public $struktur;
    public function loaddivisi () {
        $this->divisi = Divisidesa::with('aparatur')
        ->where('is_active', true)
        ->get();
    }
    public function loadstruktur () {
        $this->struktur = strukturpemdesa::where('is_active', true)
        ->get();
    }
    public function mount(){
        $this->loaddivisi();
        $this->loadstruktur();
    }

    public function render()
    {
        return view('livewire.strukturdesa');
    }
}
