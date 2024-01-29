<?php

namespace App\Http\Livewire\Abh\Pages\Profile;

use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = Auth::user()->abh_profile;
        return view('livewire.abh.pages.profile.profile')
            ->with(['profile' => $profile])
            ->layout(AbhLayout::class,['pagetitle'=>'Profiles']);
    }
}
