<?php

namespace App\Http\Livewire\Abh\Technology;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhTechIndustry;
use App\Models\abh\AbhTechnologyIndustry;
use App\Models\abh\AbhTechnologyProfile;
use App\Models\abh\AbhTechnologyStatus;
use App\Models\abh\AbhTechOwner;
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
        $path=$this->tech_photo->store('public/abh/tech_photo');
        $technology=new AbhTechnologyProfile([
            'title'=>$this->tech_title,
            'year_developed'=>$this->tech_year_developed,
            'tech_desc'=>$this->tech_description,
            'tech_photo'=>$path
        ]);

        $this->profile->technologies()->save($technology);
        $agency=AbhAgency::where('name',$this->tech_owner)->first();
        $technology->co_owner()->save(new AbhTechOwner([
            'abh_agency_id'=>$agency->id
        ]));
        $technology->status()->save(new AbhTechnologyStatus([
            'status_name'=>$this->tech_status
        ]));
        $technology->industries()->save(new AbhTechnologyIndustry([
            'abh_tech_industry_id'=>$this->tech_industry
        ]));
        $this->emit('reloadPage');
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return[
            'tech_title'=>[
                'required',
                'max:150',
                'unique:abh_technology_profiles,title'
            ],
            'tech_description'=>[
                'required',
            ],
            'tech_photo'=>[
                'required',
                'mimes:png,jpg,jpeg',
                'max:2048',
            ],
            'tech_year_developed'=>[
                'required',
                'date_format:Y'
            ],
            'tech_industry'=>[
                'required',
                'exists:abh_tech_industries,id'
            ],
            'tech_owner'=>[
                'required',
                'exists:abh_agencies,name'
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
