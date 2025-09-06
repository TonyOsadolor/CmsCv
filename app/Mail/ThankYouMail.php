<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Testimonial;

class ThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Testimonial $testimonial;

    /**
     * Create a new message instance.
     */
    public function __construct(Testimonial $testimonial)
    {
        $this->subject = 'Thank You So Much';
        $this->testimonial = $testimonial;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mine.app_email'), config('mine.company_name')),
            subject: $this->subject .' '. $this->testimonial->names .'!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.thank_you_mail',
            with: [
                'subject' => $this->subject,
                'name' => $this->testimonial->names,
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
