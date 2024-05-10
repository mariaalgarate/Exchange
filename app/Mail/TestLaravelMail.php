<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestLaravelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vendedor;
    public $interesado;
    public $producto;

    public function __construct($vendedor, $interesado, $producto)
    {
        $this->vendedor = $vendedor;
        $this->interesado = $interesado;
        $this->producto = $producto;
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
                'vendedor' => $this->vendedor,
                'interesado' => $this->interesado,
                'producto' => $this->producto,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
