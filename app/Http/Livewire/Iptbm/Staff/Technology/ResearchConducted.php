<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmResearchIndustryPartner;
use App\Models\iptbm\IptbmTechResearchFunder;
use Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ResearchConducted extends Component
{


    public $agencyId;
    public $agencies;
    public $region;
    public $project;
    public $title;
    public $fundingAgency;
    public $fund;

    public $researchPartner;

    public $partner;
    public $address;
    public $funders;
    public $partnerMobile;
    public $partnerPhone;
    public $partnerFax;
    public $partnerEmail;


    public $newAgencyModel;
    public $newAddressModel;
    public $newHeadModel;
    public $newDesignationModel;


    public $agencyModel;


    public $showPartnerForm = false;


    public function addAgencyFunder()
    {
        $this->validateOnly('agencyModel');
        $this->project->funder()->save(new IptbmTechResearchFunder([
            'iptbm_agencies_id' => $this->agencyId
        ]));
        $this->emit('reloadPage');
    }

    public function addNewFundeingAgency()
    {
        $this->validateOnly('newAgencyModel');
        $this->validateOnly('newAddressModel');
        $this->validateOnly('newHeadModel');
        $this->validateOnly('newDesignationModel');
        $agency = new IptbmAgency([
            'name' => $this->newAgencyModel,
            'address' => $this->newAddressModel,
        ]);
        $this->region->agencies()->save($agency);
        $agency->head()->save(new AgencyHead([
            'head' => $this->newHeadModel,
            'designation' => $this->newDesignationModel,
        ]));
        $this->project->funder()->save(new IptbmTechResearchFunder([
            'iptbm_agencies_id' => $agency->id
        ]));
        $this->emit('reloadPage');

    }

    public function rules()
    {
        $Id = IptbmAgency::where('name', $this->agencyModel)->first();
        if ($Id) {
            $this->agencyId = $Id->id;
        }
        return [
            'partner' => [
                'required',
                Rule::unique(IptbmResearchIndustryPartner::class, 'industry_name')->where('iptbm_tech_project_id', $this->project->id),
                'min:3',
            ],
            'address' => 'required|min:5',
            'partnerMobile' => 'nullable',
            'partnerPhone' => 'nullable',
            'partnerFax' => 'nullable',
            'partnerEmail' => 'nullable|email',
            'newAgencyModel' => [
                'required',
                Rule::unique(IptbmAgency::class, 'name')
            ],
            'newAddressModel' => 'required',
            'newHeadModel' => 'required',
            'newDesignationModel' => 'required',
            'agencyModel' => [
                'required',
                'exists:iptbm_agencies,name',
            ],
            'agencyId' => 'required|unique:iptbm_tech_research_funders,iptbm_agencies_id'

        ];
    }

    public function togglePartnerForm()
    {
        $this->showPartnerForm = !$this->showPartnerForm;
        $this->resetValidation();
        $this->reset('partner', 'address');
    }

    public function savePartner()
    {

        $this->validateOnly('partner');
        $this->validateOnly('address');
        $this->validateOnly('partnerMobile');
        $this->validateOnly('partnerPhone');
        $this->validateOnly('partnerFax');
        $this->validateOnly('partnerEmail');
        $this->project->researchpartners()->save(new IptbmResearchIndustryPartner([
            'industry_name' => $this->partner,
            'address' => $this->address,
            'phone' => $this->partnerPhone,
            'mobile' => $this->partnerMobile,
            'fax' => $this->partnerFax,
            'email' => $this->partnerEmail
        ]));
        $this->project->save();
        $this->emit('reloadPage');
    }

    public function mount($project)
    {
        $this->project = $project;
        $this->researchPartner = $this->project->researchpartners;
        $this->title = $project->title;
        $this->fundingAgency = $project->agency_name;
        $this->fund = number_format($project->amount, 2);
        $this->funders = $project->funder;
        $this->agencies = IptbmAgency::all();
        $this->region = Auth::user()->profile->region;
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function deleteResearch()
    {

        $this->project->delete();
        $this->emit('reloadPage');
    }


    public function render()
    {
        return view('livewire.iptbm.staff.technology.research-conducted');
    }
}
