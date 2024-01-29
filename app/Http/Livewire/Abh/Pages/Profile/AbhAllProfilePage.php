<?php

namespace App\Http\Livewire\Abh\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhAllProfilePage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile=AbhProfile::with('agency.region')
            ->whereHas('agency.region',function ($query){
                $query->where('id',Auth::user()->abh_profile->agency->region->id);
            })->get();
        return view('livewire.abh.pages.profile.abh-all-profile-page')
            ->with(['profile' => $profile])
            ->layout(AbhLayout::class);
    }
}
