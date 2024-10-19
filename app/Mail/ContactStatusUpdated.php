<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $status;

    public function __construct($contact, $status)
    {
        $this->contact = $contact;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Your Contact Request Status Updated')
                    ->view('emails.contact_status_updated');
    }
}