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
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:wargas,email',
        'nik' => 'required|numeric|digits:16|unique:wargas,nik',
        'password' => 'required|min:6',
    ];

    public function register()
    {
        $this->validate();

        // Debugging: Cek apakah input kosong
        if (empty(trim($this->name)) || empty(trim($this->email)) || empty(trim($this->nik)) || empty(trim($this->password))) {
            session()->flash('error', 'Semua kolom wajib diisi!');
            return;
        }

        $this->showConfirmation = true;
    }

    public function submitConfirmed()
    {
        // Validasi ulang
        $this->validate();

        // Pastikan name tidak kosong
        if (empty(trim($this->name))) {
            session()->flash('error', 'Nama tidak boleh kosong!');
            $this->showConfirmation = false;
            return;
        }

        Warga::create([
            'name' => trim($this->name),
            'email' => trim($this->email),
            'nik' => trim($this->nik),
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registrasi berhasil! Silahkan Login Menggunakan Akun Yang Baru Saja Di Daftarkan!');
        return redirect()->route('login'); 
    }

    public function render()
    {
        return view('livewire.auth.warga-register');
    }
}