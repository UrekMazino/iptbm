<?php

namespace App\Http\Livewire\Abh\Profile;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ProfileDetails extends Component
{
    public $profile;
    public $address;
    public $project_leader;
    public $manager;
    public $year_established;

    public function saveYearEstablished(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('year_established');
        $this->profile->year_established=$this->year_established;
        $this->profile->save();
        return redirect(route("abh.staff.profile"));
    }
    public function saveProjectManager(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('manager');
        $this->profile->manager=$this->manager;
        $this->profile->save();
        return redirect(route("abh.staff.profile"));
    }
    public function saveProjectLeader(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('project_leader');
        $this->profile->project_leader=$this->project_leader;
        $this->profile->save();
        return redirect(route("abh.staff.profile"));
    }
    public function saveAddress(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('address');
        $this->profile->office_address=$this->address;
        $this->profile->save();
        return redirect(route("abh.staff.profile"));
    }


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
            'year_established'=>[
                'required',
                'digits:4',
                'integer',
                'min:1900',
                'max:'.(date("Y")*1+1)
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
        $this->address=$profile->office_address;
        $this->project_leader=$profile->project_leader;
        $this->manager=$profile->manager;
        $this->year_established=$profile->year_established;

    }
    public function render()
    {
        return view('livewire.abh.profile.profile-details');
    }
}
