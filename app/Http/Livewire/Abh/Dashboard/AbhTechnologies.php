<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\iptbm\IptbmCommercializationPrecom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhTechnologies extends Component
{
    public function render()
    {
        return view('livewire.abh.dashboard.abh-technologies')
            ->with([
                'commercial_tech'=>IptbmCommercializationPrecom::with('technology.iptbmprofiles.agency.region')
                    ->whereHas('technology.iptbmprofiles.agency.region', function ($query) {
                        $query->where('id', Auth::user()->abh_profile->agency->region->id);
                    })
                    ->get()
            ]);
    }
}
