<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\abh\AbhProject;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Policies\abh\AbhProfileProjectPolicy;
use App\Policies\iptbm\IptbmTechProfilePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        AbhProject::class=>AbhProfileProjectPolicy::class,
        IptbmTechnologyProfile::class=>IptbmTechProfilePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
