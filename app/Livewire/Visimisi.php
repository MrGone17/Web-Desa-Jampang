<?php

namespace App\Livewire;

use App\Models\Prinsip;
use App\Models\Tentangdesa;
use App\Models\Visimisi as ModelsVisimisi;
use Livewire\Component;

class Visimisi extends Component
{
    public $tentangdesa;
    public $visimisi;
    public $prinsip;
    public function loadtentangdesa(){
        $this->tentangdesa = Tentangdesa::where('is_active', true)->get();
    }
    public function loadvisimisi(){
        $this->visimisi = ModelsVisimisi::where('is_active', true)->get();
    }
    public function loadprinsip(){
        $this->prinsip = Prinsip::where('is_active', true)->get();
    }
    public function mount(){
        $this->loadtentangdesa();
        $this->loadvisimisi();
        $this->loadprinsip();
    }
    public function render()
    {
        return view('livewire.visimisi');
    }
}
