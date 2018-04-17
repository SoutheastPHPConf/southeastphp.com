<?php

namespace App\Console;

use App\Console\Commands\AcceptEmailSendCommand;
use App\Console\Commands\DeclinedEmailSendCommand;
use App\Console\Commands\SitemapCommand;
use App\Mail\AcceptanceMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SitemapCommand::class,
        AcceptEmailSendCommand::class,
        DeclinedEmailSendCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('sephp:sitemap-generate')->daily();
        $schedule->command('backup:run')->weekends();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
