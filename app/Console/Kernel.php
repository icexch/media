<?php

namespace App\Console;

use App\Console\Commands\CreateModerator;
use App\Console\Commands\GatherCategories;
use App\Console\Commands\GatherRegions;
use App\Console\Commands\GenerateRedisDataCommand;
use App\Console\Commands\StatsTest;
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
        GatherRegions::class,
        GatherCategories::class,
        CreateModerator::class,
        GenerateRedisDataCommand::class,
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
