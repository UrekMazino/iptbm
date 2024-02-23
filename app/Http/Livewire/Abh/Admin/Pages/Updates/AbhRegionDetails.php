<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\abh\AbhRegion;
use App\Models\iptbm\IptbmRegion;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AbhRegionDetails extends Component
{
    public $region;
    public $region_name;
    public $region_rrdcc_chair;
    public $region_consortium;
    public $region_consortium_director;





    public function update_consortium_director(): void
    {
        $this->region->consortium_director=$this->region_consortium_director;
        $this->region->save();
        $this->emit('reloadPage');
    }

    public function update_consortium(): void
    {
        $this->region->consortium=$this->region_consortium;
        $this->region->save();
        $this->emit('reloadPage');
    }


    public function update_rrdcc_chair(): void
    {
        $this->region->rrdcc_chair=$this->region_rrdcc_chair;
        $this->region->save();
        $this->emit('reloadPage');
    }
    public function update_name(): void
    {
        $this->region->name=$this->region_name;
        $this->region->save();
        $this->emit('reloadPage');
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return[
            'region_name'=>[
                'required',
                'unique:iptbm_regions,name',
                'max:100'
            ],
            'region_rrdcc_chair'=>[
                'required',
                'max:60',
            ],
            'region_consortium'=>[
                'required',
                'max:60',
                'unique:iptbm_regions,consortium',
            ],
            'region_consortium_director'=>[
                'required',
                'max:60',
                'unique:iptbm_regions,consortium_director',
            ],

        ];
    }
    public function mount(IptbmRegion $region): void
    {
        $this->region=$region;
        $this->region_name=$this->region->name;
        $this->region_rrdcc_chair=$this->region->rrdcc_chair;
        $this->region_consortium=$this->region->consortium;
        $this->region_consortium_director=$this->region->consortium_director;
    }

    public function render()
    {

        return view('livewire.abh.admin.pages.updates.abh-region-details')
            ->layout(AbhAdminApp::class);
    }
}
