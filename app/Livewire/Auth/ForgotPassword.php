<?php

namespace App\Livewire\Auth;

use App\Models\PasswordResetRequest;
use App\Models\Warga;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;
    public $nik;

    protected $rules = [
        'email' => 'required|email|exists:wargas,email',
        'nik' => 'required|digits:16|exists:wargas,nik',
    ];

    public function requestReset()
    {
        $this->validate();

        $warga = Warga::where('email', $this->email)
                ->where('nik', $this->nik)
                ->first();

        if (!$warga) {
            session()->flash('error', 'Email dan NIK tidak cocok.');
            return;
        }

        // Buat permintaan reset
        PasswordResetRequest::create([
            'warga_id' => $warga->id,
            'status' => 'menunggu',
        ]);

        // Kirim notifikasi ke admin (opsional: via email)
        Mail::to('mrunix32@gmail.com')->send(new \App\Mail\PasswordResetRequestNotification($warga));

        session()->flash('success', 'Permintaan reset password telah dikirim. Tunggu persetujuan admin.');
        $this->reset('email');
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
