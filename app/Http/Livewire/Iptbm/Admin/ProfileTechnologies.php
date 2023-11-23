<?php

namespace App\Http\Livewire\Iptbm\Admin;

use App\Models\iptbm\IptbmTechnologyProfile;
use Livewire\Component;

class ProfileTechnologies extends Component
{
    public $search;
    public $technologies;

    public $profileId;
    public $baseData;

    public function mount($technologies, $profileId): void
    {
        $this->technologies = $technologies;
        $this->profileId = $profileId;
        $this->baseData = $technologies;
    }

    public function updated(): void
    {
        if ($this->search === '') {
            $this->technologies = $this->baseData;
        } else {
            $this->technologies = IptbmTechnologyProfile::search($this->search)->where('iptbm_profile_id', $this->profileId)->get();
        }


    }


    public function render()
    {

        return view('livewire.iptbm.admin.profile-technologies');
    }
}
