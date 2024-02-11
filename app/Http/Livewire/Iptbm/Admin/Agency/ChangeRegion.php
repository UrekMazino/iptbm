<?php

namespace App\Http\Livewire\Iptbm\Admin\Agency;

use App\Models\iptbm\IptbmRegion;
use Livewire\Component;

class ChangeRegion extends Component
{
    public $agency;
    public $region_name;


    public function mount($agency)
    {
        $this->agency = $agency;
    }

    public function update_region()
    {
        $region=IptbmRegion::where('name',$this->region_name)->first();
        $this->agency->iptbm_region_id=$region->id;
        $this->agency->save();
        $this->emit('reloadPage');
    }
    public function rules()
    {
        return [
            'region_name' => [
                'required',
                'exists:iptbm_regions,name'
            ]
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function render()
    {
        return view('livewire.iptbm.admin.agency.change-region')->with([
            'regions'=>IptbmRegion::all()
        ]);
    }
}
