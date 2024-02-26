<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TechTransPlace extends Component
{
    public function render()
    {
        return view('livewire.abh.dashboard.tech-trans-place')
            ->with([
                'techTrans'=>AbhProfile::with('agency.region')->where('techno_transfer', '1')
                    ->whereHas('agency.region', function ($query) {
                        $query->where('id', Auth::user()->abh_profile->agency->region->id);
                    })
                    ->get()
            ]);
    }
}
