<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Techtrans;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PrecomModal extends Component
{

    public $newTechName;
    public $startingCapital;
    public $cost;
    public $income;
    public $returnOfInvestment;
    public $breakEven;
    public $techId;
    public $technology;
    public $modalName;
    public function savePrecom()
    {
        if(!$this->newTechName)
        {
            $this->validate([
                'techId'=>'unique:iptbm_commercialization_precoms,technology_id'
            ]);
        }
        $this->validate();

        $precom=new IptbmCommercializationPrecom([
            'technology_id'=>$this->technology->id,
            'pre_com_tech_name'=>$this->newTechName,
            'starting_capital'=>$this->startingCapital,
            'return_of_investment'=>$this->returnOfInvestment,
            'breakeven'=>$this->breakEven,
            'estimated_acquisition_cost'=>$this->cost,
            'income_gen_trans'=>$this->income
        ]);
        $this->technology->pre_commercialization()->save($precom);
        return redirect()->route('iptbm.staff.precom.details',['id'=>$precom->id]);
    }
    protected $messages = [
        'techId.unique'=> 'Technology duplication found. Please provide a unique Technology name to prevent duplication.',
    ];
    public function resetForm()
    {
        $this->resetValidation();
        $this->reset(
            'newTechName',
            'startingCapital',
            'cost',
            'income',
            'returnOfInvestment',
            'breakEven'
        );
    }

    public function rules()
    {
        return[
            'newTechName'=>[
                'nullable',
                Rule::unique(IptbmCommercializationPrecom::class,'pre_com_tech_name')
            ],
            'startingCapital'=>[
                'nullable',
                'numeric',
                'min:1'
            ],
            'cost'=>[
                'nullable',
                'numeric',
                'min:1'
            ],
            'income'=>[
                'nullable',
                'numeric',
                'min:1'
            ],
            'returnOfInvestment'=>[
                'nullable',
                'integer'
            ],
            'breakEven'=>[
                'nullable',
                'numeric',
            ],
            'techId'=>[
                new ValueExistsInTable([
                    'iptbm_extension_pathways'=>'technology_id',
                     'iptbm_deployment_pathways' => 'technology_id',
                    //  'iptbm_commercialization_adopters'=>'technology_id',
                    //'iptbm_ip_alerts'=>'technology_id',
                ],'Technology',"Unable to add technologies that are already in deployment and extension pathways.")
            ]

        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount($modalName,$technology)
    {
        $this->modalName=$modalName;
        $this->technology=$technology;
        $this->techId=$technology->id;

    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.techtrans.precom-modal');
    }
}
