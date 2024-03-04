<?php

namespace App\Http\Livewire\Abh\Admin\Counter;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Livewire\Component;

class TotalTechnologies extends Component
{

    public $modal_id;


    public function mount($modal_id): void
    {

        $this->modal_id=$modal_id;
    }

    public function render()
    {
        return view('livewire.abh.admin.counter.total-technologies')
            ->with([

                'precoms'=>IptbmCommercializationPrecom::with('technology.iptbmprofiles.agency.region')->latest()->get(),
                'total_tech'=>IptbmCommercializationPrecom::all()->count()
            ]);
    }
}
