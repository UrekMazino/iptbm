<?php

namespace App\Providers;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $policies = [
        IptbmIpAlert::class => IptbmIpAlert::class
    ];

    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
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
            ->whereDate('deadline', '>', now())
            ->orderBy('priority')->get();

    }
}
