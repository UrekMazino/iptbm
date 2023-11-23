<?php

namespace App\Http\Livewire\Iptbm\Staff\Adopter;

use Livewire\Component;
use This;

class EditDetails extends Component
{

    public $tech;


    public $compAddress;
    public $showCmpAddress = false;
    public $compName;
    public $showCompName = false;
    public $compDescription;
    public $showCompDescription = false;
    public $businessStructure;
    public $showBusinessStructure = false;
    public $businessRegistration;
    public $showBusinessRegistration = false;
    public $techAcquisition;
    public $showTechAcquisition = false;
    public $commercialForIncubation;
    public $showCommercialForIncubation = false;

    public function toggleShowCompAddress()
    {
        $this->showCmpAddress = !$this->showCmpAddress;
        $this->resetValidation(['compAddress']);
        $this->compAddress = $this->tech->address;
    }

    public function saveCompAddress()
    {
        $this->validateOnly('compAddress');
        $this->tech->address = $this->compAddress;
        $this->tech->save();
        session()->flash('saveCompAddress', "Company address updated..");
    }

    public function toggleShowCompName()
    {
        $this->showCompName = !$this->showCompName;
        $this->resetValidation(['compName']);
        $this->compName = $this->tech->company_name;
    }

    public function saveCompName()
    {
        $this->validateOnly('compName');
        $this->tech->company_name = $this->compName;
        $this->tech->save();
        session()->flash('saveComp', "Company name updated..");
    }

    public function toggleShowCompDescription()
    {
        $this->showCompDescription = !$this->showCompDescription;
        $this->resetValidation(['compDescription']);
        $this->compDescription = $this->tech->company_description;
    }

    public function saveCompDescription()
    {
        $this->validateOnly('compDescription');
        $this->tech->company_description = $this->compDescription;
        $this->tech->save();
        session()->flash('saveCompDesc', "Company description updated..");
    }

    public function toggleShowBusinessStructure()
    {
        $this->showBusinessStructure = !$this->showBusinessStructure;
        $this->resetValidation(['businessStructure']);
        $this->businessStructure = $this->tech->business_structures;
    }

    public function saveBusinessStructure()
    {
        $this->validateOnly('businessStructure');
        $this->tech->business_structures = $this->businessStructure;
        $this->tech->save();
        session()->flash('saveBbusinessStructure', "Business updated..");
    }

    public function toggleShowBusinessRegistration()
    {
        $this->showBusinessRegistration = !$this->showBusinessRegistration;
        $this->resetValidation(['businessRegistration']);
        $this->businessRegistration = $this->tech->business_registration;
    }

    public function saveBusinessRegistration()
    {
        $this->validateOnly('businessRegistration');
        $this->tech->business_registration = $this->businessRegistration;
        $this->tech->save();
        session()->flash('saveBusinessRegistration', "BusinessRegistration updated..");
    }

    public function toggleShowTechAcquisition()
    {
        $this->showTechAcquisition = !$this->showTechAcquisition;
        $this->resetValidation(['techAcquisition']);
        $this->techAcquisition = $this->tech->acquisition_model;
    }

    public function saveTechAcquisition()
    {
        $this->validateOnly('techAcquisition');
        $this->tech->acquisition_model = $this->techAcquisition;
        $this->tech->save();
        session()->flash('saveTechAcquisition', "Mode of Technology Acquisition updated..");
    }

    public function toggleShowCommercialForIncubation()
    {
        $this->showCommercialForIncubation = !$this->showCommercialForIncubation;
        $this->resetValidation(['commercialForIncubation']);
        $this->commercialForIncubation = $this->tech->for_incubation;
    }

    public function saveCommercialForIncubation()
    {
        $this->validateOnly('commercialForIncubation');
        $this->tech->for_incubation = $this->commercialForIncubation;
        $this->tech->save();
        session()->flash('saveComForIncubate', "Success..");
    }


    public function mount($tech)
    {
        $this->tech = $tech;
        $this->compName = $tech->company_name;
        $this->compAddress = $tech->address;
        $this->compDescription = $tech->company_description;
        $this->businessStructure = $tech->business_structures;
        $this->businessRegistration = $tech->business_registration;
        $this->techAcquisition = $tech->acquisition_model;
        $this->commercialForIncubation = $tech->for_incubation;
    }

    public function rules()
    {
        return [
            'compName' => 'required|min:5',
            'compAddress' => 'required|min:5',
            'compDescription' => 'required|min:20',
            'businessStructure' => [
                'required',
                'in:Sole Proprietorship,Corporation,Partnership,Coop'
            ],
            'businessRegistration' => [
                'required',
                'in:Sole Not yet registered,SEC-registered,DTI-registered'
            ],
            'commercialForIncubation' => [
                'required',
                'boolean'
            ]
        ];
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function render()
    {
        return view('livewire.iptbm.staff.adopter.edit-details');
    }
}
