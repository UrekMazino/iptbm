<?php

namespace App\Http\Livewire\Iptbm\Admin\Region;

use Livewire\Component;

class RegionDetails extends Component
{


    public $region;
    public $regionName;
    public $rrdcChair;
    public $consortium;
    public $consortiumDir;

    public function updateRegionName()
    {
        $this->validateOnly('regionName');
        $this->region->name = $this->regionName;
        $this->region->save();
        $this->emit('reloadPage');
    }

    public function updaterdeChair()
    {
        $this->validateOnly('rrdcChair');
        $this->region->rrdcc_chair = $this->rrdcChair;
        $this->region->save();
        $this->emit('reloadPage');
    }

    public function updateConsortium()
    {
        $this->validateOnly('consortium');
        $this->region->consortium = $this->consortium;
        $this->region->save();
        $this->emit('reloadPage');
    }

    public function updateConsortiumDir()
    {
        $this->validateOnly('consortiumDir');
        $this->region->consortium_director = $this->consortiumDir;
        $this->region->save();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'regionName' => [
                'required',
                'max:50',
                'unique:iptbm_regions,name'
            ],
            'rrdcChair' => [
                'required',
                'max:50',
                'unique:iptbm_regions,rrdcc_chair'
            ],
            'consortium' => [
                'required',
                'max:50',
                'unique:iptbm_regions,consortium'
            ],
            'consortiumDir' => [
                'required',
                'max:60',
                'unique:iptbm_regions,consortium_director'
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($region): void
    {
        $this->region = $region;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.region.region-details');
    }
}
