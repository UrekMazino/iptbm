<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmTechResearchFunder;
use App\Models\iptbm\IptbmTechResearchProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;


class TechResearch extends Component
{

    public $researchTitle;
    public $fundingAgency;
    public $fundingAgencyModel;

    public $amountInvested;

    public $technology;

    public $agencies;


    // if new agency is added

    public $newAgencyName;
    public $newAddress;
    public $newHead;
    public $newDesignation;

    /*
     *    public function rules()
       {
           return [
               'researchTitle'=>'required|min:5|unique:iptbm_tech_research_projects,title',
               'fundingAgency'=>'required|min:5',
               'amountInvested'=>'required|integer|min:1',
           ];
       }
     */
    public $showExistingAgencies = true;
    public $techResearchProject;
    public $showTechResearchProjectForm = false;
    protected $validationAttributes = [
        'researchTitle' => 'Research Title',
        'fundingAgency' => 'Funding Agency',
        'amountInvested' => 'Amount Invested'
    ];

    public function toggleShowExistingAgencies()
    {
        $this->showExistingAgencies = !$this->showExistingAgencies;
    }

    public function showTechResearchProjectForm()
    {
        $this->showTechResearchProjectForm = !$this->showTechResearchProjectForm;
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function saveResearchProject()
    {
        $this->validate();
        if ($this->showExistingAgencies) {
            $research = new IptbmTechResearchProject([
                'title' => $this->researchTitle,
                'amount' => $this->amountInvested,
            ]);
            $this->technology->researchprojects()->save($research);
            $research->funder()->save(new IptbmTechResearchFunder([
                'iptbm_agencies_id' => $this->fundingAgencyModel
            ]));
            $this->technology->save();
            $this->techResearchProject = $this->technology->researchprojects;
            $this->emit('reloadPage');
        } else {
            $region = Auth::user()->profile->region;

            $agency = new IptbmAgency([
                'name' => $this->newAgencyName,
                'address' => $this->newAddress,
            ]);
            $region->agencies()->save($agency);
            $agency->head()->save(new AgencyHead([
                'head' => $this->newHead,
                'designation' => $this->newDesignation,
            ]));
            $research = new IptbmTechResearchProject([
                'title' => $this->researchTitle,
                'amount' => $this->amountInvested,
            ]);
            $this->technology->researchprojects()->save($research);
            $research->funder()->save(new IptbmTechResearchFunder([
                'iptbm_agencies_id' => $agency->id
            ]));
            $this->technology->save();
            $this->emit('reloadPage');
        }


    }

    public function mount($technology)
    {
        $this->technology = $technology;
        $this->techResearchProject = $technology->researchprojects;
        $this->agencies = IptbmAgency::pluck('name');

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-research');
    }

    protected function rules()
    {

        if ($this->showExistingAgencies) {
            $agencyId = IptbmAgency::where('name', $this->fundingAgency)->first();
            if ($agencyId) {
                $this->fundingAgencyModel = $agencyId->id;
            }
            return [
                'researchTitle' => 'required|min:5|unique:iptbm_tech_research_projects,title',
                'fundingAgency' => 'required|min:5|exists:iptbm_agencies,name',
                'fundingAgencyModel' => 'exists:iptbm_agencies,id',
                'amountInvested' => 'required|integer|min:1'
            ];
        } else {
            return [
                'researchTitle' => 'required|min:5|unique:iptbm_tech_research_projects,title',
                'newAgencyName' => [
                    'required',
                    Rule::unique(IptbmAgency::class, 'name')
                ],
                'newAddress' => 'required',
                'newHead' => 'required',
                'newDesignation' => 'required',
                'amountInvested' => 'required|integer|min:1',
            ];
        }

    }
}
