<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhAgencyContact;
use App\Models\abh\AbhRegion;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmRegion;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAgencyDetails extends Component
{
    public $agency;
    public $agency_name;
    public $agency_code;

    public $agency_address;

    public $agency_head;
    public $agency_head_designation;

    public $region_model;
    public function save_region(): void
    {
        $region_name=IptbmRegion::where('name',$this->region_model)->first();
        $this->validateOnly('region_model');
        $this->agency->iptbm_region_id=$region_name->id;
        $this->agency->save();
        $this->agency->refresh();
        session()->flash('region_agency','Agency Region updated successfully!');
    }

    public function save_agency_head(): void
    {
        $this->validateOnly('agency_head');
        $this->agency->head=$this->agency_head;
        $this->agency->save();
        session()->flash('agency_head','Agency Head updated successfully!');
    }
    public function save_agency_head_designation(): void
    {
        $this->validateOnly('agency_head_designation');
        $this->agency->designation=$this->agency_head_designation;
        $this->agency->save();
        session()->flash('agency_head_designation','Designation updated successfully!');
    }



    public function save_agency_address()
    {
        $this->validateOnly('agency_address',$this->rules());
        $this->agency->address=$this->agency_address;
        $this->agency->save();
        session()->flash('success_agency_address','Agency Updated Successfully');
    }

    public function save_agency_name_code()
    {


        if($this->agency_name!==$this->agency->name)
        {
            $this->validateOnly('agency_name',$this->rules());
            $this->agency->name=$this->agency_name;
        }
        if($this->agency_code!==$this->agency->code)
        {
            $this->validateOnly('agency_code',$this->rules());
            $this->agency->code=$this->agency_code;
        }


        $this->agency->save();
        session()->flash('success_agency_name','Agency Updated Successfully');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function rules()
    {
        return [
            'agency_name' =>[
                'required',
                'unique:abh_agencies,name',
                'max:100'
            ],
            'agency_code' =>[
                'required',
                'unique:abh_agencies,code',
                'max:10'
            ],
            'agency_address' =>[
                'required',
                'max:100',
            ],
            'agency_head'=>[
                'required',
                'max:100',
            ],
            'agency_head_designation'=>[
                'required',
                'max:100',
            ],
            'region_model'=>[
                'required',
                'exists:abh_regions,name'
            ]

        ];
    }
    public function delete_contact(AbhAgencyContact $contact): void
    {
        $contact->delete();
        $this->emit('reloadPage');

    }

    public function mount(IptbmAgency $agency): void

    {


        $this->agency = $agency->load('contact_mobile','contact_phone','contact_fax','contact_email','abh_profile.users');
        $this->agency_name = $agency->name;
        $this->agency_code = $agency->code;
        $this->agency_address=$this->agency->address;
        $this->agency_head=$agency->head;
        $this->agency_head_designation=$agency->head_designation;

    }

    public function render()
    {
        return view('livewire.abh.admin.pages.updates.abh-agency-details')
            ->with([
                'mobile_contact' => $this->agency->contact_mobile,
                'phone_contact' => $this->agency->contact_phone,
                'fax_contact' => $this->agency->contact_fax,
                'email_contact' => $this->agency->contact_email,
                'users'=>($this->agency->abh_profile)? $this->agency->abh_profile->users:[],
                'regions' => IptbmRegion::all()
            ])
            ->layout(AbhAdminApp::class);
    }
}
