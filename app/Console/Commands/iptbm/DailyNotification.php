<?php

namespace App\Console\Commands\iptbm;

use App\Mail\DeadlineNotificationMail;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\IptbmSendNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use function Clue\StreamFilter\fun;

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
            'ip_alert.technology.iptbmprofiles.contact' => function ($query) {
                $query->where('contact_type', 'email');
            }])
            ->whereDoesntHave('dailySend')
            ->where('task_status', 'ONGOING')
            ->whereHas('ip_task_stage_notifications', function ($query) {
                $query->where('frequency', 'daily')
                    ->whereTime('time_of_day', '<=', now());
            })
            ->whereDate('deadline', '>', now())
            ->get();
        $this->mailer($deadlinesDaily);
    }

    /**
     * Execute the console command.
     */

    public function mailer($data)
    {


        foreach ($data as $profile) {
            if ($profile->ip_alert->technology->iptbmprofiles->contact->count() > 0) {

                foreach ($profile->ip_alert->technology->iptbmprofiles->contact as $email) {

                    Mail::to('warzservania@gmail.com')
                        ->send(new DeadlineNotificationMail(
                            $profile->ip_alert->technology->title,
                            $profile->ip_alert->ip_type->name,
                            $profile->ip_alert->application_number,
                            $profile->task_group_name,
                            $profile->stage->stage_name,
                            $profile->deadline,
                            route("iptbm.staff.iptask.view", ['id' => $profile->id])
                        ));

                }
            }

            $profile->dailySend()->save(new IptbmSendNotification([]));


        }

    }
}
