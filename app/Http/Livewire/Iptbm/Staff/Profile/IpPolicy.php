<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProfile;
use Livewire\Component;

class IpPolicy extends Component
{

    public  $ip_policy;
    public $techno_transfer;

    public $profile=0;

    public $showPolicyForm=false;
    public $showTechTrans=false;




    public function mount($profile)
    {
        $this->profile = $profile;
        $this->ip_policy=$profile->ip_policy;
        $this->techno_transfer=$profile->techno_transfer;

    }






    public function showPolicyForm(): void
    {

        $this->showPolicyForm=!$this->showPolicyForm;
        $this->ip_policy=$this->profile->ip_policy;
    }

    public function showTechTrans(): void
    {
        $this->showTechTrans=!$this->showTechTrans;
        $this->techno_transfer=$this->profile->techno_transfer;
    }



    public function savePolicy(): void
    {

        $this->validate([
            'ip_policy' => 'required|boolean'
        ]);

        $this->profile->ip_policy=$this->ip_policy;
        $this->profile->save();
        $this->showPolicyForm();
        session()->flash('ip_policy', 'IP Policy has been successfully saved!');
    }

    public function saveTechTrans()
    {

        $this->validate([
            'techno_transfer' =>'required|boolean',
        ]);
        $this->profile->techno_transfer=$this->techno_transfer;
        $this->profile->save();
        $this->showTechTrans();
        session()->flash('techno_transfer', 'IP Policy has been successfully saved!');
    }


    public function render()
    {
        return view('livewire.iptbm.staff.profile.ip-policy');
    }
}
