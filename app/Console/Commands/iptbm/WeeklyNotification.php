<?php

namespace App\Console\Commands\iptbm;

use App\Mail\DeadlineNotificationMail;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\IptbmSendNotification;
use App\Notifications\iptbm\task\DeadlineNotif;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WeeklyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:weekly-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending a weekly notification';

    public function handle()
    {
        $deadlinesWeekly = IptbmIpAlertTask::with(['ip_alert',
            'stage',
            'dailySend',
            'dailySend.ipAlertTask',
            'dailySend.ipAlertTask.ip_task_stage_notifications',
            'ip_task_stage_notifications',
            'stage.task',
            'ip_alert.ip_type',
            'ip_alert.technology',
            'ip_alert.technology.iptbmprofiles',
            /*
             * 'ip_alert.technology.iptbmprofiles.contact' => function ($query) {
                $query->where('contact_type', 'email');
            }
             */])
            ->whereDoesntHave('dailySend',function ($sent){

                $sent->whereDate('created_at', Carbon::today());
            })
            ->where('task_status', 'ONGOING')
            ->whereHas('ip_task_stage_notifications', function ($query) {
                $query->where('frequency', 'weekly');
                /*
                 * ->where('day_of_week', Carbon::now()->format('l'))
                    ->whereTime('time_of_day', '<=', now());
                 */
            })
            ->whereDate('deadline', '>=', now())
            ->orderBy('priority', 'desc')->get();

        $this->mailer($deadlinesWeekly);

    }

    /**
     * Execute the console command.
     */

    public function mailer($data)
    {


        foreach ($data as $profile) {
            foreach ($profile->ip_alert->technology->iptbmprofiles->users as $user) {

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

            $profile->dailySend()->save(new IptbmSendNotification([]));


        }

    }
}
