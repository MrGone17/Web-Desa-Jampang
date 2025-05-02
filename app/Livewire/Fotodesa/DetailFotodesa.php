<?php

namespace App\Livewire\Fotodesa;

use App\Models\Album;
use Livewire\Component;

class DetailFotodesa extends Component
{
    public $album;

    public function mount($slug)
    {
        $this->album = Album::with('photos')->where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.fotodesa.detail-fotodesa');
    }
}

