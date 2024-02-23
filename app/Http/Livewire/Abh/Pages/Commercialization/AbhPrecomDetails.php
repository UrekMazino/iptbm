<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmPrecomBusinessPlan;
use App\Models\iptbm\IptbmPrecomMarketStudy;
use App\View\Components\abh\AbhLayout;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AbhPrecomDetails extends Component
{
    use WithFileUploads;

    public $precom_tech;

    public $market_study_files;
    public $market_study_descriptions;
    public function saveMarketStudyFile(): void
    {
        $this->validateOnly('market_study_descriptions');
        $this->validateOnly('market_study_descriptions');
        $path = $this->market_study_files->store('public/precom-attachement');
        $this->precom_tech->market_study_files()->save(new IptbmPrecomMarketStudy([
            'description'=>$this->market_study_descriptions,
            'file_type'=>$this->market_study_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function rules()
    {
        return[
            'market_study_files'=> 'required|mimes:pdf,png,jpeg|max:20000',
            'market_study_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomBusinessPlan::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount(IptbmCommercializationPrecom $precom): void
    {
        $this->precom_tech = $precom->load(
            'technology',
            'video',
            'modes',
            'market_study_files',
            'valuation_summary_files',
            'freedom_summary_files',
            'term_sheet_files',
            'license_agreement_copies',
            'financial_annalysis',
            'testing_certification',
            'feasibility_studies',
            'business_plan',
            'opinion_report');
    }
    public function render()
    {
        return view('livewire.abh.pages.commercialization.abh-precom-details')
            ->with([
                'technology' =>$this->precom_tech->technology
            ])
            ->layout(AbhLayout::class);
    }
}
