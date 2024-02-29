<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\Models\iptbm\IptbmCommercializationAdopter;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAdopterDetails extends Component
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
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.techtrans.commercialization-pathway.abh-adopter-details')
            ->with([
                'technology'=>$this->adopter->technology
            ])
            ->layout(AbhAdminApp::class);
    }
}
