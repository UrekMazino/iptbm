<?php

namespace App\Http\Livewire\Iptbm\Staff\Adopter;

use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Rules\iptbm\ValueExistsInTable;
use Livewire\Component;

class AddAdopterTech extends Component
{
    public $technologies;
    public $techId;
    public $techName;
    public $companyName;
    public $companyAddress;
    public $companyDescription;

    public $businessStructure;
    public $businessRegistration;

    public $technologyAquisition;

    public $forIncubation;


    public function rules()
    {
        $tech = IptbmTechnologyProfile::where("title", $this->techName)->first();
        if ($tech) {
            $this->techId = $tech->id;
        }


        return [
            'techName' => [
                'required',
                'exists:iptbm_technology_profiles,title'
            ],
            'techId' => [
                //'unique:iptbm_adopter_pathways,technology_id',
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',
                    //  'iptbm_ip_alerts' => 'technology_id',
                    //  'iptbm_commercialization_precoms' => 'technology_id',
                    //  'iptbm_commercialization_adopters' => 'technology_id',
                ], 'Technology', "Technology is currently under in different pathways.")
            ],
            'companyName' => [
                'required',
                'min:5'
            ],
            'companyAddress' => [
                'required',
                'min:10'
            ],
            'companyDescription' => [
                'required',
                'min:10'
            ],
            'businessStructure' => [
                'required'
            ],
            'businessRegistration' => [
                'required',
            ],
            'technologyAquisition' => [
                'required'
            ],
            'forIncubation' => [
                'required',
                'boolean'
            ]
        ];
    }


    public function saveForm()
    {
        $this->validate();
        $technology = IptbmTechnologyProfile::where('title', $this->techName)->first();

        IptbmCommercializationAdopter::create([
            'technology_id' => $technology->id,
            'company_name' => $this->companyName,
            'company_description' => $this->companyDescription,
            'business_structures' => $this->businessStructure,
            'business_registration' => $this->businessRegistration,
            'acquisition_model' => $this->technologyAquisition,
            'for_incubation' => $this->forIncubation
        ]);
        $this->emit('reloadPage');

    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($technologies)
    {
        $this->technologies = $technologies;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.adopter.add-adopter-tech');
    }
}
