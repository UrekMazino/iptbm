<?php

namespace App\Http\Livewire\Abh\Generator;

use App\Rules\FullNameValidation;
use Livewire\Component;

class GeneratorsName extends Component
{
    public $generator;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $suffix;
    public $full_name;

    public function save_update()
    {
       $this->validate();
       $this->generator->first_name=$this->first_name;
       $this->generator->middle_name=$this->middle_name;
       $this->generator->last_name=$this->last_name;
       $this->generator->suffix=$this->suffix;
       $this->generator->save();
       $this->emit('reloadPage');
    }


    public function rules()
    {
        return[
            'first_name' =>[
                'required',
                'max:40',
            ],
            'last_name' =>[
                'required',
                'max:40',
            ],
            'middle_name' =>[
                'nullable',
                'max:1',
            ],
            'suffix' =>[
                'nullable',
                'max:5',
            ],
            'full_name' =>new FullNameValidation(
                'abh_generators',
                [
                    'first_name' =>['first_name',$this->first_name],
                    'middle_name' =>['middle_name',$this->middle_name],
                    'last_name' =>['last_name',$this->last_name],
                    'suffixes' =>['suffix',$this->suffix],
                ]
            )
        ];
    }
    public function mount($generator)
    {
        $this->generator=$generator;
        $this->first_name=$generator->first_name;
        $this->middle_name=$generator->middle_name;
        $this->last_name=$generator->last_name;
        $this->suffix=$generator->suffix;
    }
    public function render()
    {
        return view('livewire.abh.generator.generators-name');
    }
}
