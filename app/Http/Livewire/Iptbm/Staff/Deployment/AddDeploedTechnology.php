<?php

namespace App\Http\Livewire\Iptbm\Staff\Deployment;

use App\Models\iptbm\IptbmDeploymentPathway;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddDeploedTechnology extends Component
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


            'adopter' => [
                'required',
                Rule::unique(IptbmDeploymentPathway::class, 'adoptor_name')->where('technology_id', $this->techId)
            ],
            'address' => 'required|min:5'
        ];
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


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function saveForm()
    {

        $this->validate();
        $tech = IptbmTechnologyProfile::find($this->techId);

        $tech->deployment()->save(new IptbmDeploymentPathway([
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
        return view('livewire.iptbm.staff.deployment.add-deploed-technology');
    }
}
