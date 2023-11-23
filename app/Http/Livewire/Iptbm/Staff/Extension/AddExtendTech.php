<?php

namespace App\Http\Livewire\Iptbm\Staff\Extension;

use App\Models\iptbm\IptbmExtensionPathway;
use App\Models\iptbm\IptbmTechnologyProfile;
use Livewire\Component;

class AddExtendTech extends Component
{
    public $technologies;
    public $techProfile;

    public $technology;
    public $adopter;
    public $address;
    public $techId;

    public function rules()
    {
        $tech = IptbmTechnologyProfile::where("title", $this->technology)->first();
        if ($tech) {
            $this->techId = $tech->id;
        }


        return [
            'technology' => [
                'required',
                'exists:iptbm_technology_profiles,title',
            ],


            'adopter' => 'required|min:3',
            'address' => 'required|min:5'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function resetVal()
    {
        $this->techId = null;
        $this->resetValidation([
            'technology',
            'techId',
            'adopter',
            'address'
        ]);
        $this->reset(
            'technology',
            'adopter',
            'address'
        );
    }

    public function saveForm()
    {

        $this->validate();
        $tech = IptbmTechnologyProfile::find($this->techId);

        $tech->deployment()->save(new IptbmExtensionPathway([
            'adoptor_name' => $this->adopter,
            'address' => $this->address
        ]));

        $this->emit('reloadPage');

    }

    public function mount($technologies)
    {
        $this->technologies = $technologies;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.extension.add-extend-tech');
    }
}
