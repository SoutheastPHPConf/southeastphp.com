<?php

namespace App\Console\Commands;

use App\Mail\DeclineEmail;
use App\Models\DeclinedSpeaker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DeclinedEmailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speakers:decline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send decline emails :(';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $speakers = DeclinedSpeaker::all();

        return $speakers->each(function ($speaker) {
            Log::info('decline email sent to ' . $speaker->email);
            return Mail::to($speaker->email)->send(new DeclineEmail($speaker));
        });
    }
}
