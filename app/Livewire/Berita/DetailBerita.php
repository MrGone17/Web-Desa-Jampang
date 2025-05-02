<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;

class DetailBerita extends Component
{
    public $slug;
    public $berita;
    public $beritaLain;


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->berita = Berita::where('slug', $slug)->firstOrFail();
        $this->beritaLain = Berita::where('id', '!=', $this->berita->id)
            ->where('is_active', 1)
            ->latest()
            ->take(5)
            ->get();
    }
    public function render()
    {
        return view('livewire.berita.detail-berita',[
            'berita' => $this->berita,
        ]);
    }
}
