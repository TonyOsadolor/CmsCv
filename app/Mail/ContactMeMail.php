<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    protected $sender;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->subject = $data['subject'] ?? 'A New Mail from Contact Me';
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mine.app_email'), config('mine.company_name')),
            replyTo: [
                new Address($this->data['sender'], $this->data['names'])
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-me',
            with: [
                'receiver' => $this->data['receiver'],
                'data' => $this->data
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
