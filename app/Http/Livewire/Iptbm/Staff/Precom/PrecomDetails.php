<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use App\Models\iptbm\IptbmPrecomAgreementCopy;
use App\Models\iptbm\IptbmPrecomBusinessPlan;
use App\Models\iptbm\IptbmPrecomFeasibilityStudy;
use App\Models\iptbm\IptbmPrecomFinancialAnnalysis;
use App\Models\iptbm\IptbmPrecomFredOpSummary;
use App\Models\iptbm\IptbmPrecomMarketStudy;
use App\Models\iptbm\IptbmPrecomMode;
use App\Models\iptbm\IptbmPrecomOpinionReport;
use App\Models\iptbm\IptbmPrecomTermSheet;
use App\Models\iptbm\IptbmPrecomTestingCertification;
use App\Models\iptbm\IptbmPrecomValuationSummary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Clue\StreamFilter\fun;

class PrecomDetails extends Component
{
    use WithFileUploads;

    public $precom;


    public $reportModel;


    public function saveFile($model,$sessionName,$dataProps,$fileLocation,$set)
    {
        $this->validateOnly($model);
        $path=$model->store($fileLocation);
        if($this->precom[$dataProps]){
            if(Storage::exists($this->precom[$dataProps])){
                Storage::delete($this->precom[$dataProps]);
            }
        }
        $this->precom[$dataProps]=$path;
        $this->precom->save();
        $set($this->precom[$dataProps]);
        session()->flash($sessionName, 'File successfully updated.');
    }
    public function rules()
    {

        return[
            'marketModelDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomMarketStudy::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'marketModelFile'=>'required|mimes:pdf,png,jpeg|max:20000',


            'valuationDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomValuationSummary::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'valuationFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'freedomDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomValuationSummary::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'freedomFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'termSheetDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomTermSheet::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'termSheetFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'agreementDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomAgreementCopy::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'agreementFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'financialDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomFinancialAnnalysis::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'financialFile'=>'required|mimes:pdf,png,jpeg|max:20000',


            'certificateDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomTestingCertification::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'certificateFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'feasibilityDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomFeasibilityStudy::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'feasibilityFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'businessDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomBusinessPlan::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'businessFile'=>'required|mimes:pdf,png,jpeg|max:20000',

            'reportDescription'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomOpinionReport::class,'iptbm_precoms_id')->where('iptbm_precoms_id',$this->precom->id)
            ],
            'reportFile'=>'required|mimes:pdf,png,jpeg|max:20000',


            'capitalModel'=>'required|min:1|numeric',
            'investmentModel'=>'required|min:1|numeric',
            'breakevenModel'=>'required|min:1|numeric',
            'commercializationModeModel'=>[
                'required',
                'in:Licensing Agreement/s,Outright sale,Joint venture,Start-up,Spin-off',
                Rule::unique(IptbmPrecomMode::class,'commercialization_mode')->where('iptbm_commercialization_precoms_id',$this->precom->id)
            ],
            'costModel'=>'required|min:1|numeric',
            'incomeModel'=>'required|min:1|numeric',
        ];
    }

    public $marketModelDescription;
    public $marketModelFile;

    public function saveMarketModel()
    {
        $this->validateOnly('marketModelDescription');
        $this->validateOnly('marketModelFile');
        $path=$this->marketModelFile->store('public/precom-attachement');
        $this->precom->market_study_files()->save(new IptbmPrecomMarketStudy([
            'description'=>$this->marketModelDescription,
            'file_type'=>$this->marketModelFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public $valuationDescription;
    public $valuationFile;
    public function saveValuationModel()
    {
        $this->validateOnly('valuationDescription');
        $this->validateOnly('valuationFile');
        $path=$this->valuationFile->store('public/precom-attachement');
        $this->precom->valuation_summary_files()->save(new IptbmPrecomValuationSummary([
            'description'=>$this->valuationDescription,
            'file_type'=>$this->valuationFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');

    }


    public $freedomDescription;
    public $freedomFile;
    public function saveFreedomModel()
    {
        $this->validateOnly('freedomDescription');
        $this->validateOnly('freedomFile');
        $path=$this->freedomFile->store('public/precom-attachement');
        $this->precom->valuation_summary_files()->save(new IptbmPrecomFredOpSummary([
            'description'=>$this->freedomDescription,
            'file_type'=>$this->freedomFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');

    }

    public $termSheetDescription;
    public $termSheetFile;
    public function saveTermSheetModel()
    {
        $this->validateOnly('termSheetDescription');
        $this->validateOnly('termSheetFile');
        $path=$this->termSheetFile->store('public/precom-attachement');
        $this->precom->term_sheet_files()->save(new IptbmPrecomTermSheet([
            'description'=>$this->termSheetDescription,
            'file_type'=>$this->termSheetFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }



    public $agreementDescription;
    public $agreementFile;
    public function saveAgreementModel()
    {
        $this->validateOnly('agreementDescription');
        $this->validateOnly('agreementFile');
        $path=$this->agreementFile->store('public/precom-attachement');
        $this->precom->license_agreement_copies()->save(new IptbmPrecomAgreementCopy([
            'description'=>$this->agreementDescription,
            'file_type'=>$this->agreementFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');

    }


    public $financialDescription;
    public $financialFile;


    public function saveFinancialModel()
    {
        $this->validateOnly('financialDescription');
        $this->validateOnly('financialFile');
        $path=$this->financialFile->store('public/precom-attachement');
        $this->precom->financial_annalysis()->save(new IptbmPrecomFinancialAnnalysis([
            'description'=>$this->financialDescription,
            'file_type'=>$this->financialFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public $certificateDescription;
    public $certificateFile;
    public function saveMachineTestModel()
    {
        $this->validateOnly('certificateDescription');
        $this->validateOnly('certificateFile');
        $path=$this->certificateFile->store('public/precom-attachement');
        $this->precom->testing_certification()->save(new IptbmPrecomTestingCertification([
            'description'=>$this->certificateDescription,
            'file_type'=>$this->certificateFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public $feasibilityDescription;
    public $feasibilityFile;
    public function saveFeasibilityModel()
    {
        $this->validateOnly('feasibilityDescription');
        $this->validateOnly('feasibilityFile');
        $path=$this->feasibilityFile->store('public/precom-attachement');
        $this->precom->testing_certification()->save(new IptbmPrecomFeasibilityStudy([
            'description'=>$this->feasibilityDescription,
            'file_type'=>$this->feasibilityFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public $businessDescription;
    public $businessFile;
    public function saveBusinessModel()
    {
        $this->validateOnly('businessDescription');
        $this->validateOnly('businessFile');
        $path=$this->businessFile->store('public/precom-attachement');
        $this->precom->business_plan()->save(new IptbmPrecomBusinessPlan([
            'description'=>$this->businessDescription,
            'file_type'=>$this->businessFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public $reportDescription;
    public $reportFile;
    public function savReportModel()
    {
        $this->validateOnly('reportDescription');
        $this->validateOnly('reportFile');
        $path=$this->reportFile->store('public/precom-attachement');
        $this->precom->opinion_report()->save(new IptbmPrecomOpinionReport([
            'description'=>$this->reportDescription,
            'file_type'=>$this->reportFile->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }























    public $validationAttributes=[
        'marketModel'=>'input',
        'validationModel'=>'input',
        'freedomModel'=>'input',
        'financialModel'=>'input',
        'feasibilityModel'=>'input',
        'businessModel'=>'input',
        'reportModel'=>'input',
        'capitalModel'=>'Starting Capital',
        'investmentModel'=>'Return of Investment',
        'breakevenModel'=>'Break even',
        'commercializationModeModel'=>'Commercialization Mode',
        'costModel'=>'Estimated cost',
        'incomeModel'=>'Transfer Income'

    ];

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($precom)
    {

        $this->precom = $precom;
        $this->reportModel=$this->precom->fairness_opinion_report;
        $this->capitalModel=$this->precom->starting_capital;
        $this->investmentModel=$this->precom->return_of_investment;
        $this->breakevenModel=$this->precom->breakeven;
        $this->commercializationModeModel=$this->precom->modes;
        $this->costModel=$this->precom->estimated_acquisition_cost;
        $this->incomeModel=$this->precom->income_gen_trans;

    }


    public function render()
    {
        return view('livewire.iptbm.staff.precom.precom-details');
    }
}
