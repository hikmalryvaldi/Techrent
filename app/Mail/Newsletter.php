<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $product_name;
    public $discount_value;
    public $images;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $message, $product_name = null, $discount_value = null, $images = null)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->product_name = $product_name;
        $this->discount_value = $discount_value;
        $this->images = $images;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.newsletter',
            with: [
                'subject' => $this->subject, 
                'message' => $this->message,
                'product_name' => $this->product_name,
                'discount_value' => $this->discount_value,
                'images' => $this->images,
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
