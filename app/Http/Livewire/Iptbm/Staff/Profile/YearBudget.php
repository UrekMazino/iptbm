<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Livewire\Component;

class YearBudget extends Component
{

    public $budget;
    public $amountModel;
    public $showAmountPanel = false;

    public function toggleShowAmountPanel()
    {
        $this->showAmountPanel = !$this->showAmountPanel;
    }

    public function saveBudget()
    {
        $this->validate();
        $this->budget->year_budget = $this->amountModel;
        $this->budget->save();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'amountModel' => [
                'required',
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($budget)
    {
        $this->budget = $budget;
        $this->amountModel = $this->budget->year_budget;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.year-budget');
    }
}
