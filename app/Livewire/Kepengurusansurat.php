<?php

namespace App\Livewire;

use App\Models\Pendahuluansurat;
use App\Models\Pengajuansurat;
use Livewire\Component;

class Kepengurusansurat extends Component
{
    public $pendahuluan;
    public $pengajuan;
    public function loadpendahuluan(){
        $this->pendahuluan = Pendahuluansurat::where('is_active', true)->get();
    }
    public function loadpengajuan(){
        $this->pengajuan = Pengajuansurat::where('is_active', true)->get();
    }
    public function mount(){
        $this->loadpendahuluan();
        $this->loadpengajuan();
    }
    public function render()
    {
        return view('livewire.kepengurusansurat');
    }
}
