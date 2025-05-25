<?php

namespace App\Mail;

use App\Models\Warga;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $warga;

    public function __construct(Warga $warga)
    {
        $this->warga = $warga;
    }

    public function build()
    {
        return $this->subject('Permintaan Reset Password Baru')
                    ->view('emails.password_reset_request')
                    ->with(['warga' => $this->warga]);
    }
}
