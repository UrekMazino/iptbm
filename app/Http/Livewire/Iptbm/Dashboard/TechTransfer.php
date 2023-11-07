<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use App\Models\iptbm\IptbmTechnologyProfile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TechTransfer extends Component
{

    public $techProtocol;

    public $regions;


    public function mount()
    {


    }


    public function render()
    {
        $this->techProtocol =IptbmProfile::with('agency.region')->where('techno_transfer','1')
            ->whereHas('agency.region',function ($query) {
                $query->where('id',Auth::user()->profile->agency->region->id);
            })
            ->get();

        return view('livewire.iptbm.dashboard.tech-transfer')->with([
            'techProtocol'=>$this->techProtocol
        ]);
    }
}
