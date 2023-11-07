<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Livewire\Component;

class Details extends Component
{
    public $showAddressForm=false;
    public $showProjectLeaderForm=false;
    public $showManagerForm=false;
    public $showYearEstablishedForm=false;



    public $profile;

    public $office_address;
    public $project_leader;
    public $manager;
    public $year_established;










    public function mount($profile): void
    {
        $this->profile=$profile;
        $this->office_address=$profile->office_address;
        $this->project_leader=$profile->project_leader;
        $this->manager=$this->profile->manager;
    }

    public function showProjectLeaderForm(): void
    {
        $this->showProjectLeaderForm=!$this->showProjectLeaderForm;
        $this->project_leader=$this->profile->project_leader;
    }



    public function showAddressForm(): void
    {
        $this->showAddressForm=!$this->showAddressForm;
        $this->office_address=$this->profile->office_address;
    }

    public function showManagerForm(): void
    {
        $this->showManagerForm=!$this->showManagerForm;
        $this->manager=$this->profile->manager;
    }

    public function showYearEstablishedForm(): void
    {
        $this->showYearEstablishedForm=!$this->showYearEstablishedForm;
        $this->year_established=$this->profile->year_established;
    }



    public function saveAddress(): void
    {
        $this->validate([
            'office_address'=>'required|min:8'
        ]);
        $this->profile->office_address=$this->office_address;
        $this->profile->save();
        $this->showAddressForm();
        session()->flash('address', 'Office address has been saved successfully!');
    }

    public function saveProjectLeader(): void
    {
        $this->validate([
            'project_leader'=>'required|min:8'
        ]);
        $this->profile->project_leader=$this->project_leader;
        $this->profile->save();
        $this->showProjectLeaderForm();
        session()->flash('project_leader', 'Project leader has been saved successfully!');
    }

    public function saveManager()
    {
        $this->validate([
            'manager'=>'required|min:8'
        ]);
        $this->profile->manager=$this->manager;
        $this->profile->save();
        $this->showManagerForm();
        session()->flash('manager', 'IP-TBM Manager has been saved successfully!');
    }

    public function saveYearEstablished(): void
    {
        $this->validate([
            'year_established'=>'required|integer|digits:4|min:1900|max:2099',
        ]);
        $this->profile->year_established=$this->year_established;
        $this->profile->save();
        $this->showYearEstablishedForm();
        session()->flash('year_established', 'Year Established has been saved successfully!');
    }


    public function render()
    {
        return view('livewire.iptbm.staff.profile.details');
    }
}
