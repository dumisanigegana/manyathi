<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;
class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**

     * @var string

     */

    public $message;

 

    /**

     * @var \App\Models\Subscriber

     */

    public $subscriber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber, string $message)
    {
        $this->subscriber = $subscriber;

        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Thank you for subscribing to our newsletter')
        ->markdown('emails.subscribers');
    }
}
