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
       dd($deadlinesDaily);

    }
}
