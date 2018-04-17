<?php

namespace App\Mail;

use App\Models\Speaker;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptanceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Speaker
     */
    public $speaker;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Speaker $speaker)
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
        return $this->markdown('email.acceptance-email');
    }
}
