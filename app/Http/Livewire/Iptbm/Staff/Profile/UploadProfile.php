<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProfile extends Component
{
    use WithFileUploads;

    public $photo;
    public $profile;

    public function mount($profile): void
    {
        $this->profile = $profile;
    }


    public function upload(): void
    {
        $this->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:20480',
        ]);
        if ($this->profile->logo) {
            if (Storage::exists($this->profile->logo)) {
                Storage::delete($this->profile->logo);
            }
        }


        $path = $this->photo->store('public/profile');
        $this->profile->logo = $path;
        $this->profile->save();
        $this->emit('reloadPage');
    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.staff.profile.upload-profile');
    }
}
