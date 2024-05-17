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

class AcceptNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $producto;
    public $oppositeUser;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Producto $producto, User $oppositeUser)
    {
        $this->user = $user;
        $this->producto = $producto;
        $this->oppositeUser = $oppositeUser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Intercambio',
        );
    }

    public function build()
    {
        return $this->markdown('mail.accept-notification')
                    ->subject('Confirmación de Intercambio');
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.accept-notification',
            with: [
                'user' => $this->user,
                'producto' => $this->producto,
                'oppositeUser' => $this->oppositeUser,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
