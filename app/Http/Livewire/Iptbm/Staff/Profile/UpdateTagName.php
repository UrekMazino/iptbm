<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Livewire\Component;

class UpdateTagName extends Component
{
    public $tagLine;
    public $profile;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount($profile): void
    {
        $this->profile=$profile;
        $this->tagLine= $this->profile->tag_line;
    }



    public function update()
    {
        $this->validate([
            'tagLine'=>'required|min:5',
        ]);

        $this->profile->tag_line=$this->tagLine;

        $this->profile->save();
        return redirect()->route('iptbm.staff.ipProfile');
    }

    public function render()
    {

        return view('livewire.iptbm.staff.profile.update-tag-name');
    }
}
