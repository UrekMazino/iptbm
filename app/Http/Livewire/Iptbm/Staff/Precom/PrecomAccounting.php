<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use App\Models\iptbm\IptbmPrecomMode;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PrecomAccounting extends Component
{
    public $precom;
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
        $this->precom[$dataProps] = $model;
        $this->precom->save();
        $set($this->precom[$dataProps]);
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

        $this->precom->modes()->save(new IptbmPrecomMode([
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
        $this->precom->modes->find($id)->delete();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'capitalModel' => 'required|min:1|numeric',
            'investmentModel' => 'required|min:1|numeric',
            'breakevenModel' => 'required|min:1|numeric',
            'commercializationModeModel' => [
                'required',
                'in:Licensing Agreement/s,Outright sale,Joint venture,Start-up,Spin-off',
                Rule::unique(IptbmPrecomMode::class, 'commercialization_mode')->where('iptbm_commercialization_precoms_id', $this->precom->id)
            ],
            'costModel' => 'required|min:1|numeric',
            'incomeModel' => 'required|min:1|numeric',
        ];
    }

    public function mount($precom)
    {

        $this->precom = $precom;
        $this->capitalModel = $this->precom->starting_capital;
        $this->investmentModel = $this->precom->return_of_investment;
        $this->breakevenModel = $this->precom->breakeven;
        $this->commercializationModeModel = $this->precom->modes;
        $this->costModel = $this->precom->estimated_acquisition_cost;
        $this->incomeModel = $this->precom->income_gen_trans;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.precom.precom-accounting');
    }
}
