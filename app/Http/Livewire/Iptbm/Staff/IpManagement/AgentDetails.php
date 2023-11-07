<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmIpAgentContact;
use App\Models\iptbm\IptbmPatentAgent;
use App\Models\iptbm\IptbmPatentAgentContact;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AgentDetails extends Component
{
    public $agent;

    public $mobileModel;
    public $phoneModel;
    public $faxModel;
    public $emailModel;
    public $agentNameModel;



    public $showContactPanel=[
        'mobile'=>false,
        'phone'=>false,
        'fax'=>false,
        'email'=>false,
    ];


    public function toggleShowContactPanel($props)
    {
        $this->showContactPanel[$props]=!$this->showContactPanel[$props];

    }

    public function saveMobile()
    {
        $this->validateOnly('mobileModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type'=>'mobile',
            'contact'=>$this->mobileModel
        ]));

        $this->emit('reloadPage');

    }
    public function savePhone()
    {
        $this->validateOnly('phoneModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type'=>'phone',
            'contact'=>$this->phoneModel
        ]));

        $this->emit('reloadPage');

    }

    public function saveFax()
    {
        $this->validateOnly('faxModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type'=>'fax',
            'contact'=>$this->faxModel
        ]));

        $this->emit('reloadPage');

    }
    public function saveEmail()
    {
        $this->validateOnly('emailModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type'=>'email',
            'contact'=>$this->emailModel
        ]));

        $this->emit('reloadPage');

    }


    public function deleteAgent()
    {
        $this->agent->delete();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return[
            'mobileModel'=>[
                'required',
                'numeric',
                'digits:11',
                Rule::unique('iptbm_ip_agent_contacts','contact')->where('ip_application_id',$this->agent->ip_alert_id)
            ],
            'phoneModel'=>[
                'required',
                'numeric',
                Rule::unique('iptbm_ip_agent_contacts','contact')->where('ip_application_id',$this->agent->ip_alert_id)
            ],
            'faxModel'=>[
                'required',
                'numeric',
                Rule::unique('iptbm_ip_agent_contacts','contact')->where('ip_application_id',$this->agent->ip_alert_id)
            ],
            'emailModel'=>[
                'required',
                'email',
                Rule::unique('iptbm_ip_agent_contacts','contact')->where('ip_application_id',$this->agent->ip_alert_id)
            ],
        ];
    }

    public function mount($agent)
    {

        $this->agent=IptbmPatentAgent::with('agent_contact')->find($this->agent->id);
        $this->agentNameModel=$agent->name;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.agent-details');
    }
}
