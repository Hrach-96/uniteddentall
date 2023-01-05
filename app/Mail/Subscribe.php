<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this
            ->from(\Request::input('email'))
            ->to(env('MAIL_FROM_ADDRESS') ? env('MAIL_FROM_ADDRESS') : env('DEVELOPER_MAIL'))
            ->subject('New Subscribe from '.\Request::input('email'))
            ->markdown('emails.subscribe', ['email' => \Request::input('email')]);
    }
}
