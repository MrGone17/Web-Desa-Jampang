<?php

namespace App\Livewire;

use App\Models\Infobansos;
use App\Models\Kriteriabansos;
use Livewire\Component;

class Bansos extends Component
{
    public $infobansos;
    public $kriteriabansos;
    public function loadinfobansos(){
        $this->infobansos = Infobansos::where('is_active', true)->get();
    }
    public function loadkriteriabansos(){
        $this->kriteriabansos = Kriteriabansos::where('is_active', true)->get();
    }

    public function mount () {
        $this->loadinfobansos();
        $this->loadkriteriabansos();
    }
    public function render()
    {
        return view('livewire.bansos');
    }
}
