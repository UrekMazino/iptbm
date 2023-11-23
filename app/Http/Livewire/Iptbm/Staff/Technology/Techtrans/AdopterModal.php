<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Techtrans;

use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdopterModal extends Component
{

    public $modalName;
    public $technology;

    public $techId;

    public $companyName;
    public $companyAddress;
    public $companyDescription;

    public $businessStructure;
    public $businessRegistration;

    public $technologyAquisition;

    public $forIncubation;

    public function saveAdopterForm()
    {
        $this->validate();
        $this->validate();


        $commercial = new  IptbmCommercializationAdopter([
            'technology_id' => $this->technology->id,
            'address' => $this->companyAddress,
            'company_name' => $this->companyName,
            'company_description' => $this->companyDescription,
            'business_structures' => $this->businessStructure,
            'business_registration' => $this->businessRegistration,
            'acquisition_model' => $this->technologyAquisition,
            'for_incubation' => $this->forIncubation
        ]);
        $this->technology->commercial_adopters()->save($commercial);
        return redirect()->route("iptbm.staff.commercialization.adoptedTech", [
            'id' => $commercial->id
        ]);
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return [
            'techId' => [
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',
                    'iptbm_deployment_pathways' => 'technology_id',
                ], 'Technology', "Unable to add technologies that are already in deployment and extension pathways.")
            ],
            'companyName' => [
                'required',
                'min:5',
                Rule::unique(IptbmCommercializationAdopter::class, 'company_name')->where('technology_id', $this->technology->id)
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

    public function mount($modalName, $technology)
    {
        $this->modalName = $modalName;
        $this->technology = $technology;
        $this->techId = $technology->id;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.techtrans.adopter-modal');
    }
}
