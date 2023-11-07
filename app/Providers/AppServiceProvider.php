<?php

namespace App\Providers;

use App\Models\iptbm\IptbmIpAlert;
use App\Policies\iptbm\IptbmIpAlertPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $policies=[
        IptbmIpAlert::class=>IptbmIpAlert::class
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
    }
}
