<?php

namespace App\Livewire;

use App\Models\Album;
use Livewire\Component;

class Fotodesa extends Component
{
    public $albums;

    public function mount()
    {
        $this->albums = Album::withCount('photos')->get();
    }

    public function render()
    {
        return view('livewire.fotodesa', [
            'albums' => $this->albums
        ]);
    }
}
