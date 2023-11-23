<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmTechOwner;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TechOwner extends Component
{
    public $technology;
    public $agencies;
    public $agencyId;

    public $ownerModel;


    public function addOwner()
    {
        $this->validate();
        $this->technology->owner()->save(new IptbmTechOwner([
            'iptbm_agencies_id' => $this->agencyId
        ]));
        $this->emit('reloadPage');
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function rules()
    {

        $agId = IptbmAgency::select('id')->where('name', $this->ownerModel)->first();
        if ($agId) {
            $this->agencyId = $agId->id;
        }


        return [
            'ownerModel' => 'required|exists:iptbm_agencies,name',
            'agencyId' => [
                Rule::unique(IptbmTechOwner::class, 'iptbm_agencies_id')->where('iptbm_technology_profiles_id', $this->technology->id)
            ]
        ];
    }

    public function mount($technology)
    {
        $this->technology = $technology;
        $this->agencies = IptbmAgency::pluck('name')->toArray();

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-owner');
    }
}
