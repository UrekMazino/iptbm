<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\InventorAgencyAffiliation;
use App\Models\iptbm\IptbmInventor;
use App\Models\iptbm\IptbmRegion;
use App\Models\iptbm\IptbmTechInventor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TechInventor extends Component
{

    public $technology;
    public $inventors;

    public $inventorId;

    public $regionFilter;
    public $agencyFilter = [];
    public $regionModel;
    public $agencyModel;

    public $techInventor;

    public $technologyInventors;
    public $dateAffiliated;
    public $showTechInventorForm = false;

    /*
     *   public function filterRegion()
      {
          $this->agencyModel=null;
          $this->inventors=[];
          if(!$this->regionModel)
          {
              $this->inventors = IptbmInventor::all();
              $this->agencyFilter=[];
          }else{
              $this->agencyFilter=IptbmAgency::where('iptbm_region_id',$this->regionModel)->get();
              $this->inventors =[];
          }

      }
      public function filterAgency()
      {
          $this->inventors = IptbmInventor::with('agency_name')
              ->whereHas('agency_name', function ($query) {
                  $query->where('id', $this->agencyModel);
              })->get();
      }
     */
    protected $listeners = [
        'updateAgency',
    ];

    public function toggleTechInventorForm()
    {
        $this->showTechInventorForm = !$this->showTechInventorForm;
        $this->resetValidation(['techInventor']);
        $this->reset('techInventor');
        $this->reset('inventorId');
    }

    public function deleteTechInventor($id)
    {
        $tech = IptbmTechInventor::find($id);
        $tech->delete();
        $this->emit('reloadPage');
    }


    public function saveInventor()
    {


        $this->validate();

        $this->technology->techgenerators()->save(new IptbmTechInventor([
            'iptbm_inventors_id' => $this->inventorId
        ]));
        $inventor = IptbmInventor::with('latest_agency_affiliation')->find($this->inventorId);
        $inventor->latest_agency_affiliation()->save(new InventorAgencyAffiliation([
            'latest_agency' => Auth::user()->profile->agency->name,
            'date_affiliated' => Carbon::parse($this->dateAffiliated)->format('Y-n-j')
        ]));


        $this->technology->save();
        $this->technology->refresh();
        $this->technologyInventors = $this->technology->techgenerators;
        $this->emit('reloadPage');

    }

    public function rules()
    {
        $techInvent = explode(')', $this->techInventor)[0];

        $invent = IptbmInventor::find($techInvent);
        if ($invent) {
            $this->inventorId = $invent->id;

        }

        return [
            'techInventor' => [
                'required',
                'exists:iptbm_inventors,id'
            ],
            'inventorId' => [
                'exists:iptbm_inventors,id',
                Rule::unique(IptbmTechInventor::class, 'iptbm_inventors_id')->where('iptbm_technology_id', $this->technology->id)
            ],
            'dateAffiliated' => [
                'required',
            ]

        ];
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($technology)
    {
        $this->technology = $technology;
        $this->inventors = IptbmInventor::with('agency_name')->get();
        $this->regionFilter = IptbmRegion::all();
        $this->technologyInventors = $this->technology->techgenerators;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-inventor');
    }
}
