<?php

namespace App\Http\Livewire\Abh\Technology;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class TechMainDetail extends Component
{
    public $technology;

    public $title;
    public $description;
    public $photo;

    public function save_title()
    {
        $this->validateOnly('title');
        $this->technology->title=$this->title;
        $this->technology->save();
        $this->emit('reloadPage');
    }

    public function save_description()
    {
        $this->validateOnly('description');
        $this->technology->tech_desc=$this->description;
        $this->technology->save();
        $this->emit('reloadPage');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'max:150',
                'unique:abh_technology_profiles,title'
            ],
            'description' => [
                'required',
           //     'min:1500'
            ],
            'photo' => [
                'required',
                'mimes:png,jpg,jpeg',
                'max:2048',
            ],
        ];
    }
    public function mount($technology): void
    {
        $this->technology=$technology;
        $this->title=$this->technology->title;
        $this->description=$this->technology->tech_desc;
        $this->photo=$this->technology->tech_photo;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.technology.tech-main-detail')->with([
            'tech'=>$this->technology
        ]);
    }
}
