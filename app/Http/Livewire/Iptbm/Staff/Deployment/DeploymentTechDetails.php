<?php

namespace App\Http\Livewire\Iptbm\Staff\Deployment;

use App\Models\iptbm\IptbmDeploymentAdoptorContact;
use App\Rules\iptbm\MaxContact;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DeploymentTechDetails extends Component
{

    public $deployment;
    public $deploymentContact;

    public $adopterName;
    public $adopterAddress;

    public $showAdopterNameForm = false;
    public $showAdopterAddressForm = false;


    public $showMobileForm = false;
    public $showPhoneForm = false;
    public $showFaxForm = false;
    public $showEmailForm = false;


    public $mobileModel;
    public $phoneModel;
    public $faxModel;
    public $emailModel;
    public $listeners = ['loadData'];
    protected $validationAttributes = [
        'mobileModel' => 'Mobile number'
    ];

    public function toggleShowMobileForm()
    {
        $this->showMobileForm = !$this->showMobileForm;
        $this->reset('mobileModel');
        $this->resetValidation([
            'mobileModel'
        ]);
    }

    public function toggleShowPhoneForm()
    {
        $this->showPhoneForm = !$this->showPhoneForm;
        $this->reset('phoneModel');
        $this->resetValidation([
            'phoneModel'
        ]);
    }

    public function toggleShowFaxForm()
    {
        $this->showFaxForm = !$this->showFaxForm;
        $this->reset('faxModel');
        $this->resetValidation([
            'faxModel'
        ]);
    }

    public function toggleShowEmailForm()
    {
        $this->showEmailForm = !$this->showEmailForm;
        $this->reset('emailModel');
        $this->resetValidation([
            'emailModel'
        ]);
    }

    public function saveMobile()
    {
        $this->validateOnly('mobileModel');
        $this->deployment->contacts()->save(new IptbmDeploymentAdoptorContact([
            'type' => 'mobile',
            'contact' => $this->mobileModel
        ]));
        $this->deployment->save();
        $this->reset('mobileModel');
        $this->resetValidation([
            'mobileModel'
        ]);

        $this->emit('reloadPage');
    }

    public function savePhone()
    {
        $this->validateOnly('phoneModel');
        $this->deployment->contacts()->save(new IptbmDeploymentAdoptorContact([
            'type' => 'phone',
            'contact' => $this->phoneModel
        ]));
        $this->deployment->save();
        $this->reset('phoneModel');
        $this->resetValidation([
            'phoneModel'
        ]);

        $this->emit('reloadPage');
    }

    public function saveFax()
    {
        $this->validateOnly('faxModel');
        $this->deployment->contacts()->save(new IptbmDeploymentAdoptorContact([
            'type' => 'fax',
            'contact' => $this->faxModel
        ]));
        $this->deployment->save();
        $this->reset('faxModel');
        $this->resetValidation([
            'faxModel'
        ]);

        $this->emit('reloadPage');
    }

    public function saveEmail()
    {
        $this->validateOnly('emailModel');
        $this->deployment->contacts()->save(new IptbmDeploymentAdoptorContact([
            'type' => 'email',
            'contact' => $this->emailModel
        ]));
        $this->deployment->save();
        $this->reset('emailModel');
        $this->resetValidation([
            'emailModel'
        ]);

        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'adopterName' => [
                'required',
            ],
            'adopterAddress' => [
                'required',
            ],
            'mobileModel' => [
                'required',
                'numeric',
                'digits:11',
                new MaxContact(
                    3,
                    'iptbm_deployment_adoptor_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'deployment_adopters_id',
                    $this->deployment->id,
                    'Mobile number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_deployment_adoptor_contacts', 'contact')
                    ->where('deployment_adopters_id', $this->deployment->id)
            ],
            'phoneModel' => [
                'required',
                'numeric',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_deployment_adoptor_contacts',
                    'contact',
                    'type',
                    'phone',
                    'deployment_adopters_id',
                    $this->deployment->id,
                    'Phone number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_deployment_adoptor_contacts', 'contact')
                    ->where('deployment_adopters_id', $this->deployment->id)
            ],
            'faxModel' => [
                'required',
                'numeric',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_deployment_adoptor_contacts',
                    'contact',
                    'type',
                    'fax',
                    'deployment_adopters_id',
                    $this->deployment->id,
                    'Fax number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_deployment_adoptor_contacts', 'contact')
                    ->where('deployment_adopters_id', $this->deployment->id)
            ],
            'emailModel' => [
                'required',
                'email',
                'max:60',
                new MaxContact(
                    3,
                    'iptbm_deployment_adoptor_contacts',
                    'contact',
                    'type',
                    'email',
                    'deployment_adopters_id',
                    $this->deployment->id,
                    'Email was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_deployment_adoptor_contacts', 'contact')
                    ->where('deployment_adopters_id', $this->deployment->id)
            ],
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function loadData()
    {
        $this->deployment->refresh();
        $this->deploymentContact = $this->deployment->contacts;
    }


    public function toggleAdopterNameForm()
    {
        $this->showAdopterNameForm = !$this->showAdopterNameForm;

        $this->resetValidation('adopterName');
        $this->reset('adopterName');
        $this->adopterName = $this->deployment->adoptor_name;
    }

    public function toggleAdopterAddressForm()
    {
        $this->showAdopterAddressForm = !$this->showAdopterAddressForm;

        $this->resetValidation('adopterAddress');
        $this->reset('adopterAddress');
        $this->adopterAddress = $this->deployment->address;

    }


    public function saveAdopterName()
    {
        $this->validateOnly('adopterName');
        $this->deployment->adoptor_name = $this->adopterName;
        $this->deployment->save();
        session()->flash('adopterName', 'Technology Adopter updated successfully');
    }


    public function saveAdopterAddress()
    {
        $this->validateOnly('adopterAddress');
        $this->deployment->address = $this->adopterAddress;
        $this->deployment->save();
        session()->flash('adopterAddress', 'Technology Adopter updated successfully');

    }

    public function mount($deployment)
    {
        $this->deployment = $deployment;
        $this->adopterName = $deployment->adoptor_name;
        $this->adopterAddress = $deployment->address;
        $this->deploymentContact = $deployment->contacts;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.deployment.deployment-tech-details');
    }
}
