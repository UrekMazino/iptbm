<?php

namespace App\Http\Livewire\Abh\Generator;

use Livewire\Component;

class GeneratorsAddress extends Component
{

    public $generator;
    public $address;

    public function save_address()
    {
        $this->validate();
        $this->generator->address=$this->address;
        $this->generator->save();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'address' =>[
                'required',
                'max:100',
            ]
        ];
    }

    public function mount($generator)
    {
        $this->generator=$generator;
        $this->address=$this->generator->address;
    }
    public function render()
    {
        return view('livewire.abh.generator.generators-address');
    }
}
