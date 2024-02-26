<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhProfiles extends Component
{
    public function render()
    {
        return view('livewire.abh.dashboard.abh-profiles')
            ->with([
                'profile'=>AbhProfile::with('agency.region')
                    ->whereHas('agency.region',function ($region) {
                        $region->where('id',Auth::user()->abh_profile->agency->region->id);
                    })->get()

        ]);
    }
}
