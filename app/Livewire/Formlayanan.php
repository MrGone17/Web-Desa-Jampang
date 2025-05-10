<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Formlayanan extends Component
{
    public function mount()
    {
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('login'); // Jika belum login, redirect ke login
        }
    }
    public function render()
    {
        return view('livewire.formlayanan');
    }
}
