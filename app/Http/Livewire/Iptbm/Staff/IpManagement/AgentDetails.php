<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmPatentAgent;
use App\Models\iptbm\IptbmPatentAgentContact;
use App\Rules\iptbm\ContactCounter;
use App\Rules\iptbm\MaxContact;
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


    public $showContactPanel = [
        'mobile' => false,
        'phone' => false,
        'fax' => false,
        'email' => false,
    ];


    public function toggleShowContactPanel($props)
    {
        $this->showContactPanel[$props] = !$this->showContactPanel[$props];

    }

    public function saveMobile()
    {

        $this->validateOnly('mobileModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type' => 'mobile',
            'contact' => $this->mobileModel
        ]));

        $this->emit('reloadPage');

    }

    public function savePhone()
    {
        $this->validateOnly('phoneModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type' => 'phone',
            'contact' => $this->phoneModel
        ]));

        $this->emit('reloadPage');

    }

    public function saveFax()
    {
        $this->validateOnly('faxModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type' => 'fax',
            'contact' => $this->faxModel
        ]));

        $this->emit('reloadPage');

    }

    public function saveEmail()
    {
        $this->validateOnly('emailModel');

        $this->agent->agent_contact()->save(new IptbmPatentAgentContact([
            'type' => 'email',
            'contact' => $this->emailModel
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
        return [
            'mobileModel' => [
                'required',
                'numeric',
                'digits:11',
                new MaxContact(
                    3,
                    'iptbm_patent_agent_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'patent_agent_id',
                    $this->agent->id,
                    'Mobile phone number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_patent_agent_contacts', 'contact')->where('patent_agent_id', $this->agent->id)
            ],
            'phoneModel' => [
                'required',
                'numeric',
                'min_digits:9',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_patent_agent_contacts',
                    'contact',
                    'type',
                    'fax',
                    'patent_agent_id',
                    $this->agent->id,
                    'Telephone number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_patent_agent_contacts', 'contact')->where('patent_agent_id', $this->agent->id)
            ],
            'faxModel' => [
                'required',
                'numeric',
                'min_digits:9',
                'max_digits:10',

                new MaxContact(
                    3,
                    'iptbm_patent_agent_contacts',
                    'contact',
                    'type',
                    'fax',
                    'patent_agent_id',
                    $this->agent->id,
                    'Fax number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_patent_agent_contacts', 'contact')->where('patent_agent_id', $this->agent->id)
            ],
            'emailModel' => [
                'required',
                'email',
                'max:60',
                new MaxContact(
                    3,
                    'iptbm_patent_agent_contacts',
                    'contact',
                    'type',
                    'email',
                    'patent_agent_id',
                    $this->agent->id,
                    'Email was already reached its maximum limit.'
                ),

                Rule::unique('iptbm_patent_agent_contacts', 'contact')->where('patent_agent_id', $this->agent->id)
            ],
        ];
    }

    public function mount($agent)
    {

        $this->agent = IptbmPatentAgent::with('agent_contact')->find($this->agent->id);
        $this->agentNameModel = $agent->name;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.agent-details');
    }
}
