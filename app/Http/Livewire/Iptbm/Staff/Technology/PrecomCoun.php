<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmCommercializationPrecom;
use Livewire\Component;

class PrecomCoun extends Component
{
    public $precom;
    public $count;
    public $technology;

    public function mount($technologyId)
    {

        $this->technology = $technologyId;
        /*
         * $this->fill([
            'precom' => $precom,
            'count' => $this->precom->count()
        ]);
         */
    }

    public function render()
    {
        $this->precom = IptbmCommercializationPrecom::latest()->limit(5)->where('technology_id', $this->technology)->get();

        return view('livewire.iptbm.staff.technology.precom-coun')->with([
            'technology' => $this->technology
        ]);
    }
}
