<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class Videodesa extends Component
{
    public $video;
    public function loadberita () {
        $this->video = Video::where('is_active', true)
        ->get();
    }
    public function mount(){
        $this->loadberita();
    }
    public function render()
    {
        return view('livewire.videodesa');
    }
}
