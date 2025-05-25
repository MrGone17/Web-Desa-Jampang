<?php

namespace App\Mail;

use App\Models\Warga;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetLink extends Mailable
{
   use Queueable, SerializesModels;

    public $warga;
    public $token;

    public function __construct(Warga $warga, string $token)
    {
        $this->warga = $warga;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Link Reset Password')
                    ->view('emails.password_reset_link')
                    ->with(['warga' => $this->warga, 'token' => $this->token]);
    }
}
