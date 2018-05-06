<?php

namespace App\Console\Commands;

use App\Mail\AnnounceEmail;
use App\Models\Speaker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AnnounceSpeakersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speaker:announce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Let speakers announce their speaking-ness';

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
            Log::info('announce email sent to ' . $speaker->email);
            return Mail::to($speaker->email)->send(new AnnounceEmail($speaker));
        });
    }
}
