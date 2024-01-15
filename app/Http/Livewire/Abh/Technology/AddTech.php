<?php

namespace App\Http\Livewire\Abh\Technology;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhTechIndustry;
use App\Models\abh\AbhTechnologyProfile;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTech extends Component
{

    use WithFileUploads;
    public $profile;
    public $tech_title;
    public $tech_description;
    public $tech_photo;
    public $tech_year_developed;
    public $tech_industry;
    public $tech_owner;
    public $tech_status;

    public function saveTechnology()
    {
        $this->validate();
        /*
         *  $this->profile->technologies()->save(new AbhTechnologyProfile([
            'title'=>$this->tech_title,
            'year_developed'=>$this->tech_year_developed,
            ''
        ]));
         */
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return[
            'tech_title'=>[
                'required'
            ],
            'tech_description'=>[
                'required'
            ],
            'tech_photo'=>[
                'required'
            ],
            'tech_year_developed'=>[
                'required'
            ],
            'tech_industry'=>[
                'required'
            ],
            'tech_owner'=>[
                'required'
            ],
            'tech_status'=>[
                'required'
            ]
        ];
    }


    public function mount($profile)
    {
        $this->profile = $profile;
    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.technology.add-tech')->with([
            'industries' => AbhTechIndustry::all(),
            'agencies'=>AbhAgency::select('name')->get()
        ]);
    }
}
