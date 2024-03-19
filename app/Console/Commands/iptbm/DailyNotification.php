<?php

namespace App\Console\Commands\iptbm;

use App\Mail\DeadlineNotificationMail;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\IptbmSendNotification;
use App\Notifications\iptbm\task\DeadlineNotif;
use App\Notifications\iptbm\Task\TaskDeadlineDaily;
use Carbon\Carbon;
use Illuminate\Console\Command;


class DailyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails for daily notifications';

    public function handle(): void
    {
        $deadlinesDaily = IptbmIpAlertTask::with(['ip_alert',
            'stage',
            'dailySend',
            'dailySend.ipAlertTask',
            'dailySend.ipAlertTask.ip_task_stage_notifications',
            'ip_task_stage_notifications',
            'stage.task',
            'ip_alert.ip_type',
            'ip_alert.technology',
            'ip_alert.technology.iptbmprofiles',
            ])
            ->whereDoesntHave('dailySend',function ($sent){
                $sent->whereDate('created_at', Carbon::today());
            })
            ->where('task_status', 'ONGOING')
            ->whereHas('ip_task_stage_notifications', function ($query) {
                $query->where('frequency', 'daily');
            })
            ->whereDate('deadline', '>=', Carbon::today())
            ->orderBy('priority', 'desc')->get();
        $this->mailer($deadlinesDaily);
    }

    /**
     * Execute the console command.
     */

    public function mailer($data)
    {

        foreach ($data as $profile) {
            foreach ($profile->ip_alert->technology->iptbmprofiles->users as $user)
            {
                $user->notify(new DeadlineNotif(
                    $profile->ip_alert->technology->title,
                    $profile->ip_alert->ip_type->name,
                    $profile->ip_alert->application_number,
                    $profile->task_group_name,
                    $profile->stage->stage_name,
                    $profile->deadline,
                    route("iptbm.staff.iptask.view", ['id' => $profile->id])
                ));
            }
            $this->info('Notification sent successfully.');


            $profile->dailySend()->save(new IptbmSendNotification());


        }

    }
}
