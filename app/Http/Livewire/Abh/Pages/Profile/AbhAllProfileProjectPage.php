<?php

namespace App\Http\Livewire\Abh\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class AbhAllProfileProjectPage extends Component
{
    public $profile;

    public function mount(AbhProfile $profile): void
    {
        $profile->load('projects');
        $this->profile = $profile;
    }

    public function render()
    {
        return view('livewire.abh.pages.profile.abh-all-profile-project-page')
            ->with(['projects' =>  $this->profile->projects])
            ->layout(AbhLayout::class);
    }
}
