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

    /**
     * Schedule the application's command execution.
     *
     * @param Schedule $schedule The schedule instance.
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule the daily notification command to run every day at 01:00 AM
        $schedule->command('app:daily-notification')
            ->withoutOverlapping()
            ->dailyAt('01:00')
            ->runInBackground();

        // Schedule the weekly notification command to run every Monday at 01:00 AM
        $schedule->command('app:weekly-notification')
            ->withoutOverlapping()
            ->weeklyOn(1, '01:00')
            ->runInBackground();

        // Schedule the clean notification logs command to run every Sunday at 5:00 PM
        $schedule->command('app:clean-notif-logs')
            ->withoutOverlapping()
            ->sundays()
            ->at('17:00')
            ->runInBackground();
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
