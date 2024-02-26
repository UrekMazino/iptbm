<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmComercialAdopterContact;
use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Rules\iptbm\MaxContact;
use App\View\Components\abh\AbhLayout;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ComerAdopterDetail extends Component
{
    public $adopter;

    public $compAddress;
    public $compName;
    public $compDescription;
    public $businessStructure;
    public $businessRegistration;
    public $techAcquisition;
    public $commercialForIncubation;



    public $mobiles;
    public $mobileModel;

    public $phones;
    public $phoneModel;

    public $faxs;
    public $faxModel;

    public $emails;
    public $emailModel;



    public function saveMobile()
    {
        $this->validateOnly('mobileModel');
        $this->adopter->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'mobile',
            'contact' => $this->mobileModel
        ]));
        $this->emit('reloadPage');
    }



    public function savePhone()
    {
        $this->validateOnly('phoneModel');
        $this->adopter->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'phone',
            'contact' => $this->phoneModel
        ]));
        $this->emit('reloadPage');
    }



    public function saveFax()
    {
        $this->validateOnly('faxModel');
        $this->adopter->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'fax',
            'contact' => $this->faxModel
        ]));
        $this->emit('reloadPage');
    }



    public function saveEmail()
    {
        $this->validateOnly('emailModel');
        $this->adopter->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'email',
            'contact' => $this->emailModel
        ]));
        $this->emit('reloadPage');
    }




    public function saveCompAddress()
    {
        $this->validateOnly('compAddress');
        $this->adopter->address = $this->compAddress;
        $this->adopter->save();
        session()->flash('saveCompAddress', "Company address updated..");
    }



    public function saveCompName()
    {
        $this->validateOnly('compName');
        $this->adopter->company_name = $this->compName;
        $this->adopter->save();
        session()->flash('saveComp', "Company name updated..");
    }



    public function saveCompDescription()
    {
        $this->validateOnly('compDescription');
        $this->adopter->company_description = $this->compDescription;
        $this->adopter->save();
        session()->flash('saveCompDesc', "Company description updated..");
    }



    public function saveBusinessStructure()
    {
        $this->validateOnly('businessStructure');
        $this->adopter->business_structures = $this->businessStructure;
        $this->adopter->save();
        session()->flash('saveBbusinessStructure', "Business updated..");
    }



    public function saveBusinessRegistration()
    {
        $this->validateOnly('businessRegistration');
        $this->adopter->business_registration = $this->businessRegistration;
        $this->adopter->save();
        session()->flash('saveBusinessRegistration', "BusinessRegistration updated..");
    }



    public function saveTechAcquisition()
    {
        $this->validateOnly('techAcquisition');
        $this->adopter->acquisition_model = $this->techAcquisition;
        $this->adopter->save();
        session()->flash('saveTechAcquisition', "Mode of Technology Acquisition updated..");
    }


    public function saveCommercialForIncubation()
    {
        $this->validateOnly('commercialForIncubation');
        $this->adopter->for_incubation = $this->commercialForIncubation;
        $this->adopter->save();
        session()->flash('saveComForIncubate', "Success..");
    }
    public function rules()
    {
        return [
            'compName' => 'required|max:100',
            'compAddress' => 'required|max:100',
            'compDescription' => 'required|max:200',

            'businessStructure' => [
                'required',
                'in:Sole Proprietorship,Corporation,Partnership,Coop'
            ],

            'businessRegistration' => [
                'required',
                'in:Not yet registered,SEC-registered,DTI-registered'
            ],

            'commercialForIncubation' => [
                'required',
                'boolean'
            ],

            'mobileModel' => [
                'required',
                'digits:11',

                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'commercial_adoptor_id',
                    $this->adopter->id,
                    'Mobile number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->adopter->id)
            ],
            'phoneModel' => [
                'required',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'phone',
                    'commercial_adoptor_id',
                    $this->adopter->id,
                    'Phone number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->adopter->id)
            ],
            'faxModel' => [
                'required',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'fax',
                    'commercial_adoptor_id',
                    $this->adopter->id,
                    'Fax number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->adopter->id)
            ],
            'emailModel' => [
                'required',
                'email',
                'max:60',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'email',
                    'commercial_adoptor_id',
                    $this->adopter->id,
                    'Email was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->adopter->id)
            ]
        ];
    }
    public function mount(IptbmCommercializationAdopter $adopter): void
    {
        $this->adopter=$adopter;
        $this->compName = $adopter->company_name;
        $this->compAddress = $adopter->address;
        $this->compDescription = $adopter->company_description;
        $this->businessStructure = $adopter->business_structures;
        $this->businessRegistration = $adopter->business_registration;
        $this->techAcquisition = $adopter->acquisition_model;
        $this->commercialForIncubation = $adopter->for_incubation;


        $this->mobiles = $adopter->contacts->where('type', 'mobile');
        $this->phones = $adopter->contacts->where('type', 'phone');
        $this->faxs = $adopter->contacts->where('type', 'fax');
        $this->emails = $adopter->contacts->where('type', 'email');
    }

    public function render()
    {
        return view('livewire.abh.pages.commercialization.comer-adopter-detail')
            ->with([
                'technology'=>$this->adopter->technology
            ])
            ->layout(AbhLayout::class);
    }
}
