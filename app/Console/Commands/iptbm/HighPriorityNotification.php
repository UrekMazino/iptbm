<?php

namespace App\Console\Commands\iptbm;

use App\Mail\DeadlineNotificationMail;
use App\Mail\UnfinishedTask;
use App\Models\DeadlineEndTask;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\IptbmSendNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class HighPriorityNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:high-priority-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function mailer($data)
    {


        foreach ($data as $profile)

        {
            if($profile->ip_alert->technology->iptbmprofiles->contact->count()>0)
            {

                foreach ($profile->ip_alert->technology->iptbmprofiles->contact as $email)
                {



                    Mail::to('warzservania@gmail.com')
                        ->send(new UnfinishedTask(
                            $profile->ip_alert->technology->title,
                            $profile->ip_alert->ip_type->name,
                            $profile->ip_alert->application_number,
                            $profile->task_group_name,
                            $profile->stage->stage_name,
                            $profile->deadline,
                            route("iptbm.staff.iptask.view",['id'=>$profile->ip_alert->id])
                        ));
                }
            }

            $profile->UnfinishedTask()->save(new DeadlineEndTask([]));


        }

    }
    public function handle()
    {
        $unfinishedTask=IptbmIpAlertTask::with(['ip_alert',
            'stage',
            'UnfinishedTask',
            'dailySend.ipAlertTask',
            'dailySend.ipAlertTask.ip_task_stage_notifications',
            'ip_task_stage_notifications',
            'stage.task',
            'ip_alert.ip_type',
            'ip_alert.technology',
            'ip_alert.technology.iptbmprofiles',
            'ip_alert.technology.iptbmprofiles.contact'=>function($query){
                $query->where('contact_type','email');
            }])

            ->whereDoesntHave('UnfinishedTask')
            ->where('task_status','ONGOING')
            ->where('priority','HIGH')
            ->whereDate('deadline','<',now())
            ->get();
        $this->mailer($unfinishedTask);

    }
}
