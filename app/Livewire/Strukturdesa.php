<?php

namespace App\Livewire;

use App\Models\Divisidesa;
use Livewire\Component;

class Strukturdesa extends Component
{
    public $divisi;
    public function loaddivisi () {
        $this->divisi = Divisidesa::with('aparatur')
        ->where('is_active', true)
        ->get();
    }
    public function mount(){
        $this->loaddivisi();
    }

    public function render()
    {
        return view('livewire.strukturdesa');
    }
}
