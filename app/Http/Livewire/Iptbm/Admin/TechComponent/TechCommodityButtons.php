<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmTechCommodity;
use Livewire\Component;

class TechCommodityButtons extends Component
{
    public $commodity;
    public $commodityModel;


    public function saveEditForm()
    {
        $this->validate();
        $this->commodity->name=$this->commodityModel;
        $this->commodity->save();
        $this->emit('reloadPage');
    }
    public function saveForm()
    {
        $this->validate();
        $this->commodity->load('industry');
        $industry=$this->commodity->industry;
        $industry->commodity()->save(new IptbmTechCommodity([

        ]));
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return[
            'commodityModel' =>'required|unique:iptbm_commodities,name'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function delete(): void
    {
        $this->commodity->delete();
        $this->emit('reloadPage');
    }
    public function mount($commodity)
    {
        $this->commodity=$commodity;
    }
    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.tech-commodity-buttons');
    }
}
