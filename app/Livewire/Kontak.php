<?php

namespace App\Livewire;

use App\Models\Kontak as ModelsKontak;
use App\Models\Sosmed;
use Livewire\Component;

class Kontak extends Component
{
    public $kontakdesa;
    public $sosmed;
    public function loadkontakdesa () {
        $this->kontakdesa = ModelsKontak::where('is_active', true)->get();
    }
    public function loadsosmed () {
        $this->sosmed = Sosmed::where('is_active', true)->get();
    }

    public function mount(){
        $this->loadkontakdesa();
        $this->loadsosmed();
    }
    public function render()
    {
        return view('livewire.kontak');
    }
}
