<?php

namespace App\Http\Livewire\Abh\Generator;

use App\Models\abh\AbhGenerator;
use App\Rules\FullNameValidation;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AddAbhGenerator extends Component
{

    public  $first_name;
    public  $last_name;
    public  $middle_initial;
    public  $suffix;
    public  $full_name;

    public  $address;

    public function saveGenerator(): void
    {
        $this->validate();
        $profile= Auth::user()->abh_profile;
        $generator=new AbhGenerator([
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_initial,
            'last_name'=>$this->last_name,
            'suffix'=>$this->suffix,
            'address'=>$this->address,
        ]);
        $profile->generators()->save($generator);

        $this->redirect(route("abh.staff.generator_details",['generator'=>$generator->id]));

    }

    public function rules(): array
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
            'middle_initial' =>[
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
                    'middle_name' =>['middle_name',$this->middle_initial],
                    'last_name' =>['last_name',$this->last_name],
                    'suffixes' =>['suffix',$this->suffix],
                ]
            )
        ];
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.generator.add-abh-generator');
    }
}
