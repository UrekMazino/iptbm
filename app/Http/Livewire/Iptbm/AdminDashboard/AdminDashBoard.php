<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmMapLocation;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use App\Models\iptbm\IptbmTechnologyProfile;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AdminDashBoard extends Component
{
    public $iptbmProfile;
    public $countPerYear;
    public $iptbmProfileNew;
    public $technologies;

    public $techProtocol;

    public $regions;

    public function mount()
    {
        $this->techProtocol = IptbmProfile::where('techno_transfer', '1')->get();
        $this->regions = IptbmRegion::with(['iptbms.agency', 'iptbms' => function ($query) {
            $query->where('techno_transfer', '1');
        }])->whereHas('iptbms')
            ->get();


        $this->iptbmProfile = IptbmProfile::with('agency')->orderBy('year_established')->get();
        $this->iptbmProfileNew = IptbmProfile::with('region', 'agency')->where('year_established', '=', Carbon::now()->year)->get();

        $this->technologies = IptbmTechnologyProfile::with('iptbmprofiles')->get();
        foreach ($this->technologies as $technology) {
            $technology->owner = IptbmAgency::find($technology->tech_owner);
        }
        $this->countPerYear = [];
        for ($year = 2017; $year <= Carbon::now()->year; $year++) {
            $this->countPerYear[] = [
                'year' => $year,
                'total' => IptbmProfile::where('year_established', $year)->count()
            ];
        }

    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->iptbm_location = IptbmMapLocation::with('profile', 'profile.agency.region')->get();
        return view('livewire.iptbm.admin-dashboard.admin-dash-board')->with([
            'iptbm_location' => $this->iptbm_location
        ]);
    }
}
