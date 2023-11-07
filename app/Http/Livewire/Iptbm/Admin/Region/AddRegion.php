<?php

namespace App\Http\Livewire\Iptbm\Admin\Region;

use App\Models\iptbm\IptbmRegion;
use Livewire\Component;

class AddRegion extends Component
{

    public $region_name;
    public $region_rrdcc_chair;
    public $region_consortium;

    public $region_consortium_director;

    public function saveForm()
    {
        $this->validate();
        IptbmRegion::create([
            'name'=>$this->region_name,
            'rrdcc_chair'=>$this->region_rrdcc_chair,
            'consortium'=>$this->region_consortium,
            'consortium_director'=>$this->region_consortium_director,
        ]);
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return[
            'region_name'=>'required|unique:iptbm_regions,name',
            'region_rrdcc_chair'=>'required|min:5',
            'region_consortium'=>'required|unique:iptbm_regions,consortium',
            'region_consortium_director'=>'required|min:8'
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function render()
    {
        return view('livewire.iptbm.admin.region.add-region');
    }
}
