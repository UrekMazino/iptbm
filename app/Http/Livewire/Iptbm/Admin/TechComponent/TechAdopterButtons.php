<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use Livewire\Component;

class TechAdopterButtons extends Component
{
    public $adopter;
    public $adopterNameModel;

    public function delete()
    {
        $this->adopter->delete();
        $this->emit('reloadPage');
    }

    public function editName()
    {
        $this->validate();
        $this->adopter->name = $this->adopterNameModel;
        $this->adopter->save();
        $this->emit('reloadPage');
    }

    public function reseter()
    {
        $this->adopterNameModel = $this->adopter->name;
        $this->resetValidation([
            'adopterNameModel'
        ]);
    }

    public function rules()
    {
        return [
            'adopterNameModel' => 'required|max:50|unique:iptbm_adoptors,name',
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($adopter)
    {
        $this->adopter = $adopter;
        $this->adopterNameModel = $this->adopter->name;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.tech-adopter-buttons');
    }
}
