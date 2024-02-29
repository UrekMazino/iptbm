<?php

namespace App\Http\Livewire\Abh\Generator;


use Livewire\Component;

class GeneratorStatus extends Component
{
    public $generator;
    public $status;

    public function save_status()
    {
        $this->validate();
        $this->generator->status->status=$this->status;
        $this->generator->status->save();
        $this->emit('reloadPage');
    }
    public function rules()
    {
        return[

            'status'=>[
                'required',
                'in:ACTIVE,RETIRED,DECEASED'
            ]
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount($generator)
    {
        $this->generator=$generator;
        $this->status=$generator->status->status;
    }
    public function render()
    {
        return view('livewire.abh.generator.generator-status');
    }
}
