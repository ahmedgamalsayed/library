<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    /**
     * Create a new message instance.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->html(
                'From Name: ' . $this->request['name'] . '<br>' .
                'From Email: ' . $this->request['email'] . '<br>' .
                'From Subject: ' . $this->request['subject'] . '<br>' .
                'From Message: ' . $this->request['message'] . '<br>'

            );
    }
}
