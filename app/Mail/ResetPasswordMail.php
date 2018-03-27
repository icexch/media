<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Notification
{
    use Queueable, SerializesModels;

    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /*public function build()
    {
        return $this->view('emails.reset-password', ['token' => $this->token]);
    }*/

    public function toMail($notifiable)
    {
        return (new MailMessage)->view('emails.reset-password', ['token' => $this->token]);
    }
}
