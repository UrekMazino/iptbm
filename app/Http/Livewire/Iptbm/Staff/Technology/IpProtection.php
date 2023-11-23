<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IpType;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class IpProtection extends Component
{
    public $technology;
    public $ipType;

    public $ipTypeModel;
    public $applicationNumberModel;
    public $dateFiledModel;

    public function saveForm()
    {
        $this->validate();
        $ipAlert = new IptbmIpAlert([
            'ip_type_id' => $this->ipTypeModel,
            'application_number' => $this->applicationNumberModel,
            'date_of_filing' => Carbon::parse($this->dateFiledModel)->format('Y-m-d')
        ]);
        $this->technology->ip_applications()->save($ipAlert);
        return redirect()->route('iptbm.staff.ip-management.application.index', [
            'id' => $ipAlert->id
        ]);

    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return [
            'ipTypeModel' => [
                'required',
                'exists:ip_types,id',
                Rule::unique(IptbmIpAlert::class, 'ip_type_id')->where('technology_id', $this->technology->id)
            ],
            'applicationNumberModel' => [
                'required',
                Rule::unique(IptbmIpAlert::class, 'application_number'),
            ],
            'dateFiledModel' => [
                'required',
                'date_format:F-d-Y'
            ]
        ];
    }


    public function mount($technology)
    {
        $this->technology = $technology;
        $this->ipType = IpType::all();
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.ip-protection');
    }
}
