<?php

namespace App\Livewire\Potensidesa;

use App\Models\Umkm;
use Livewire\Component;

class DetailUmkm extends Component
{
    public $slug;
    public $umkm;
    public $umkmLain;


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->umkm = Umkm::where('slug', $slug)->firstOrFail();
        $this->umkmLain = Umkm::where('id', '!=', $this->umkm->id)
            ->where('is_active', 1)
            ->latest()
            ->take(5)
            ->get();
    }
    public function render()
    {
        return view('livewire.potensidesa.detail-umkm',[
            'umkm' => $this->umkm,
        ]);
    }
}
