<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmIndustry;
use Livewire\Component;

class AddIndustry extends Component
{
    public $industry;

    public function saveForm()
    {
        $this->validate();
        IptbmIndustry::create([
            'name' => strtoupper($this->industry)
        ]);
        $this->emit('reloadPage');
    }


    public function resetField(): void
    {

        $this->reset('industry');
        $this->resetValidation(['industry']);
    }

    public function rules()
    {
        return [
            'industry' => [
                'required',
                'unique:iptbm_industries,name'
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.add-industry');
    }
}
