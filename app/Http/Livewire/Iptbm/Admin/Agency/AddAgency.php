<?php

namespace App\Http\Livewire\Iptbm\Admin\Agency;

use App\Models\iptbm\AgencyContact;
use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddAgency extends Component
{

    public $regions;

    public $regionModel;
    public $agencyModel;
    public $addressModel;
    public $agencyHeadModel;
    public $designationModel;

    public $mobileModel;
    public $phoneModel;
    public $faxModel;
    public $emailModel;

    public function saveForm()
    {
        $region=IptbmRegion::where('name',$this->regionModel)->first();
        $agency=new IptbmAgency([
            'name' => $this->agencyModel,
            'address' => $this->addressModel,
        ]);
        $region->agencies()->save($agency);
        $agency->head()->save(new AgencyHead([
            'head'=>$this->agencyHeadModel,
            'designation' => $this->designationModel,
            'email' => $this->emailModel,
            'mobile' => $this->emailModel,
            'fax' => $this->faxModel,
            'tel' => $this->phoneModel
        ]));
        session()->flash('agency', 'New Agency was added successfully');
    }


    public function rules()
    {
        return[
            'regionModel'=>[
                'required',
                'exists:iptbm_regions,name',
            ],
            'agencyModel'=>[
                'required',
                'unique:iptbm_agencies,name'
            ],
            'addressModel'=>'required',
            'agencyHeadModel'=>'required',
            'designationModel'=>'required',
            'mobileModel'=>'nullable|min_digits:11|unique:agency_contacts,contact',
            'phoneModel'=>'nullable|min_digits:7|unique:agency_contacts,contact',
            'faxModel'=>'nullable|min_digits:7|unique:agency_contacts,contact',
            'emailModel'=>'nullable|email'
        ];
    }

    public $messages=[
        'regionModel.exists'=>'Region name does not exist. Please provide a valid region name'
    ];

    public $validationAttributes=[
        'regionModel'=>'Region',
        'agencyModel'=>'Agency',
        'addressModel'=>'Address',
        'agencyHeadModel'=>'Agency Head',
        'designationModel'=>'Designation',
        'mobileModel'=>'Mobile number',
        'phoneModel'=>'Phone number',
        'faxModel'=>'Fax number',
        'emailModel'=>'Email Address'
    ];

    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount()
    {
        $this->regions=IptbmRegion::all();
    }
    public function render()
    {
        return view('livewire.iptbm.admin.agency.add-agency');
    }
}
