<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Contact $contact */
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->contact->email)
            ->to(env('MAIL_FROM_ADDRESS'))
            ->view('emails.contact', ['contact' => $this->contact]);
    }
}
