<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Technologies extends Component
{
    public $technologies;

    public function mount()
    {
        $this->technologies = IptbmTechnologyProfile::with("iptbmprofiles.agency.region")
            ->whereHas('iptbmprofiles.agency.region', function ($query) {
                $query->where('id', Auth::user()->profile->agency->region->id);
            })
            ->get();

        foreach ($this->technologies as $technology) {
            $technology->owner = IptbmAgency::find($technology->tech_owner);
        }
    }

    public function render()
    {
        return view('livewire.iptbm.dashboard.technologies');
    }
}
