<?php

namespace App\Livewire;

use App\Models\Berita as ModelsBerita;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;


class Berita extends Component
{
    public $beritas;
    public function loadberita () {
        $this->beritas = ModelsBerita::where('is_active', true)
        ->orderBy('publish_date', 'desc')
        ->get();
    }
    public function mount(){
        $this->loadberita();
    }
    public function render()
    {
        return view('livewire.berita');
    }
}
