<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Models\iptbm\IpType;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddIpTech extends Component
{

    public $technologies;
    public $ipTypes;


    public $techId;
    public $ipId;



    public $iptypeModel;
    public $technology;
    public $appDateModel;
    public $dateFiledModel;


    public function rules()
    {
        $tech = IptbmTechnologyProfile::where("title", $this->technology)->first();
        $ip=IpType::where("name", $this->iptypeModel)->first();
        if($ip)
        {
            $this->ipId=$ip->id;
        }
        if ($tech) {
            $this->techId = $tech->id;
        }
        return[
            'technology' => [
                'required',
                'exists:iptbm_technology_profiles,title',
            ],
            'techId' => [
                'unique:iptbm_extension_pathways,technology_id',
            ],
            'iptypeModel'=>[
                'required',
                'exists:ip_types,name',
            ],
            'ipId'=>[
                Rule::unique('iptbm_ip_alerts', 'ip_type_id')
                    ->where("technology_id", $this->techId)
            ],
            'appDateModel'=>[
                'required',
                'unique:iptbm_ip_alerts,application_number',

            ],
            'dateFiledModel'=>[
                'required',
                'date',
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function saveForm()
    {

        $tech=IptbmTechnologyProfile::find($this->techId);
        $tech->ip_applications()->save(new IptbmIpAlert([
            'ip_type_id'=>$this->ipId,
            'application_number'=>$this->appDateModel,
            'date_of_filing'=>$this->dateFiledModel
        ]));
        $this->emit('reloadPage');
    }


    public function mount($technologies)
    {
        $this->technologies=$technologies;
        $this->ipTypes=IpType::all();
    }


    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.add-ip-tech');
    }
}
