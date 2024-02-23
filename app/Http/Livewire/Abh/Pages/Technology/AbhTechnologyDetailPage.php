<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmPrecomTechVideo;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class AbhTechnologyDetailPage extends Component
{

    public $application;

    public $new_tech_title;
    public $tech_id;

    public function save_Precom()
    {
        if($this->new_tech_title)
        {
            $this->validateOnly('new_tech_title');
        }else{
            $this->validate([
                'tech_id'=>[
                    'required',
                    'unique:iptbm_commercialization_precoms,technology_id'
                ]
            ]);
        }
        $precom=IptbmCommercializationPrecom::create([
            'technology_id' => $this->application->technology->id,
            'pre_com_tech_name' => $this->new_tech_title
        ]);
        $precom->video()->save(new IptbmPrecomTechVideo([]));

        $this->emit('reloadPage');
    }


    public function rules()
    {
        return [
            'new_tech_title'=>[
                'nullable',
                'max:150',
                'unique:iptbm_commercialization_precoms,pre_com_tech_name'
            ],
            'technology_id'=>[
                'required',
            ]
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount(IptbmIpAlert $application)
    {
        $this->application = $application;
        $this->tech_id=$application->technology->id;

    }
    public function render()
    {

        return view('livewire.abh.pages.technology.abh-technology-detail-page')
            ->with(['technology' => $this->application->technology])
            ->layout(AbhLayout::class,[
                'pagetitle'=>'Technology'
            ]);
    }
}
