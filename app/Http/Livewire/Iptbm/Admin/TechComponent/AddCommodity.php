<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmCommodity;
use Livewire\Component;

class AddCommodity extends Component
{

    public $industry;
    public $commodityModel;

    public function saveForm(): void
    {
        $this->validate();
        $this->industry->commodities()->save(new IptbmCommodity([
            'name' => $this->commodityModel
        ]));
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'commodityModel' => 'required|unique:iptbm_commodities,name'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($industry)
    {
        $this->industry = $industry;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.add-commodity');
    }
}
