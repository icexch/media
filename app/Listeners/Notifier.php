<?php namespace App\Listeners;

use App\Events\ContactNotify;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class Notifier
{
    /**
     * @param ContactNotify $event
     */
    public function handle(ContactNotify $event)
    {
        $contact = $event->contact;

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contact));
    }
}
