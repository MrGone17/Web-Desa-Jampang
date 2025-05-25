<?php

namespace App\Livewire\Auth;

use App\Models\PasswordResetRequest;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'password' => 'required|min:8|confirmed',
    ];

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();

        $request = PasswordResetRequest::where('token', $this->token)
            ->where('status', 'disetujui')
            ->where('expires_at', '>', now())
            ->first();

        if (!$request) {
            session()->flash('error', 'Token tidak valid atau telah kadaluarsa.');
            return;
        }

        $warga = $request->warga;
        $warga->update(['password' => Hash::make($this->password)]);
        $request->update(['status' => 'selesai']);

        session()->flash('success', 'Password berhasil diubah. Silakan login.');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
