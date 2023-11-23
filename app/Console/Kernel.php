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
        //  $schedule->command('notify:cron')->everySecond();
        $schedule->command('app:daily-notification')->everySecond(); // daily notification
        $schedule->command('app:weekly-notification')->everySecond(); // weekly notification
        $schedule->command('app:high-priority-notification')->everySecond(); // sending notifications for due tasks
        $schedule->command('app:clean-notif-logs')->daily(); // delete all sending logs
        // $schedule->job(new SendIpAlerReminder())->everySecond();
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
