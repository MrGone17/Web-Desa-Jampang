<?php

namespace App\Livewire\Auth;

use App\Models\Warga;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class WargaRegister extends Component
{
    public $name, $email, $password, $nik;
    public $showConfirmation = false;
    protected $messages = [
    'name.required' => 'Nama wajib diisi.',
    'email.required' => 'Email wajib diisi.',
    'email.email' => 'Format email tidak valid.',
    'email.unique' => 'Email sudah digunakan.',
    'nik.required' => 'NIK wajib diisi.',
    'nik.digits' => 'NIK harus terdiri dari 16 angka.',
    'nik.unique' => 'NIK sudah terdaftar.',
    'password.required' => 'Kata sandi wajib diisi.',
    'password.min' => 'Kata sandi minimal 6 karakter.',
]   ;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:wargas,email',
        'nik' => 'required|numeric|digits:16|unique:wargas,nik',
        'password' => 'required|min:6',
    ];

    public function register()
    {
        $this->validate();
        $this->showConfirmation = true;
    }


    public function submitConfirmed()
    {
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
