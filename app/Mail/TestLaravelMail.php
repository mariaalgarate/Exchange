<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;
use App\Models\User;

class TestLaravelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $destinatario;
    public $producto;

    public function __construct(User $destinatario, Producto $producto)
    {
        $this->destinatario = $destinatario;
        $this->producto = $producto;
    }

    public function build()
    {
        return $this->markdown('mail.test-email')
                    ->subject('Alguien está interesado en tu producto');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alguien está interesado en tu producto',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.test-email',
            with: [
                'destinatario' => $this->destinatario,
                'producto' => $this->producto,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
