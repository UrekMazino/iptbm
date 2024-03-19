<?php

namespace App\Console;


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        Commands\iptbm\WeeklyNotification::class,
        Commands\iptbm\DailyNotification::class,
        Commands\iptbm\HighPriorityNotification::class,
        Commands\iptbm\CleanNotifLogs::class
    ];
    protected function schedule(Schedule $schedule): void

    {

        $schedule->command('app:daily-notification')
          //  ->withoutOverlapping()
            //->dailyAt('01:00')
                ->everySecond();
            //->runInBackground();// daily notification

        $schedule->command('app:weekly-notification')
            ->withoutOverlapping()
            ->weeklyOn(1,'01:00')
            ->runInBackground(); // weekly notification

       $schedule->command('app:clean-notif-logs')
           ->withoutOverlapping()
           ->sundays() // Run on Sundays
           ->at('17:00') // At 5:00 PM
           ->runInBackground();

       // $schedule->job(new SendIpAlerReminder())->everySecond();
        //  $schedule->command('app:high-priority-notification')->everyFourHours();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
