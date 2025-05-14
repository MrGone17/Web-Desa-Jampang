<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WargaLogin extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::guard('warga')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            session()->flash('success', 'Login berhasil!');
             $warga = Auth::guard('warga')->user();

        // Cek apakah sudah ada profil terkait
            if ($warga->profil) {
                return redirect()->route('Formlayanan');
            } else {
                return redirect()->route('Profil');
            }
        }

        session()->flash('error', 'Email atau password salah');
    }

    public function render()
    {
        return view('livewire.auth.warga-login');
    }
}
