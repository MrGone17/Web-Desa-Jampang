<?php

namespace App\Livewire\Auth;

use App\Models\Warga;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class WargaRegister extends Component
{
    public $name, $email, $password, $nik;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:wargas,email',
        'nik' => 'required|unique:wargas,nik',
        'password' => 'required|min:6',
    ];

    public function register()
    {
        $this->validate();

        Warga::create([
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registrasi berhasil!');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.auth.warga-register');
    }
}
