<?php

namespace App\Http\Livewire\Abh\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class AbhPublicProfileView extends Component
{
    public $profile;
    public function mount(AbhProfile $profile)
    {
        $this->profile=$profile;
    }
    public function render()
    {
        return view('livewire.abh.pages.profile.abh-public-profile-view')
            ->with('profile', $this->profile)
            ->layout(AbhLayout::class);
    }
}
