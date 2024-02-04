<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IptbmProfiles extends Component
{




    public function mount()
    {


    }

    public function render()
    {

        $regions=IptbmRegion::with(['agencies'=>function ($agency) {
            $agency->whereHas('profiles');
        },'agencies.profiles'])->where('id',Auth::user()->profile->agency->id)->first();

        $profile=IptbmProfile::with('agency.region')
            ->whereHas('agency.region',function ($region) {
                $region->where('id',Auth::user()->profile->agency->region->id);
            })->get();




        return view('livewire.iptbm.dashboard.iptbm-profiles')->with([
            'iptbmProfiles'=>$profile
        ]);
    }
}
