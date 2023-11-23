<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmCommercializationAdopter;
use Livewire\Component;

class ComAdopterCount extends Component
{
    public $adopter;
    public $count;
    public $technology;

    public function mount($technologyId)
    {
        /*
         *  $this->fill([
             'precom' => $adopter,
             'count' => $this->adopter->count()
         ]);
         */
        $this->technology = $technologyId;
    }

    public function render()
    {
        $this->adopter = IptbmCommercializationAdopter::latest()->limit(5)->where('technology_id', $this->technology)->get();
        return view('livewire.iptbm.staff.technology.com-adopter-count')->with([
            'adopter' => $this->adopter
        ]);
    }
}
