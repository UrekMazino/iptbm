<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhTechnologyPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $technologies=AbhTechnologyProfile::with('profile')->where('abh_profile_id',Auth::user()->abh_profile->id)->get();
        $profile=Auth::user()->abh_profile;
        return view('livewire.abh.pages.technology.abh-technology-page')
            ->with([
                'technologies' => $technologies,
                'profile' => $profile
            ])
            ->layout(AbhLayout::class);
    }
}
