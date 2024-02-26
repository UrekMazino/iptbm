<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmPrecomTechVideo;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class AbhTechnologyDetailPage extends Component
{

    public $application;

    public $new_tech_title;
    public $tech_id;



    public $companyName;
    public $companyAddress;
    public $companyDescription;

    public $businessStructure;
    public $businessRegistration;

    public $technologyAquisition;

    public $forIncubation;

    public function saveFormAdopter()
    {
        $this->validate([
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
        ]);


        $adopter=IptbmCommercializationAdopter::create([
            'technology_id' =>$this->application->technology->id,
            'company_name' => $this->companyName,
            'address'=>$this->companyAddress,
            'company_description' => $this->companyDescription,
            'business_structures' => $this->businessStructure,
            'business_registration' => $this->businessRegistration,
            'acquisition_model' => $this->technologyAquisition,
            'for_incubation' => $this->forIncubation
        ]);
        redirect()->route('abh.staff.commercialization.adopter.details',['adopter'=>$adopter]);

    }

    public function save_Precom()
    {
        if($this->new_tech_title)
        {
            $this->validateOnly('new_tech_title');
        }else{
            $this->validate([
                'tech_id'=>[
                    'required',
                    'unique:iptbm_commercialization_precoms,technology_id'
                ]
            ]);
        }
        $precom=IptbmCommercializationPrecom::create([
            'technology_id' => $this->application->technology->id,
            'pre_com_tech_name' => $this->new_tech_title
        ]);
     //   $precom->video()->save(new IptbmPrecomTechVideo([]));

        $this->emit('reloadPage');
    }


    public function rules()
    {
        return [
            'new_tech_title'=>[
                'nullable',
                'max:150',
                'unique:iptbm_commercialization_precoms,pre_com_tech_name'
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
    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount(IptbmIpAlert $application)
    {
        $this->application = $application;
        $this->tech_id=$application->technology->id;

    }
    public function render()
    {

        return view('livewire.abh.pages.technology.abh-technology-detail-page')
            ->with(['technology' => $this->application->technology])
            ->layout(AbhLayout::class,[
                'pagetitle'=>'Technology'
            ]);
    }
}
