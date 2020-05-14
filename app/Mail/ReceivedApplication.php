<?php

namespace App\Mail;

use App\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceivedApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $functie;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->name = $app->user->name;
        $this->functie = $app->functie;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.receivedapplication');
    }
}
