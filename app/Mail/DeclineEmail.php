<?php

namespace App\Mail;

use App\Models\DeclinedSpeaker;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeclineEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var DeclinedSpeaker
     */
    public $speaker;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DeclinedSpeaker $speaker)
    {
        $this->speaker = $speaker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.decline-email');
    }
}
