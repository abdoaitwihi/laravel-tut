<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $data ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'abdoaitwihi@gmail.com';
        $subject = 'new item added';
        $name = 'my application';

        return $this->view('emails.simple-email')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'data' => $this->data ]);
    }
}
