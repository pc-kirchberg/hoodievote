<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    private $verifyToken;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verifyToken)
    {
        $this->verifyToken = $verifyToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('hoodievote@pupilscom-esl1.eu')
            ->view('emails.emailverify')
            ->with('verifyUrl', \Config::get('app.url') . '/confirmEmail?token='.$this->verifyToken);
    }
}
