<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\Models\iptbm\IptbmCommercializationPrecom;
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
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AbhPrecomDetailsAdmin extends Component
{


    public $precom_tech;

    public $market_study_files;
    public $market_study_descriptions;

    public $valuation_files;
    public $valuation_descriptions;

    public $freedom_summary_files;
    public $freedom_descriptions;

    public $proposed_sheet_files;
    public $proposed_descriptions;


    public  $licensing_files;
    public $licensing_descriptions;


    public $financial_files;
    public $financial_descriptions;

    public $machine_cert_files;
    public $machine_cert_descriptions;

    public $feasibility_files;
    public $feasibility_descriptions;


    public $business_plan_files;
    public $business_plan_descriptions;

    public $fairness_files;
    public $fairness_descriptions;



    public $capitalModel;
    public $investmentModel;
    public $breakevenModel;
    public $commercializationModeModel;
    public $costModel;
    public $incomeModel;
    public $validationAttributes = [
        'capitalModel' => 'Starting Capital',
        'investmentModel' => 'Return of Investment',
        'breakevenModel' => 'Break even',
        'commercializationModeModel' => 'Commercialization Mode',
        'costModel' => 'Estimated cost',
        'incomeModel' => 'Transfer Income'

    ];

    public function saveCapitalModel()
    {
        $this->validateOnly('capitalModel');
        $this->saveDetails($this->capitalModel, 'capitalModel', 'starting_capital', function ($data) {
            $this->capitalModel = $data;
        });
    }

    public function saveDetails($model, $sessionName, $dataProps, $set)
    {
        $this->validateOnly($model);
        $this->precom_tech[$dataProps] = $model;
        $this->precom_tech->save();
        $set($this->precom_tech[$dataProps]);
        session()->flash($sessionName, 'Data successfully updated.');
    }

    public function saveInvestmentModel()
    {
        $this->validateOnly('investmentModel');
        $this->saveDetails($this->investmentModel, 'investmentModel', 'return_of_investment', function ($data) {
            $this->investmentModel = $data;
        });
    }

    public function saveBreakevenModel()
    {
        $this->validateOnly('breakevenModel');
        $this->saveDetails($this->breakevenModel, 'breakevenModel', 'breakeven', function ($data) {
            $this->breakevenModel = $data;
        });
    }

    public function saveCommercializationModeModel()
    {
        $this->validateOnly('commercializationModeModel');

        $this->precom_tech->modes()->save(new IptbmPrecomMode([
            'commercialization_mode' => $this->commercializationModeModel
        ]));
        $this->emit('reloadPage');
        /*
         * $this->saveDetails($this->commercializationModeModel,'commercializationModeModel','commercialization_mode',function($data){
            $this->commercializationModeModel=$data;
        });
         */
    }

    public function saveCostModel()
    {
        $this->validateOnly('costModel');
        $this->saveDetails($this->costModel, 'costModel', 'estimated_acquisition_cost', function ($data) {
            $this->costModel = $data;
        });
    }

    public function saveIncomeModel()
    {
        $this->validateOnly('incomeModel');
        $this->saveDetails($this->incomeModel, 'incomeModel', 'income_gen_trans', function ($data) {
            $this->incomeModel = $data;
        });
    }

    public function deleteMode($id)
    {
        $this->precom_tech->modes->find($id)->delete();
        $this->emit('reloadPage');
    }





    public function deleteFairnessFile(IptbmPrecomOpinionReport $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveFairnessFile(): void
    {
        $this->validateOnly('fairness_files');
        $this->validateOnly('fairness_descriptions');
        $path = $this->fairness_files->store('public/precom-attachement');
        $this->precom_tech->opinion_report()->save(new IptbmPrecomOpinionReport([
            'description'=>$this->fairness_descriptions,
            'file_type'=>$this->fairness_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public function deleteBusinessFile(IptbmPrecomBusinessPlan  $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveBusinessFile(): void
    {
        $this->validateOnly('business_plan_files');
        $this->validateOnly('business_plan_descriptions');
        $path = $this->business_plan_files->store('public/precom-attachement');
        $this->precom_tech->business_plan()->save(new IptbmPrecomBusinessPlan([
            'description'=>$this->business_plan_descriptions,
            'file_type'=>$this->business_plan_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function deleteFeasibilityFile(IptbmPrecomFeasibilityStudy  $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveFeasibilityFile(): void
    {
        $this->validateOnly('feasibility_files');
        $this->validateOnly('feasibility_descriptions');
        $path = $this->feasibility_files->store('public/precom-attachement');
        $this->precom_tech->feasibility_studies()->save(new IptbmPrecomFeasibilityStudy([
            'description'=>$this->feasibility_descriptions,
            'file_type'=>$this->feasibility_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public function deleteMachineFile(IptbmPrecomTestingCertification $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveMachineFile(): void
    {
        $this->validateOnly('machine_cert_files');
        $this->validateOnly('machine_cert_descriptions');
        $path = $this->machine_cert_files->store('public/precom-attachement');
        $this->precom_tech->testing_certification()->save(new IptbmPrecomTestingCertification([
            'description'=>$this->machine_cert_descriptions,
            'file_type'=>$this->machine_cert_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function deleteFinancialFile(IptbmPrecomFinancialAnnalysis $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveFinancialFile(): void
    {
        $this->validateOnly('financial_files');
        $this->validateOnly('financial_descriptions');
        $path = $this->financial_files->store('public/precom-attachement');
        $this->precom_tech->financial_annalysis()->save(new IptbmPrecomFinancialAnnalysis([
            'description'=>$this->financial_descriptions,
            'file_type'=>$this->financial_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function deleteLicenseFile(IptbmPrecomAgreementCopy $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveLicenseFile(): void
    {
        $this->validateOnly('licensing_files');
        $this->validateOnly('licensing_descriptions');
        $path = $this->licensing_files->store('public/precom-attachement');
        $this->precom_tech->license_agreement_copies()->save(new IptbmPrecomAgreementCopy([
            'description'=>$this->licensing_descriptions,
            'file_type'=>$this->licensing_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function deleteProposedFile(IptbmPrecomTermSheet $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveProposedFile(): void
    {
        $this->validateOnly('proposed_sheet_files');
        $this->validateOnly('proposed_descriptions');
        $path = $this->proposed_sheet_files->store('public/precom-attachement');
        $this->precom_tech->term_sheet_files()->save(new IptbmPrecomTermSheet([
            'description'=>$this->proposed_descriptions,
            'file_type'=>$this->proposed_sheet_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }



    public function deleteFreedomFile(IptbmPrecomFredOpSummary $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveFreedomFile()
    {
        $this->validateOnly('freedom_summary_files');
        $this->validateOnly('freedom_descriptions');
        $path = $this->freedom_summary_files->store('public/precom-attachement');
        $this->precom_tech->freedom_summary_files()->save(new IptbmPrecomFredOpSummary([
            'description'=>$this->freedom_descriptions,
            'file_type'=>$this->freedom_summary_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }


    public function deleteValuationFile(IptbmPrecomValuationSummary $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
    public function saveValuationFile()
    {
        $this->validateOnly('valuation_files');
        $this->validateOnly('valuation_descriptions');
        $path = $this->valuation_files->store('public/precom-attachement');
        $this->precom_tech->valuation_summary_files()->save(new IptbmPrecomValuationSummary([
            'description'=>$this->valuation_descriptions,
            'file_type'=>$this->valuation_files->extension(),
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }



    public function deleteMarketFile(IptbmPrecomMarketStudy $data): void
    {
        if(Storage::exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        $this->emit('reloadPage');
    }
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
                Rule::unique(IptbmPrecomMarketStudy::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'valuation_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'valuation_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomValuationSummary::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'freedom_summary_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'freedom_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomFredOpSummary::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'proposed_sheet_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'proposed_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomTermSheet::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'licensing_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'licensing_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomAgreementCopy::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'financial_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'financial_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomFinancialAnnalysis::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'machine_cert_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'machine_cert_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomTestingCertification::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'feasibility_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'feasibility_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomFeasibilityStudy::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'business_plan_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'business_plan_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomBusinessPlan::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'fairness_files'=>'required|mimes:pdf,png,jpeg|max:20000',
            'fairness_descriptions'=>[
                'required',
                'max:100',
                Rule::unique(IptbmPrecomOpinionReport::class, 'iptbm_precoms_id')->where('iptbm_precoms_id', $this->precom_tech->id)
            ],
            'capitalModel' => 'required|min:1|numeric',
            'investmentModel' => 'required|min:1|numeric',
            'breakevenModel' => 'required|min:1|numeric',
            'commercializationModeModel' => [
                'required',
                'in:Licensing Agreement/s,Outright sale,Joint venture,Start-up,Spin-off',
                Rule::unique(IptbmPrecomMode::class, 'commercialization_mode')->where('iptbm_commercialization_precoms_id', $this->precom_tech->id)
            ],
            'costModel' => 'required|min:1|numeric',
            'incomeModel' => 'required|min:1|numeric',
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
        $this->capitalModel = $this->precom_tech->starting_capital;
        $this->investmentModel = $this->precom_tech->return_of_investment;
        $this->breakevenModel = $this->precom_tech->breakeven;
        $this->commercializationModeModel = $this->precom_tech->modes;
        $this->costModel = $this->precom_tech->estimated_acquisition_cost;
        $this->incomeModel = $this->precom_tech->income_gen_trans;
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.commercialization.abh-precom-details-admin')
            ->with([
                'technology' =>$this->precom_tech->technology
            ])
            ->layout(AbhAdminApp::class);
    }
}
