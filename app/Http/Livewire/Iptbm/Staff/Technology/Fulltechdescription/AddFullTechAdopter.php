<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use App\Models\iptbm\IptbmAdoptor;
use App\Models\iptbm\IptbmTechnologyAdoptor;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddFullTechAdopter extends Component
{
    public $fulltechdescription;
    public $adopterModel;

    public function deleteAdopter(IptbmTechnologyAdoptor $adopter): void
    {
        $adopter->delete();
        $this->emit('reloadPage');
    }

    public function saveForm()
    {
        $this->validate();
        $this->fulltechdescription->adoptors()->save(new IptbmTechnologyAdoptor([
            'adoptor_name' => $this->adopterModel
        ]));
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'adopterModel' => [
                'required',
                Rule::unique(IptbmTechnologyAdoptor::class, 'adoptor_name')->where('full_tech_id', $this->fulltechdescription->id)
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($fullDescription)
    {
        $this->fulltechdescription = $fullDescription;
    }

    public function render()
    {
        $list = IptbmAdoptor::pluck('name');

        return view('livewire.iptbm.staff.technology.fulltechdescription.add-full-tech-adopter')->with([
            'list' => $list,
        ]);
    }
}
