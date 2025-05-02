<?php

namespace App\Livewire\Potensidesa;

use App\Models\Pariwisata;
use Livewire\Component;

class DetailPariwisata extends Component
{
    public $slug;
    public $pariwisata;
    public $pariwisataLain;


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->pariwisata = Pariwisata::where('slug', $slug)->firstOrFail();
        $this->pariwisataLain = Pariwisata::where('id', '!=', $this->pariwisata->id)
            ->where('is_active', 1)
            ->latest()
            ->take(5)
            ->get();
    }
    public function render()
    {
        return view('livewire.potensidesa.detail-pariwisata', [
            'pariwisata' => $this->pariwisata,
        ]);
    }
}
