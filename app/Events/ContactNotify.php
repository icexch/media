<?php namespace App\Events;

use App\Models\Contact;
use Illuminate\Queue\SerializesModels;

class ContactNotify
{
    use SerializesModels;

    /** @var Contact */
    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}
