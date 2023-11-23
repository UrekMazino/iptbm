<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmAdoptor;
use Livewire\Component;

class AddTechAdopter extends Component
{

    public $adopterModel;

    public function reseter()
    {
        $this->reset('adopterModel');
        $this->resetValidation([
            'adopterModel'
        ]);
    }

    public function addAdopter()
    {
        $this->validate();
        IptbmAdoptor::create([
            'name' => $this->adopterModel
        ]);
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'adopterModel' => 'required|max:50|unique:iptbm_adoptors,name',
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.add-tech-adopter');
    }
}
