<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmTechStatus;
use Livewire\Component;

class TechnologyStatus extends Component
{
    public $technology;

    public $techStatus;

    public $latestData;

    public $verifyDelete = false;

    public function deleteStatus($id)
    {
        $status = IptbmTechStatus::find($id);
        $status->delete();
        $this->emit('updateStatus');
    }

    public function verify($id)
    {
        $lastStatus = IptbmTechStatus::latest()->first();
        $techStat = $this->technology->statuses()->latest()->first();
        if ($techStat->id === $id || $this->technology->statuses->count() == 1) {
            $this->verifyDelete = true;
        }
    }

    public function mount($technology, $techStatus)
    {
        $this->techStatus = $techStatus;
        $this->technology = $technology;
        $this->latestData = $this->technology->statuses()->latest()->first();
        $this->verifyDelete = $this->deletable($techStatus->id);
    }

    public function deletable($id)
    {
        return $this->latestData->id === $id;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.technology-status');
    }
}
