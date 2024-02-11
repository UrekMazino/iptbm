<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmIpApplicationExpencess;
use App\Models\iptbm\IptbmTechProtectionStatus;
use Livewire\Component;

class IpApplicationDetails extends Component
{

    public $techProtectionStatus;
    public $ipAlert;

    public $showAbstractEditor = false;
    public $showProtectionStatusEditor = false;


    public $abstractModel;
    public $protectionStatusModel;


    public $expenseModel;
    public $descriptionModel;

    public $showExpenseModelForm = false;
    public $validationAttributes = [
        'abstractModel' => 'Abstract'
    ];


    public function delete_expenses(IptbmIpApplicationExpencess $expenses): void
    {
        $expenses->delete();
        $this->emit('reloadPage');
    }

    public function toggleShwExpenseModelForm()
    {
        $this->showExpenseModelForm = !$this->showExpenseModelForm;
        $this->reset('expenseModel', 'descriptionModel');
        $this->resetValidation(['expenseModel', 'descriptionModel']);
    }

    public function saveExpense()
    {

        $this->validateOnly('expenseModel');
        $this->validateOnly('descriptionModel');

        $this->ipAlert->expenses()->save(new IptbmIpApplicationExpencess([
            'description' => $this->descriptionModel,
            'amount' => $this->expenseModel
        ]));

        $this->emit('reloadPage');
    }

    public function toggleShowAbstractEditor()
    {
        $this->showAbstractEditor = !$this->showAbstractEditor;
        $this->reset('abstractModel');
        $this->resetValidation(['abstractModel']);
        $this->abstractModel = $this->ipAlert->abstract;
    }

    public function toggleShowProtectionStatusEditor()
    {
        $this->showProtectionStatusEditor = !$this->showProtectionStatusEditor;
        $this->reset('protectionStatusModel');
        $this->resetValidation(['protectionStatusModel']);
        $this->protectionStatusModel = $this->ipAlert->protection_status;
    }

    public function saveAbstract()
    {
        $this->validateOnly('abstractModel');
        $this->ipAlert->abstract = $this->abstractModel;
        $this->ipAlert->save();
        $this->abstractModel = $this->ipAlert->abstract;
        session()->flash('abstractModel', 'Technology Abstract save updated successfully');

    }

    public function saveProtectionStatus()
    {
        $this->validateOnly('protectionStatusModel');
        $this->ipAlert->protection_status = $this->protectionStatusModel;
        $this->ipAlert->save();
        $this->protectionStatusModel = $this->ipAlert->protection_status;
        $this->emit('reloadPage');

    }

    public function rules()
    {
        return [

            'abstractModel' => [
                'required',
                'min:10'
            ],
            'protectionStatusModel' => [
                'required',
                'exists:iptbm_tech_protection_statuses,id'
            ],
            'expenseModel' => 'required|numeric|min_digits:1',
            'descriptionModel' => 'required|max:100'

        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($ipAlert)
    {


        $this->ipAlert = $ipAlert;
        $this->abstractModel = $this->ipAlert->abstract;
        $this->protectionStatusModel = $this->ipAlert->protection_status;
        $this->techProtectionStatus = IptbmTechProtectionStatus::all();
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.ip-application-details');
    }
}
