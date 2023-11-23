<?php

namespace App\Http\Livewire\Abh\Profile;

use Livewire\Component;

class ProfileDetails extends Component
{
    public $profile;
    public $address;
    public $project_leader;
    public $manager;
    public $year_istablished;


    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function rules()
    {
        return [
            'address'=>[
                'required',
                'max:100',
            ],
            'project_leader'=>[
                'required',
                'max:100',
            ],
            'year_istablished'=>[
                'required',
                ''
            ],
            'manager'=>[
                'required',
                'max:100',
            ],
        ];
    }
    public function mount($profile): void
    {
        $this->profile=$profile;
    }
    public function render()
    {
        return view('livewire.abh.profile.profile-details');
    }
}
