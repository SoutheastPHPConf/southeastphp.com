<?php

namespace App\Console\Commands;

use App\Mail\AcceptanceMail;
use App\Models\Speaker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AcceptEmailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speakers:accept';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send acceptance email to speakers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $speakers = Speaker::all();

        return $speakers->each(function ($speaker) {
            return Mail::to($speaker->email)->send(new AcceptanceMail($speaker));
        });
    }
}
