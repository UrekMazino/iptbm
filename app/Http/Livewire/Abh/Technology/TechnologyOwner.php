<?php

namespace App\Http\Livewire\Abh\Technology;

use App\Models\abh\AbhAgency;

use Livewire\Component;

class TechnologyOwner extends Component
{
    public $technology;

    public function delete_co_owner( $co_owner): void
    {
       $co_owner->delete();
       $this->emit('reloadPage');
    }

    public function mount($technology)
    {
        $technology->load('profile.agency','co_owner.agency');

        $this->technology=$technology;
    }
    public function render()
    {
        $agencies=AbhAgency::whereNotIn('id',[\Auth::user()->abh_profile->agency->id]);
        return view('livewire.abh.technology.technology-owner',[
            'agencies'=>$agencies
        ]);
    }
}
