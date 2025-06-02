<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\Warga;
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
        $warga = Warga::where('email', $this->email)->first();
        if (!$warga) {
            session()->flash('error', 'Email tidak ditemukan.');
            return;
        }
        if (!$warga->is_active) {
            session()->flash('error', 'Akun Anda tidak aktif. Silakan hubungi admin.');
            return;
        }
        if (Auth::guard('warga')->attempt([
            'email' => $this->email,
            'password' => $this->password,
            'is_active' => true, 
        ])) 
        {
            session()->flash('success', 'Login berhasil!');
            $warga = Auth::guard('warga')->user();

            if ($warga->profil) {
                return redirect()->route('Formlayanan');
            } else {
                return redirect()->route('Profil');
            }
        }

        session()->flash('error', 'Password salah.');
    }

    public function render()
    {
        return view('livewire.auth.warga-login');
    }
}