<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationApplyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $uname;
    public $accept = false;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uname, $accept = false)
    {
        $this->uname = $uname;
        $this->accept = $accept;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.welcome');
    }
}
