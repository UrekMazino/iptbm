<?php

namespace App\Http\Livewire\Iptbm\Staff\Extension;

use App\Models\iptbm\IptbmExtensionAdoptorContact;
use App\Models\iptbm\IptbmExtensionPathway;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ExtensionTechDetails extends Component
{
    public $extension;
    public $extensionContact;

    public $adopterName;
    public $adopterAddress;

    public $showAdopterNameForm=false;
    public $showAdopterAddressForm=false;


    public $showMobileForm=false;
    public $showPhoneForm=false;
    public $showFaxForm=false;
    public $showEmailForm=false;


    public $mobileModel;
    public $phoneModel;
    public $faxModel;
    public $emailModel;
    public function toggleShowMobileForm()
    {
        $this->showMobileForm=!$this->showMobileForm;
        $this->reset('mobileModel');
        $this->resetValidation([
            'mobileModel'
        ]);
    }
    public function toggleShowPhoneForm()
    {
        $this->showPhoneForm=!$this->showPhoneForm;
        $this->reset('phoneModel');
        $this->resetValidation([
            'phoneModel'
        ]);
    }

    public function toggleShowFaxForm()
    {
        $this->showFaxForm=!$this->showFaxForm;
        $this->reset('faxModel');
        $this->resetValidation([
            'faxModel'
        ]);
    }

    public function toggleShowEmailForm()
    {
        $this->showEmailForm=!$this->showEmailForm;
        $this->reset('emailModel');
        $this->resetValidation([
            'emailModel'
        ]);
    }

    public function saveMobile()
    {
        $this->validateOnly('mobileModel');
        $this->extension->contacts()->save(new IptbmExtensionAdoptorContact([
            'type' => 'mobile',
            'contact'=>$this->mobileModel
        ]));
        $this->extension->save();
        $this->reset('mobileModel');
        $this->resetValidation([
            'mobileModel'
        ]);

        $this->emit('reloadPage');
    }
    public function savePhone()
    {
        $this->validateOnly('phoneModel');
        $this->extension->contacts()->save(new IptbmExtensionAdoptorContact([
            'type' => 'phone',
            'contact'=>$this->phoneModel
        ]));
        $this->extension->save();
        $this->reset('phoneModel');
        $this->resetValidation([
            'phoneModel'
        ]);

        $this->emit('reloadPage');
    }

    public function saveFax()
    {
        $this->validateOnly('faxModel');
        $this->extension->contacts()->save(new IptbmExtensionAdoptorContact([
            'type' => 'fax',
            'contact'=>$this->faxModel
        ]));
        $this->extension->save();
        $this->reset('faxModel');
        $this->resetValidation([
            'faxModel'
        ]);

        $this->emit('reloadPage');
    }
    public function saveEmail()
    {
        $this->validateOnly('emailModel');
        $this->extension->contacts()->save(new IptbmExtensionAdoptorContact([
            'type' => 'email',
            'contact'=>$this->emailModel
        ]));
        $this->extension->save();
        $this->reset('emailModel');
        $this->resetValidation([
            'emailModel'
        ]);

        $this->emit('reloadPage');
    }



    public function rules()
    {
        return[
            'adopterName'=>[
                'required',
            ],
            'adopterAddress'=>[
                'required',
            ],
            'mobileModel'=>[
                'required',
                'numeric',
                'digits:11',
                Rule::unique('iptbm_extension_adoptor_contacts','contact')
                    ->where('extension_adoptor_id',$this->extension->id)
            ],
            'phoneModel'=>[
                'required',
                'numeric',
                'min_digits:6',
                'max_digits:8',
                Rule::unique('iptbm_extension_adoptor_contacts','contact')
                    ->where('extension_adoptor_id',$this->extension->id)
            ],
            'faxModel'=>[
                'required',
                'numeric',
                'min_digits:6',
                'max_digits:8',
                Rule::unique('iptbm_extension_adoptor_contacts','contact')
                    ->where('extension_adoptor_id',$this->extension->id)
            ],
            'emailModel'=>[
                'required',
                'email',
                Rule::unique('iptbm_extension_adoptor_contacts','contact')
                    ->where('extension_adoptor_id',$this->extension->id)
            ],
        ];
    }

protected $validationAttributes =[
    'mobileModel'=>'Mobile number'
];

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public $listeners=['loadData'];

    public function loadData()
    {
        $this->extension->refresh();
        $this->extensionContact=$this->extension->contacts;
    }


    public function toggleAdopterNameForm()
    {
        $this->showAdopterNameForm=!$this->showAdopterNameForm;

        $this->resetValidation('adopterName');
        $this->reset('adopterName');
        $this->adopterName=$this->extension->adoptor_name;
    }

    public function toggleAdopterAddressForm()
    {
        $this->showAdopterAddressForm=!$this->showAdopterAddressForm;

        $this->resetValidation('adopterAddress');
        $this->reset('adopterAddress');
        $this->adopterAddress=$this->extension->address;

    }


    public function saveAdopterName()
    {
        $this->validateOnly('adopterName');
        $this->extension->adoptor_name=$this->adopterName;
        $this->extension->save();
        session()->flash('adopterName', 'Technology Adopter updated successfully');
    }


    public function saveAdopterAddress()
    {
        $this->validateOnly('adopterAddress');
        $this->extension->address=$this->adopterAddress;
        $this->extension->save();
        session()->flash('adopterAddress', 'Technology Adopter updated successfully');

    }

    public function mount($extension)
    {
        $this->extension=$extension;
        $this->adopterName=$extension->adoptor_name;
        $this->adopterAddress=$extension->address;
        $this->extensionContact=$extension->contacts;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.extension.extension-tech-details');
    }
}
