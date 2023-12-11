<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Livewire\Component;

class Details extends Component
{

    public function resetStatus($attrib)
    {
        $this->resetValidation([$attrib]);
    }
    public $showAddressForm = false;
    public $showProjectLeaderForm = false;
    public $showManagerForm = false;
    public $showYearEstablishedForm = false;


    public $profile;

    public $office_address;
    public $project_leader;
    public $manager;
    public $year_established;
    public $yearData=[];


    public function mount($profile): void
    {

        $this->profile = $profile;
        $this->office_address = $profile->office_address;
        $this->project_leader = $profile->project_leader;
        $this->manager = $this->profile->manager;
        $dat=[];
        for($x=2019;$x<now()->year+5;$x++)
        {
            $dat[]=$x;
        }
        $this->yearData=$dat;
    }

    public function saveAddress(): void
    {
        $this->validate([
            'office_address' => 'required|min:8'
        ]);
        $this->profile->office_address = $this->office_address;
        $this->profile->save();
        $this->showAddressForm();
        session()->flash('address', 'Office address has been saved successfully!');
    }

    public function showAddressForm(): void
    {
        $this->showAddressForm = !$this->showAddressForm;
        $this->office_address = $this->profile->office_address;
    }

    public function saveProjectLeader(): void
    {
        $this->validate([
            'project_leader' => 'required|min:8'
        ]);
        $this->profile->project_leader = $this->project_leader;
        $this->profile->save();
        $this->showProjectLeaderForm();
        session()->flash('project_leader', 'Project leader has been saved successfully!');
    }

    public function showProjectLeaderForm(): void
    {
        $this->showProjectLeaderForm = !$this->showProjectLeaderForm;
        $this->project_leader = $this->profile->project_leader;
    }

    public function saveManager()
    {
        $this->validate([
            'manager' => 'required|min:8'
        ]);
        $this->profile->manager = $this->manager;
        $this->profile->save();
        $this->showManagerForm();
        session()->flash('manager', 'IP-TBM Manager has been saved successfully!');
    }

    public function showManagerForm(): void
    {
        $this->showManagerForm = !$this->showManagerForm;
        $this->manager = $this->profile->manager;
    }

    public function saveYearEstablished(): void
    {
        $this->validate([
            'year_established' => 'required|integer|digits:4|min:2019|max:2099',
        ]);
        $this->profile->year_established = $this->year_established;
        $this->profile->save();
        $this->showYearEstablishedForm();
        session()->flash('year_established', 'Year Established has been saved successfully!');
    }

    public function showYearEstablishedForm(): void
    {
        $this->showYearEstablishedForm = !$this->showYearEstablishedForm;
        $this->year_established = $this->profile->year_established;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.details');
    }
}
