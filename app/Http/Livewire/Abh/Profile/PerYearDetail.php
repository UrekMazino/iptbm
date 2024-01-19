<?php

namespace App\Http\Livewire\Abh\Profile;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class PerYearDetail extends Component
{
    public $perYear;
    public $extendDuration;


    public function saveExtend()
    {
        $this->validateOnly('extendDuration');
        $this->perYear->extended_duration=$this->extendDuration;
        $this->perYear->save();
        $this->emit('reloadPage');
    }

    public function rules(): array
    {
        return[
            'extendDuration'=>[
                'required',
                'integer',
                'min:1',
                ],
        ];
    }
    public function mount($perYear)
    {
        $this->perYear=$perYear->load('project');
    }
    public function render()
    {
        return view('livewire.abh.profile.per-year-detail');
    }
}
