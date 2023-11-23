<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmPatentAgent;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PatenAgent extends Component
{

    public $ipAlert;

    public $showPatentAgentForm = false;
    public $patentAgentModel = "ksdhjfksdjsdj";
    public $agentAddressModel;


    public function toggleShowPatentAgentForm()
    {
        $this->showPatentAgentForm = !$this->showPatentAgentForm;
        $this->reset('patentAgentModel', 'agentAddressModel');
        $this->resetValidation(['patentAgentModel', 'agentAddressModel']);
        $this->patentAgentModel = $this->ipAlert->agent_name;
    }

    public function savePatentAgent()
    {

        $this->validate();
        $this->ipAlert->patent_agent()->save(new IptbmPatentAgent([
            'name' => $this->patentAgentModel,
            'address' => $this->agentAddressModel
        ]));

        $this->ipAlert->save();
        $this->emit('reloadPage');
        //session()->flash('patentAgentModel',' Protection status save updated successfully');
    }

    public function rules()
    {
        return [
            'patentAgentModel' => [
                'required',
                Rule::unique(IptbmPatentAgent::class, "name")
                    ->where("ip_alert_id", $this->ipAlert->id)
            ],
            'agentAddressModel' => [
                'required',
                'min:5'
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($ipAlert)
    {
        $this->ipAlert = $ipAlert;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.paten-agent');
    }
}
